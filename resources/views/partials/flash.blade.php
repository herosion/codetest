@if( $flash = session('flashMessage') )
    <div class="flash">
        <div class="col s12">{{$flash}}</div>
    </div>
@endif

