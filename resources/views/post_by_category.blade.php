@extends('layouts.app')
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="col-lg-4 mb-4">
                            <div class="entry2">
                                <a href="{{ route('post.show',$post->id) }}"><img src="{{ asset($post->cover) }}" alt="Image" class="img-fluid rounded"></a>
                                <div class="excerpt">
                                    <span class="post-category text-white bg-secondary mb-3">{{ $post->getCategory->name }}</span>

                                    <h2><a href="single.html">{{ $post->name }}.</a></h2>
                                    <div class="post-meta align-items-center text-left clearfix">
                                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{ asset('images/person_1.jpg') }}"
                                                alt="Image" class="img-fluid"></figure>
                                        <span class="d-inline-block mt-1">By <a href="#">{{ $post->getAuthor->name }}</a></span>
                                        <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                                    </div>

                                    <p>{{ $post->description }}</p>
                                    <p><a href="#">Read More</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else

                <div class="col-md-8">
                    <h6>No post found !</h6>
                </div>
                @endif
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
