@extends('layouts.app')
@section('content')
    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>Created at</th>
                            <th></th>
                        <tbody>
                            @foreach ($comments as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->email }}</td>
                                <td>{{ $c->comment }}</td>
                                <td>{{ $c->created_at->diffForHumans() }}</td>
                                <form action="{{ route('comment.update',$c->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <td>
                                        <select name="status" id="">
                                            <option value="1" {{ ($c->status==1)? 'selected'  : '' }}>Active</option>
                                            <option value="0" {{ ($c->status==0)? 'selected'  : '' }}>Deactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
