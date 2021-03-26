@extends('themes.index')

<style>
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">All Products</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>

            <div class="float-right align-items-center justify-content-between mb-4">
                <a href="/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>Add Product</a>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Product</h4>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    {{-- <th>Unit</th> --}}
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
                                        {{-- <th>EACH</th> --}}
                                        <th>{{number_format($i->product_quantity)}}</th>
                                        <th>₦ {{number_format($i->product_amount)}}</th>
                                        <th>₦ {{number_format($i->stock_value)}}</th>
                                        {{-- <td>{{$i->date_supplied->format('jS F Y')}}</td> --}}
                                        <th>
                                            {{-- @if ($i->status == 1)
                                                <span class="badge badge-pill badge-soft-success font-size-12">Available</span>
                                            @endif --}}
                                            <label class="switch">
                                                <input class="product_status" id="{{$i->id}}" type="checkbox" data-id="{{$i->id}}" name="status" onclick="updateStatus('{{$i->id}}')" {{ $i->status ? 'checked' : '' }} data-toggle="toggle">
                                                <span class="slider round"></span>
                                            </label>
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



@endsection

{{-- @section('scripts') --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

<script>
    function updateStatus(id){
        $('.product_status').change(function() {
            var status_id = $(this).attr("data-id");
            // console.log(status_id);
            var status = $(this).prop('checked') == true ? 1 : 0;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "/change-status",
                data: {
                    id: status_id,
                    status: status,
                    _token: _token
                },
                success: function(result) {
                    swal({
                        title: result,
                        icon: "success",
                    });
                }
            });
        })
    }
</script>
{{-- @endsection --}}

