@extends('frontend.layouts.app')

@section('content')
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    <div class="page-wrapper">
        <div class="blog-title-area">

            <span class="color-yellow"><a href="{{ route('category.page', $post->category->slug) }}" title="">{{ $post->category->name }}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small><a href="marketing-single.html" title="">{{ niceDate($post->created_at) }}</a></small>
                <small><a href="blog-author.html" title="">by {{ $post->user->name }}</a></small>
                <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.page', $post->slug) }}" class="fb-button btn btn-primary"><i class="fab fa-facebook-f"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('post.page', $post->slug) }}&text={{ $post->title }}" class="tw-button btn btn-primary"><i class="fab fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="upload/market_blog_06.jpg" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            <div class="pp">
                <p>{!! $post->content !!}</p>
            </div><!-- end pp -->
        </div><!-- end content -->

        <div class="blog-title-area">
            <!-- <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div> -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.page', $post->slug) }}" class="fb-button btn btn-primary"><i class="fab fa-facebook-f"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                    <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('post.page', $post->slug) }}&text={{ $post->title }}" class="tw-button btn btn-primary"><i class="fab fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <hr class="invis1">

        <div class="custombox authorbox clearfix">
            <h4 class="small-title">About author</h4>
            <div class="row">

                <div class="col-lg-12 col-md-10 col-sm-12 col-xs-12">
                    <h4><a href="#">{{ $post->user->name }}</a></h4>
                    <p>{{ $post->user->about }}</p>

                    <!-- <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div> -->

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end author-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">You may also like</h4>
            <div class="row">
                @forelse ($realted_posts as $post)
                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="marketing-single.html" title="">
                                <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div><!-- end hover -->
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="{{ route('post.page', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                            <small><a href="{{ route('category.page', $post->category->slug) }}" title="">{{ $post->category->name }}</a></small>
                            <small><a href="#" title="">{{ niceDate($post->created_at) }}</a></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                </div><!-- end col -->
                @empty
                <p>No post found...</p>
                @endforelse
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">
    </div><!-- end page-wrapper -->
</div><!-- end col -->
@endsection

@section('sidebar')
@include('frontend.layouts.sidebar')
@endsection