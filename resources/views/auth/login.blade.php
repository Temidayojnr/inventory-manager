<!doctype html>
<html lang="en">


<head>
        
        <meta charset="utf-8" />
        <title>Login | Inventory Manager Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Shoe A Child Nigeria" name="description" />
        <meta content="SHOE-A-CHILD" name="Temidayo" />
        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{asset('template/vertical/assets/images/favicon.ico')}}"> --}}

        <!-- Bootstrap Css -->
        <link href="{{asset('template/vertical/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('template/vertical/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('template/vertical/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="home-btn d-none d-sm-block">
            <a href="/" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p>Sign in to continue.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{asset('template/vertical/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="/">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('img/wusto.jpeg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                  <form class="form-horizontal"method="POST" action="{{route('login')}}">
                                      {{ csrf_field() }}
                                      <div class="form-group">
                                          <label for="email">{{ __('E-Mail Address') }}</label>
                                          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email address">
                                      </div>
                                      <div class="form-group">
                                          <label for="password">{{ __('Password') }}</label>
                                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter password">
                                      </div>
              
                                      <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="customControlInline">
                                          <label class="custom-control-label" for="customControlInline">Remember me</label>
                                      </div>
                                      
                                      <div class="mt-3">
                                          <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Login</button>
                                      </div>
                                  </form>
                                </div>
            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset('template/vertical/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('template/vertical/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('template/vertical/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('template/vertical/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('template/vertical/assets/libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{asset('template/vertical/assets/js/app.js')}}"></script>
    </body>
</html>

