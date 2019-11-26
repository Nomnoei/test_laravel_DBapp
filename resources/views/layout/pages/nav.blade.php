<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{URL::to('')}}">CIS online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
     @isset(Auth::user()->status)
            @if(Auth::user()->status == 'admin')
            <li class="nav-item active">
            <a class="nav-link" href="{{URL::to('')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('product/create')}}">App Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{URL::to('product')}}">Product</a>
           </li>
           <li class="nav-item">
                <a class="nav-link" href="{{URL::to('manage')}}">ManaOrder</a>
           </li>

            @endif

            @if(Auth::user()->status == 'member')
            <li class="nav-item active">
            <a class="nav-link" href="{{URL::to('')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('select')}}">Shop Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('order')}}">Order Product</a>
            </li>
            @endif
            
     @endisset
     @empty(Auth::user()->status)
     <li class="nav-item active">
            <a class="nav-link" href="{{URL::to('')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{URL::to('select')}}">show Product</a>
            </li>
     @endempty
         




      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
  </nav>