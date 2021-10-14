@extends('layouts.app')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout-2">
                @if (count($categories)>0)
                    @foreach ($categories as $category)
                    <div class="col-md-4">
                        <a href="{{ route('Post.Category',$category->id) }}" class="h-entry mb-30 v-height gradient"
                            style="background-image: url('{{ $category->cover }}');">
    
                            <div class="text">
                                <h2>{{ $category->name }}</h2>
                                <span class="date" style="">{{ $category->description }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                <div class="col-md-12">
                    <a href="single.html" class="h-entry mb-30 v-height gradient"
                        style="background-image: url('https://thumbs.dreamstime.com/b/funny-yellow-emoji-banner-enjoy-every-moment-quote-cry-laughing-yellow-emoticon-banner-illustration-positive-motivation-quote-159875119.jpg');">

                        <div class="text">
                            <h2>Enjoy Every Moments.</h2>
                            <span class="date">Developer Guide LK</span>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="row">
                @if(count($recentltPosted)>0)
                @foreach($recentltPosted as $post)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{ route('post.show',$post->id) }}"><img src="{{ asset($post->cover) }}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <span class="post-category text-white bg-secondary mb-3">{{ $post->getCategory->name }}</span>

                            <h2><a href="{{ route('post.show',$post->id) }}">{{ $post->name }}s.</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg"
                                        alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{ $post->getAuthor->name }}</a></span>
                                <span>&nbsp;-&nbsp; {{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            <p>{{ $post->description }}.</p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <h6>No post found !</h6>
                @endif
            </div>
        </div>
    </div>

    <div class="site-section bg-lightx">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <div class="subscribe-1 ">
                        <h2>Subscribe to our newsletter</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt
                            error illum a explicabo, ipsam nostrum.</p>
                        <form action="#" class="d-flex">
                            <input type="text" class="form-control" placeholder="Enter your email address">
                            <input type="submit" class="btn btn-primary" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
