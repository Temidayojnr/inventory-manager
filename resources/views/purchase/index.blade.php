@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Purchase(s)</h4>
        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Purchases</a></li>
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
                    <h4 class="card-title mb-4">Purchases</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Purchase Date</th>
                                    <th>Supplier Name</th>
                                    <th>Item Name</th>
                                    <th>Unit Price</th>
                                    <th>Total Amount</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase as $p)
                                    <tr>
                                        <td>{{$p->created_at->format('jS F Y')}}</td>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$p->supplier->name}}</td>
                                        <td>{{$p->product->product_name}}</td>
                                        <td>₦ {{number_format($p->unit_price)}}</td>
                                        <th>{{number_format($p->quantity)}}</th>
                                        <th>₦ {{number_format($p->total_amount)}}</th>
                                        <th>{{$p->invoice_id}}</th>
                                        <td>
                                            <a href="{{route('editPurchase', $p->id)}}" class="btn btn-priamry"><i class="fa fa-info"></i>Edit</a>
                                            <a href="#" onclick="deleteItem('{{$p->id}}')" class="btn btn-danger">Delete</a>
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
        </div>
    </div>
@endsection

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
                window.location.href = "/purchase/delete/"+id;
            swal("Poof! purchase item has been deleted!", {
                icon: "success",
            });
            } else {
            swal("Purchase Item is safe!");
            }
        });
    }
</script>
  