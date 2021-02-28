@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Stock</h4>
  
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Stocks</a></li>
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
                        <h4 class="card-title mb-4">Add Product</h4>
        
                        <form method="POST" action="{{ route('AddProduct') }}">
                            {{ csrf_field() }}
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_name">Product Name:</label>
                                        <input type="text" class="form-control" name="product_name" id="product_name">
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_quantity">Quantity:</label>
                                        <input type="text" name="product_quantity" class="form-control" id="product_quantity">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select name="brand_id" class="form-control" id="brand_id">
                                            <option value="">Select Brand...</option>
                                            @foreach ($brand as $b)
                                                <option value="{{$b->id}}">{{$b->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="product_amount">Amount(Add naira)</label>
                                        <input type="text" name="product_amount" class="form-control" id="product_amount">
                                    </div>
                                </div> 
                            </div>
        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Supplier_id">Supplier</label>
                                        <select name="supplier_id" class="form-control" id="supplier_id">
                                            <option value="">Select Supplier...</option>
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
                                        <label for="date_supplied">Date Supplied</label>
                                        <input type="date" name="date_supplied" class="form-control" id="date_supplied">
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