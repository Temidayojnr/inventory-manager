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

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        {{-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

    @if (Auth::user()->is_admin == 1)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Order</h4>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                        {{-- <th>Issue</th> --}}
                                        {{-- <th>Deleted By</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        {{-- @if ($order->isDeleted == 0) --}}
                                            <tr>
                                                <td>{{$order->department->department_name}}</td>
                                                <td>{{$order->college->college_name}}</td>
                                                <td>{{$order->product->product_name ?? ''}}</td>
                                                <td>₦ {{number_format($order->unit_price)}}</td>
                                                <td>{{number_format($order->quantity)}}</td>
                                                <td>₦ {{number_format($order->total_cost)}}</td>
                                                <td>{{$order->issue_date->format('jS F Y')}}</td>
                                                <td>{{$order->invoice_id}}</td>
                                                <td>{{$order->requisition_number}}</td>
                                                <td>{{$order->requisition_date->format('jS F Y')}}</td>
                                                {{-- <td>
                                                    @if ($order->isDeleted == 1)
                                                        <span class="badge badge-pill badge-soft-danger font-size-12">Deleted</span>
                                                    @endif
                                                </td> --}}
                                                {{-- <th>{{$order->who_deleted->name ?? ' '}}</th> --}}
                                            </tr>
                                        {{-- @endif     --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    @else
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
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        @if ($order->isDeleted == 0)
                                            <tr>
                                                <td>{{$order->department->department_name}}</td>
                                                <td>{{$order->college->college_name}}</td>
                                                <td>{{$order->product->product_name ?? ''}}</td>
                                                <td>₦ {{number_format($order->unit_price)}}</td>
                                                <th>{{number_format($order->quantity)}}</th>
                                                <th>₦ {{number_format($order->total_cost)}}</th>
                                                <th>{{$order->issue_date->format('jS F Y')}}</th>
                                                <th>{{$order->invoice_id}}</th>
                                                <th>{{$order->requisition_number}}</th>
                                                <td>{{$order->requisition_date->format('jS F Y')}}</td>
                                                {{-- <td>
                                                    <a href="{{route('DeleteOrder', $order->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Order</a>
                                                </td> --}}
                                            </tr>
                                        @endif
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



@endsection


<script src="{{asset('js/jquery.min.js')}}"></script>

@push('scripts')

@endpush
