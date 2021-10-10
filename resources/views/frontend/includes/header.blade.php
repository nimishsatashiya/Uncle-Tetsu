<header class="header">
    <div class="logo"><a href="{{ route('frontend-homepage')}}" title="Uncke Tetsu"><img src="{{asset('themes/frontend/images/logo.svg')}}" alt=""></a></div>
    <div class="hambergur">
        <span class="menu-text">Menu</span>
        <span>
            <div></div>
            <div></div>
            <div></div>
        </span>
    </div>
    <nav class="navbar fullscreen">
        <ul>
            <li class="{{ \Request::route()->getName()=='frontend-homepage' ? 'active':'' }}"><a href="{{ route('frontend-homepage')}}">Home</a></li>
            <li class="{{ \Request::route()->getName()=='who-uncle-tetsu' ? 'active':'' }}"><a href="{{ route('who-uncle-tetsu')}}">Who is Uncle Tetsu?</a></li>
            <li class="{{ \Request::route()->getName()=='our-philosophy' ? 'active':'' }}"><a href="{{ route('our-philosophy')}}">Our Philosophy</a></li>
            <li class="{{ \Request::route()->getName()=='our-products' ? 'active':'' }}"><a href="{{ route('our-products')}}">Our Products</a></li>
            <li class="{{ \Request::route()->getName()=='blogs' ? 'active':'' }}"><a href="{{ route('blogs')}}">Uncle Tetsu's Blog</a></li>
            <li class="{{ \Request::route()->getName()=='store-location' ? 'active':'' }}"><a href="{{ route('store-location')}}">Store Locations</a></li>
            <li class="{{ \Request::route()->getName()=='franchising' ? 'active':'' }}"><a href="{{ route('franchising')}}">Franchising</a></li>
            <li class="{{ \Request::route()->getName()=='global-contact' ? 'active':'' }}"><a href="{{ route('global-contact')}}">Uncle Tetsu Global</a></li>

        </ul>
        <div class="close">
            <span class="menu-text">Menu</span>
            <span>
                <div></div>
            </span>
        </div>
    </nav>
</header>