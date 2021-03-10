@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">All Orders</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>

            <div class="float-right align-items-center justify-content-between mb-4">
                <a href="/create-order" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>Add Order</a>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Department</th>
                                    <th>College</th>
                                    <th>Item Name</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Issued Date</th>
                                    <th>Invoice ID</th>
                                    <th>Requisition Number</th>
                                    <th>Requisition Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->department->department_name}}</td>
                                        <td>{{$order->college->college_name}}</td>
                                        <td>{{$order->product->product_name}}</td>
                                        <td>{{$order->product_amount}}</td>
                                        <th>{{number_format($order->quantity)}}</th>
                                        <th>₦ {{number_format($order->total_amount)}}</th>
                                        <th>{{$order->issue_date->format('jS F Y')}}</th>
                                        <th>{{$order->invoice_id}}</th>
                                        <th>{{$order->requisition_number}}</th>
                                        <td>{{$order->requisition_date->format('jS F Y')}}</td>
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
