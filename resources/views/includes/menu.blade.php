<nav id="navbar" class="navbar navbar-expand-lg  sticky-top navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">Todo_Listing</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{!! route('home') !!}">Home <span class="sr-only">(current)</span></a>
        </li>
        {{-- <li class="nav-item active">
          <a class="nav-link" href="{!! route('Todo_create') !!}">Create Todo</a>
        </li> --}}
        {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> --}}
        {{-- <li class="nav-item active">
          <a class="nav-link" href="{!! route('listing.create') !!}">Create Listing</a>
        </li> --}}
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
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
            <li class="nav-item active">
              <a href="{!! route('message.index') !!}" class="nav-link">
                Inbox 
                @if (count(Auth::user()->messagesGet->where('read', 0)))
                  <span class=" badge-pill badge-danger">{{ count(Auth::user()->messagesGet->where('read', 0)) }}</span>
                @endif
              </a>
            </li>
            <li class="nav-item active dropdown ">
                <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @if (empty(Auth::user()->photo))
                    <img style="height: 30px; width: 35px; margin-right: 10px "src="{{ asset('img/default_photo.png') }}" alt="" class="float-left rounded-circle">
                  @else
                    <img style="height: 30px; width: 35px; margin-right: 10px "src="{{ asset('storage/img/profile_photos/'.Auth::user()->photo) }}" class="float-left rounded-circle">
                  @endif
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="{{ route('user.show', ['user' => Auth::user()->id]) }}" class="dropdown-item">My Profile</a>
                    @if (Auth::user()->level>0)
                    <a href="{{ route('admin.index') }}" class="dropdown-item">Admin</a>
                    @endif
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
  </div>  
</nav>