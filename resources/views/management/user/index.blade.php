@extends('layouts.app')
@section('content')
    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <h1>User Management</h1>
                    <table class="table table-responsive">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Created at</th>
                            <th></th>
                        <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <form action="{{ route('user.update',$user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <td>
                                        <select name="role" id="">
                                            <option value="1" {{ ($user->role==1)? 'selected'  : '' }}>Admin</option>
                                            <option value="2" {{ ($user->role==2)? 'selected'  : '' }}>User</option>
                                            <option value="3" {{ ($user->role==3)? 'selected'  : '' }}>Member</option>
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
