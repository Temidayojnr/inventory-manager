@extends('themes.index')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">User Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        {{-- @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif --}}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="{{asset('template/vertical/assets/images/users/hs.jpeg')}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="text-muted">
                                            <p class="mb-2">Inventory User Profile</p>
                                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                            <p class="mb-0">
                                                @if (Auth::user()->is_admin == 1 && Auth::user()->is_staff == 1)
                                                    Admin User
                                                @elseif(Auth::user()->is_admin == 0 && Auth::user()->is_staff == 1)
                                                    Staff User
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Personal Information</h4>

                        <p class="text-muted mb-4">I'm {{Auth::user()->name}}, A staff of the inventory department of Wesley University, Ondo.</p>
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Full Name :</th>
                                        <td>{{$u->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone Number :</th>
                                        <td>{{$u->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td>{{$u->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Location :</th>
                                        <td>Ondo, Nigeria</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Update Profile Information</h4>
                        <form action="{{route('updateProfile', $u->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$u->name}}" id="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$u->email}}" id="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="tel" name="phone_number" class="form-control" value="{{$u->phone_number ?? '--'}}" id="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="profile_image">Profile Image</label>
                                        <input type="file" name="profile_image" class="form-control" value="{{$u->profile_image ?? '--'}}" id="">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update <i class="fa fa-arrow"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>


@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000 ); // 5 secs

    });
</script>
