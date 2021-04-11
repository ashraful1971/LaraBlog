<header class="market-header header">
    <div class="container-fluid">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ getOption('ads_banner') == '' ? asset('images/version/market-logo.png') : asset('storage/'.getOption('site_logo')) }}" alt="Logo" width="180">
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    @foreach ($categories as $category)
                    @if($loop->iteration == 4)
                    @break
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.page', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                    </li>
                </ul>
                <form class="form-inline" action="{{ route('search.page') }}" method="GET">
                    <input name="keyword" class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div><!-- end container-fluid -->
</header><!-- end market-header -->