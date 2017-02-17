<html>
    <head>
        <title>App Name - @yield('title')</title>
		
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

    </head>
    <body>
      <div class="container">

        <div class="row">
        	<div class="col s12">
        	@include('partials.header')
        	</div>
          <div class="col s12">
          @include('partials.flash')
          </div>
        </div>
      
  	    <div class="container">
          @yield('content')
        </div>

        @include('partials.footer')
        
		  </div>
	
	   <script
         src="https://code.jquery.com/jquery-3.1.1.min.js"
         integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
         crossorigin="anonymous">
     </script>

    <!-- Compiled and minified JavaScript -->
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

  	<script type="text/javascript">

  		'use strict';

  		$( document ).ready(function(){

  			$('.button-collapse').sideNav();
        $('.modal').modal({opacity: .7});
		    $('.flash').delay(1000).css({
           position: 'fixed',
           top: '46%',
           left: '42%',
           width: '15%',
           height: '50px',
           backgroundColor: '#ffa726',
           display: 'flex',
           textAlign: 'center',
           alignItems: 'center',
           color: '#fff',
           fontWeight: '800',
           borderRadius: '10px'
        }).fadeOut(1000);

      });
		  
		  
  	</script>

    </body>
</html>