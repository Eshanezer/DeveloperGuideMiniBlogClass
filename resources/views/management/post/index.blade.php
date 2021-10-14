@extends('layouts.app')
@section('content')
    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-6">
                    <div class="subscribe-1 ">
                        <h2>Create New Post</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
                        <form action="{{ route('post.store') }}" class="p-5 bg-light" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="website">Post Cover</label>
                                <input type="file" class="form-control" id="website" name="cover">
                            </div>
                            <div class="form-group">
                                <label for="website">Post Description</label>
                                <textarea class="form-control" name="description"
                                    rows="6">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <select name="category_id" id="" class="form-control">
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $key => $value)
                                            <option @if (old('category_id') == $key) selected @endif value="{{ $key }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="">Categories not found</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Create Post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    {{ $errors }}
                </div>

                <div class="col-md-12">
                    <table class="table table-responsive">
                        <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Created at</th>
                            <th>Description</th>
                            <th></th>
                        <tbody>
                            @foreach ($userPosts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td><img src="{{ asset($post->cover) }}" alt="" width="80"></td>
                                    <td>{{ $post->getCategory->name }}</td>
                                    <td>{{ $post->getAuthor->name }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>

                                    <td>{{ $post->description }}
                                    <td>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-block" type="submit">Remove</button>
                                        </form>
                                        <a href="{{ route('comment.show',$post->id) }}" class="btn btn-primary">View Comments</a>
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
