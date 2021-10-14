@extends('layouts.app')
@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
        style="background-image: url('{{ asset($post->cover) }}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <span class="post-category text-white bg-success mb-3">{{ $post->getCategory->name }}</span>
                        <h1 class="mb-4"><a href="#">{{ $post->name }}.</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                    src="{{ asset('images/person_1.jpg') }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{ $post->getAuthor->name }}</span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p>{{ $post->description }}</p>
                        
                    </div>

                    <div class="pt-5">
                    @if(count($comments)>0)
                    <h3 class="mb-5">{{ count($comments) }} Comments</h3>
                    <ul class="comment-list">
                        @foreach($comments as $comment)
                        <li class="comment">
                            <div class="vcard">
                                <img src="{{ asset('images/person_1.jpg') }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{ $comment->name }}</h3>
                                <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <h3 class="mb-5">0 Comments</h3>
                    @endif
                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="{{ route('comment.store') }}" class="p-5 bg-light" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                    {{ $errors }}
                </div>
                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{ asset('images/person_2.jpg') }}" alt="Image Placeholder" class="img-fluid mb-5">
                            <div class="bio-body">
                                <h2>{{ $post->getAuthor->name }}</h2>
                                <p class="mb-4">{{ $post->getAuthor->email }}</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                                <p class="social">
                                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Popular Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @if(count($popularPosts)>0)
                                @foreach($popularPosts as $popPost)
                                    @if($popPost->id!=$post->id)
                                    <li>
                                        <a href="">
                                            <img src="{{ asset($popPost->cover) }}" alt="Image placeholder" class="mr-4">
                                            <div class="text">
                                                <h4>{{ $popPost->name }}</h4>
                                                <div class="post-meta">
                                                    <span class="mr-2">{{ $popPost->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                                @else
                                <li>
                                    <a href="{{ route('post.index') }}">
                                        See All Post
                                    </a>
                                </li>
                                @endif
                            
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($categories as $itemCat)
                            <li><a href="{{ route('Post.Category',$itemCat['id']) }}">{{ $itemCat['name'] }}<span>{{ $itemCat['count'] }}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>
@endsection
