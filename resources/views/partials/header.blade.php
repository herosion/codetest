<ul id="dropdown1" class="dropdown-content">
  @foreach ($categories as $category)
  <li><a href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->name }}</a></li>
  @endforeach
</ul>
<nav>
  <div class="nav-wrapper #1976d2 blue darken-2"> <!-- #1976d2 blue darken-2 -->
    @if(auth()->check())
    <a href="{{ route('admin.index') }}" class="brand-logo">Code tests <small>(Admin - {{$admin->username }})</small></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li><a href="{{ route('logout') }}">Log out</a></li>
    </ul>
    @else
    <a href="{{ route('home') }}" class="brand-logo">Code tests</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Tests<i class="material-icons right">arrow_drop_down</i></a></li>
      <li><a href="#modal1">Sign in</a></li>
    </ul>
    @endif

    <ul class="side-nav" id="mobile-demo">
      @if(auth()->check())
      <li><a href="">Dashboard</a></li>
      <li><a href="{{ route('logout') }}">Log out</a></li>
      @else
      @foreach ($categories as $category)
      <li><a href="{{ route('category', [$category->id, $category->slug]) }}">{{ $category->name }}</a></li>
      @endforeach
      <li><a href="#modal1">Sign in</a></li>
      @endif
    </ul>
  </div>
</nav>

<!-- Modal pour la connection de l'admin -->
<form class="col s12" action="{{route('login')}}" method="post">

  {{csrf_field()}}

  <div id="modal1" class="modal">
    <div class="container">
    <div class="modal-content">
      <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input id="email" name="email" type="email" class="validate">
          <label for="email" data-error="wrong" data-success="right">Identifiant</label>
          @if($errors->has('email')) <span>{{$errors->first('email')}}</span>@endif
      </div>
      <div class="input-field">
          <i class="material-icons prefix">vpn_key</i>
          <input id="password" name="password" type="password" class="validate">
          <label for="password" data-error="wrong" data-success="right">Password</label>
          @if($errors->has('password')) <span>{{$errors->first('password')}}</span>@endif
      </div>
      
      <div class="container">
      <div class="input-field">
          <input type="checkbox" id="remember" name="remember" value="yes"/>
          <label for="remember">Se souvenir de moi</label>
      </div>
      </div>
    </div>
    </div>
    <div class="modal-footer">
      <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" name="action">Sign In<i class="material-icons right">send</i>
      </button>
    </div>
  </div>
</form>