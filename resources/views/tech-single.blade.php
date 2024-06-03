@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Tech Blog - Stylish Magazine Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="{{url('css/responsive.css')}}" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="{{url('css/colors.css')}}" rel="stylesheet">

    <!-- Version Tech CSS for this template -->
    <link href="{{url('css/version/tech.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <livewire:header>
        <section class="section single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area text-center">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href={{route("home")}}>Home</a></li>
                                    
                                    <li class="breadcrumb-item active">{{$news['title']}}</li>
                                </ol>

                                <span class="color-orange"><a href="tech-category-01.html" title="">{{$news['category']}}</a></span>

                                <h3>{{$news['title']}}</h3>
                                @php
                                    $datetime = '2024-05-27T18:59:53.000+00:00';
                                    $dateOnly = Carbon::parse($news['created_at'])->toDateString(); // 'Y-m-d' format
                                @endphp
                                <div class="blog-meta big-meta">
                                    <small><a href="tech-single.html" title="">{{$dateOnly }}</a></small>
                                 
                                </div><!-- end meta -->

                                
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="{{$news['image_url']}}" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                               

                                {{$news['content']}}

                            

                          
                            <hr class="invis1">

                          

                         
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                   
                </div><!-- end row -->
            </div><!-- end container -->
            <hr class="invis1">
                
                <livewire:comment-list :newsId="$id" />
                
        </section>
        
        

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    @include('footer')
</body>
</html>