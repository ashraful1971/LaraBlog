<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
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

        <div id="" class="widget">
            <h2 class="widget-title">Advertising</h2>
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <a href="{{ getOption('ads_link') == '' ? '#' : getOption('ads_link') }}" target="_blank">
                        <img src="{{ getOption('ads_banner') == '' ? asset('images/banner_03.jpg') : asset('storage/'.getOption('ads_banner')) }}" alt="" class="img-fluid">
                    </a>
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end widget -->

        <!-- <div class="widget">
            <h2 class="widget-title">Instagram Feed</h2>
            <div class="instagram-wrapper clearfix">
                <a class="" href="#"><img src="{{ asset('upload/small_09.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_01.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_02.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_03.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_04.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_05.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_06.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_07.jpg') }}" alt="" class="img-fluid"></a>
                <a href="#"><img src="{{ asset('upload/small_08.jpg') }}" alt="" class="img-fluid"></a>
            </div>
        </div> -->

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
    </div><!-- end sidebar -->
</div><!-- end col -->