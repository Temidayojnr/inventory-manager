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
                                        <img src="{{asset('template/vertical/assets/images/users/hs.jpeg')}}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                    </div>
                                    <div class="media-body align-self-center">
                                        <div class="text-muted">
                                            <p class="mb-2">Welcome to the Admin dashboard</p>
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
                                    <h4>{{$orders}} <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
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
                                    <h5 class="font-size-14 mb-0">Products</h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>{{$products}} <i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
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
                                    <h5 class="font-size-14 mb-0">Available Products</h5>
                                </div>
                                <div class="text-muted mt-4">
                                    <h4>{{$available_product}}<i class="mdi mdi-chevron-up ml-1 text-success"></i></h4>
                                    
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

        @if (Auth::user()->is_admin == 1)
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Users</h4>

                        <div class="row text-center">
                            <div class="table-responsive">
                                <table table class="project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <th>Name</th>
                                        <th>Staff Type</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $u)
                                            <tr>
                                                <td>{{$u->name}}</td>
                                                <td>
                                                    @if ($u->is_admin == 1)
                                                        <span class="badge badge-success">Admin</span>
                                                    @else
                                                    <span class="badge badge-info">Admin</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- <canvas id="bar" height="300"></canvas> --}}

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Inventory Overview</h4>

                        <div class="row text-center">
                            <div class="col-4">
                                <h5 class="mb-0">{{$products}}</h5>
                                <p class="text-muted text-truncate">Products</p>
                            </div>
                        </div>
                        {{-- <div id="pie_chart" style="width:750px; height:450px;">

                        </div> --}}
                        <canvas id="canvas" height="220"></canvas>

                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Product</h4>
                        <div class="table-responsive">
                            <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand</th>
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>Total Stock</th>
                                        <th>Unit Price</th>
                                        <th>Total Stock Value</th>
                                        <!--<th>Supplier</th>-->
                                        {{-- <th>Date Supplied</th> --}}
                                        <th>Status</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventory as $i)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$i->brand->name}}</td>
                                            <td>{{$i->product_name}}</td>
                                            <th>EACH</th>
                                            <th>{{number_format($i->product_quantity)}}</th>
                                            <th>₦ {{number_format($i->product_amount)}}</th>
                                            <th>₦ {{number_format($i->stock_value)}}</th>
                                            {{-- <td>{{$i->date_supplied->format('jS F Y')}}</td> --}}
                                            <th>
                                                @if ($i->status == 1)
                                                    <span class="badge badge-pill badge-soft-success font-size-12">Available</span>
                                                @endif
                                            </th>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item btn-primary" href="{{route('EditProduct', $i->id)}}"><i class="fa fa-info"></i> Edit</a>
                                                        <a class="dropdown-item btn-danger" href="#" onclick="deleteItem('{{$i->id}}')"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
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
        @endif



    </div> <!-- container-fluid -->
</div>
@endsection
{{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <script>
        var url = "{{url('/chart')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.created_at);
                Labels.push(data.product_name);
                Prices.push(data.product_amount);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Years,
                      datasets: [{
                          label: 'Product Overview',
                          data: Prices,
                          borderWidth: 1
                      }]
                  },
                  options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                  }
              });
          });
        });
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function deleteItem(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, It ceases to Exist!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = "/products/"+id;
            swal("Poof! product has been deleted!", {
                icon: "success",
            });
            } else {
            swal("Product is safe!");
            }
        });
    }
</script>