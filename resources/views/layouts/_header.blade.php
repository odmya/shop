<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img alt="Brand" src="{{ URL::asset('uploads/images/logo.png') }}">

            </a>
        </div>
        <div class="collapse navbar-collapse top_nav_item" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="{{ route('cart.index') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              @include(config('laravel-menu.views.bootstrap-items'), ['items' => $TopNavBar->roots()])
            </ul>
        </div>
    </div>
</nav>
