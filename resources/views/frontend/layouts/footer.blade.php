<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Recent Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @forelse ($posts as $post)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            <a href="{{ route('post.page', $post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small>{{ niceDate($post->created_at) }}</small>
                                </div>
                            </a>
                            @empty
                            <p>No post found...</p>
                            @endforelse
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Posts</h2>
                    <div class="blog-list-widget">
                        <div class="list-group">
                            @forelse ($posts as $post)
                            @if($loop->iteration == 6)
                            @break
                            @endif
                            <a href="{{ route('post.page', $post->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-fluid float-left">
                                    <h5 class="mb-1">{{ $post->title }}</h5>
                                    <small>{{ niceDate($post->created_at) }}</small>
                                </div>
                            </a>
                            @empty
                            <p>No post found...</p>
                            @endforelse
                        </div>
                    </div><!-- end blog-list -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <h2 class="widget-title">Popular Categories</h2>
                    <div class="link-widget">
                        <ul>
                            @forelse ($categories as $category)
                            <li><a href="{{ route('category.page', $category->slug) }}">{{ $category->name }} <span>({{ $category->posts->count() }})</span></a></li>
                            @empty
                            <li>No category found...</li>
                            @endforelse
                        </ul>
                    </div><!-- end link-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end footer -->