@extends('layouts.app')
@section('content')
    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Add New Category</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
                        <form action="{{ route('category.store') }}" class="p-5 bg-light" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="website">Image Cover</label>
                                <input type="file" class="form-control" id="website" name="cover">
                            </div>
                            <div class="form-group">
                                <label for="website">Category Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    {{ $errors }}
                </div>

                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th></th>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    {{-- <td><img src="{{ asset('images/uploads/categories/'.$category->cover) }}" alt="" width="80"></td> --}}
                                    <td><img src="{{ asset($category->cover) }}" alt=""
                                            width="80"></td>
                                    <td style="width: 70%">{{ $category->description }}
                                    <td>
                                        <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Remove</button>
                                        </form>
                                    </td>
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
