@php
    use Carbon\Carbon;
@endphp

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    {{-- <script src="../assets/js/color-modes.js"></script> --}}
    <script src="{{ asset('js/color.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Offcanvas navbar template · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/offcanvas-navbar/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="{{ asset('css/version/tech.css') }}" rel="stylesheet">

    {{-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/offcanvasnavbar.css') }}">

</head>

<body class="bg-body-tertiary">

        <livewire:header>        
            
            <section class="section">
                <div class="container">
                    @if($news != null)
                    <h1>News Management</h1>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                          
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($news as $dt)
                            <tr>
                                <th scope="row">{{$dt['id']}}</th>
                                <td><img style="width:100%; height:100px;" src="{{$dt['image_url']}}" alt=""></td>
                                <td>{{$dt['title']}}</td>
                              
                                <td><button class="btn btn-primary">Edit</button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                      @else       
                      <div class="alert alert-danger" role="alert">
                          There is a problem with news service, please try again later
                        </div>
                      @endif
                    
                </div>
            </section>
            <section class="section">
                <div class="container">
                    @if($comments != null)       

                    
                    <h1>Comments Management</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">News title</th>
                            <th scope="col">Message</th>
                            <th scope="col">Author Name</th>
                            
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($comments as $dt)
                            <tr>
                                <th scope="row">{{$dt['id']}}</th>
                                <td>{{$dt['news']['title'] ?? 'No title'}}</td>
                                <td>{{$dt['message']}}</td>
                                <td>{{$dt['user']['fullName'] ?? 'No full name'}}</td>
                                <td><button class="btn btn-primary">Edit</button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                      @else       
                      <div class="alert alert-danger" role="alert">
                          There is a problem with comment service, please try again later
                        </div>
                      @endif

                </div>
            </section>
            <section class="section">
                <div class="container">
                    @if($users != null)
                    <h1>Users Management</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email</th>
                            
                            
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $dt)
                            <tr>
                                <th scope="row">{{$dt['id']}}</th>
                                <td>{{$dt['fullName'] ?? 'null'}}</td>
                                <td>{{$dt['email']}}</td>
                                <td><button class="btn btn-primary">Edit</button></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    @else       
                    <div class="alert alert-danger" role="alert">
                        There is a problem with users service, please try again later
                      </div>
                    @endif
                </div>
            </section>

    {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="offcanvas-navbar.js"></script> --}}
    <script src="{{ asset('js/offcanvas-navbar.js') }}"></script>

</body>

</html>
