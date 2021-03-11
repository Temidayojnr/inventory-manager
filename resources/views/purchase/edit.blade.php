@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Purchase</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchase</a></li>
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
                            <h4 class="card-title mb-4">Edit Purchase</h4>
            
                            <form method="POST" action="{{route('UpdatePurchase', $purchase->id)}}">
                                {{ csrf_field() }}
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_name">Product Name:</label>
                                            <input type="text" name="product_name" value="{{$purchase->product_name}}" class="form-control" id="product_name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier:</label>
                                            <select name="supplier_id" class="form-control" id="supplier_id">
                                                <option value="">Select supplier...</option>
                                                @foreach ($supplier as $s)
                                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brand_id">Brand:</label>
                                            <select name="brand_id" class="form-control" id="brand_id">
                                                <option value="">Select Brand...</option>
                                                @foreach ($brand as $b)
                                                    <option value="{{$b->id}}">{{$b->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="supplier_email">Supplier Email</label>
                                                <input type="email" name="supplier_email" value="{{$purchase->supplier_email}}" class="form-control" id="supplier_email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" name="quantity" value="{{$purchase->quantity}}" class="form-control" id="quantity">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_supplied">Date Supplied</label>
                                            <input type="date" name="date_supplied" value="{{$purchase->date_supplied}}" class="form-control" id="date_supplied">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit_price">Unit Price</label>
                                            <input type="text" name="unit_price" value="{{$purchase->unit_price}}" class="form-control" id="unit_price">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" name="phone_number" value="{{$purchase->phone_number}}" class="form-control" id="phone_number">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="invoice_id">Invoice ID</label>
                                            <input type="text" name="invoice_id" value="{{$purchase->invoice_id}}" class="form-control" id="invoice_id">
                                        </div>
                                    </div>
                                </div>
            
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit <i class="fa fa-arrow"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection