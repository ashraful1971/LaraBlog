<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
    @if(isset(request()->keyword))
    <h1>Search results for: {{ request()->keyword }}</h1>
    @endif
    <div class="page-wrapper">
        <div class="blog-custom-build">
            @forelse ($main_posts as $post)
            <div class="blog-box wow fadeIn">
                <div class="post-media">
                    <a href="{{ route('post.page', $post->slug) }}" title="">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="$post->name" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div>
                        <!-- end hover -->
                    </a>
                </div>
                <!-- end media -->
                <div class="blog-meta big-meta text-center">
                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('post.page', $post->slug) }}" class="fb-button btn btn-primary"><i class="fab fa-facebook-f"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                            <li><a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('post.page', $post->slug) }}&text={{ $post->title }}" class="tw-button btn btn-primary"><i class="fab fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                        </ul>
                    </div><!-- end post-sharing -->
                    <h4><a href="{{ route('post.page', $post->slug) }}" title="">{{ $post->title }}</a></h4>
                    <p>{{ $post->excerpt() }}</p>
                    <small><a href="{{ route('category.page', $post->category->slug) }}" title="">{{ $post->category->name }}</a></small>
                    <small><a href="{{ route('post.page', $post->slug) }}" title="">{{ niceDate($post->created_at) }}</a></small>
                    <small><a href="#" title="">by {{ $post->user->name }}</a></small>
                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->
            <hr class="invis">
            @empty
            <p>No post found...</p>
            @endforelse
        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
            {{ $main_posts->links('vendor.pagination.custom') }}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end col -->