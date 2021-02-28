@extends('themes.index')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Inventory Manager</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="media">
                                    <div class="mr-3">
                                        <img src="{{asset('template/vertical/assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="text-muted">
                                            <p class="mb-2">Welcome to the Admin dashboard</p>
                                            <h5 class="mb-1">Timi</h5>
                                            <p class="mb-0">Store Admin</p>
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
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card bg-soft-primary">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i class="bx bx-copy-alt"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">Orders</h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>1,452 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                    <div class="d-flex">
                                        <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ml-2 text-truncate">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i class="bx bx-archive-in"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">Revenue</h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>$ 28,452 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                    <div class="d-flex">
                                        <span class="badge badge-soft-success font-size-12"> + 0.2% </span> <span class="ml-2 text-truncate">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-xs mr-3">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-18">
                                            <i class="bx bx-purchase-tag-alt"></i>
                                        </span>
                                    </div>
                                    <h5 class="font-size-14 mb-0">Average Price</h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>$ 16.2 <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                    
                                    <div class="d-flex">
                                        <span class="badge badge-soft-warning font-size-12"> 0% </span> <span class="ml-2 text-truncate">From previous period</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Stock</h4>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Brand</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Supplier</th>
                                        <th>Total Amount</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory as $i)
                                    <tr>
                                        <td>{{$i->brand}}</td>
                                        <td>{{$i->product_name}}</td>
                                        <td>{{$i->created_at->format('jS F Y')}}</td>
                                        <td>{{$i->slug}}</td>
                                        <td>
                                            <span class="badge badge-pill badge-soft-success font-size-12">Published</span>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- container-fluid -->
</div>
@endsection