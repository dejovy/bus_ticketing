<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bus Tickating</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- bootswatch template css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
     <!-- Zebra Date picker CSS -->
    <link rel="stylesheet"  href="{{ asset('Zebra_Datepicker/dist/css/default/zebra_datepicker.min.css') }}" rel="stylesheet">

  <!-- Select2 CSS -->
  <link rel="stylesheet"  href="{{ asset('select2-4.0.6/dist/css/select2.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel"  >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Jovy Coaches') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                        <ul class="navbar-nav mr-auto">
                        
                                 
                                <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('create_role') }}">Create Role </a>
                                </li> 
                                <li class="nav-item">
                                <a class="nav-link" href="{{ URL::to('assign_user_roles') }}">Assign User Roles </a>
                                </li> 
                        </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
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
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
 
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap Js -->
    
    <script src="{{ asset('vendorbootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendorbootstrap/js/bootstrap.min.js') }}"></script>


    <!-- DataTables JavaScript -->
<script>
$(document).ready(function () {


    $('#dataTables-bookings').DataTable({
        responsive: true,
        "order": [[ 6, "desc" ]],
        drawCallback: function () {
            $('#dataTables-example_wrapper .row:last-child').addClass('mb-1 align-items-baseline');
        }
    });


});
</script>
<script type="text/javascript"src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/responsive.bootstrap4.js') }}"></script>


 <!-- select2 JavaScript -->
<script type="text/javascript" src="{{ asset('select2-4.0.6/dist/js/select2.min.js') }}"></script>


<script>

$(
    function(){

        $("#selectall_permissions").click(function(){
            
        if( $(this).prop('checked')===true ){
            $(".permissions").prop('checked',true);
        }else{
            $(".permissions").prop('checked',false);
        }
        
        });

        $("#applies_to").change(function(){
            
        $('#permissionsTable').show();
        $('tr.permission').hide();
        $('tr.'+$(this).val()).show();
            
        });

        $("#works_at").change(function(){
            
        $('#roles_table').show();
        $('tr.role').hide();
        $('tr.'+$(this).val()).show();
            
        });
        
        
        $("#selectall_roles").click(function(){
            
            if( $(this).prop('checked')===true ){
                $(".roles").prop('checked',true);
            }else{
                $(".roles").prop('checked',false);
            }
            
            });

        $('.js-example-basic-single').select2();

    }
);

</script>


</body>
</html>