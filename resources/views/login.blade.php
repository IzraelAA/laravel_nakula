<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Monster Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
<link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{url('assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="{{url('assets/styles/main.css')}}">

</head>

<body class="fix-header card-no-border">
    
    
        <!-- Navbar -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <main class="login-container">
            <div class="container">
                <div class="row page-login d-flex align-items-center">
                    <div class="section-left col col-12 col-md-6">
                        <h1 class="mb-4"><br> NAKULA EDU</h1>
                        <h6>
                            
Aplikasi mobile dan Web base yang bertujuan mengimplementasikan system pembelajaran jarak jauh untuk menghubungkan antara Sekolah, Guru dan Siswa secara terintegrasi dan realtime monitoring serta dilengkapi dengan sistem akademik sekolah
                        </h6>
                    </div>
                    <div class="section-right col col-12 col-md-4">
                        <div class="card">
                            @if (session('create'))
                                <div class="alert alert-danger text-center">
                                    {{ session('create') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="assets/logo/logonakulaedu.png" class="w-50 mb-4" alt="">

                                </div>
                                <form method="post" action="{{ url('loginadmin') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" type="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="email" autofocus
                                            placeholder="Masukan Name">
    
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Masuksan Password">
    
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="btn btn-login btn-block mt-2">Masuk</button>
                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
            </main>
    
    
    
         
    <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{url('assets/plugins/bootstrap/js/tether.min.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{url('assets/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->


    <script src="{{url('assets/js/waves.js')}}"></script>
    <!--Menu sidebar -->
<script src="{{url('assets/js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
<script src="{{url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
<script src="{{url('assets/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
