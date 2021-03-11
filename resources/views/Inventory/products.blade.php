@extends('themes.index')

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
                        <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Brand</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Total Stock Value</th>
                                    <!--<th>Supplier</th>-->
                                    <th>Date Supplied</th>
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
                                        <th>{{number_format($i->product_quantity)}}</th>
                                        <th>₦ {{number_format($i->product_amount)}}</th>
                                        <th>₦ {{number_format($i->stock_value)}}</th>
                                        <td>{{$i->date_supplied->format('jS F Y')}}</td>
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



@endsection

{{-- @section('scripts') --}}
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
{{-- @endsection --}}