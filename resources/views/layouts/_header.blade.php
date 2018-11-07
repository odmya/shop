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
                <!-- 登录注册链接开始 -->
                <li>
                  <a href="{{ route('cart.index') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                </li>

                <!-- 登录注册链接结束 -->
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Store</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Free YouTube Downloader <span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
              </li>
              <li><a href="#">Tips & Tricks</a></li>

              <li><a href="#">Try</a></li>
              <li><a href="#">Buy</a></li>
            </ul>
        </div>
    </div>
</nav>
