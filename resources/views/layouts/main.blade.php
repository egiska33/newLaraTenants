<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                @if(Auth::user()->isLandlord())
                    <a class="navbar-brand" href="{{ route('view.house') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @else
                    <a class="navbar-brand" href="{{ route('show.landlord.house', $house->id)}}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @endif
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{route('show.landlord.house',$house->id)}}">House</a></li>
                    <li><a href="{{route('show.landlord.bill', $house->id)}}">Bills</a></li>
                    <li><a href="{{route('show.landlord.task', $house->id)}}">Tasks</a></li>
                    <li><a href="{{route('show.landlord.message', $house->id)}}">Messages</a></li>
                    <li><a href="{{route('show.landlord.document', $house->id)}}">Documents</a></li>

                </ul>


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('auth.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
@include('partials.javascripts')
</body>
</html>
