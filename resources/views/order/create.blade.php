@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
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
                            <h4 class="card-title mb-4">Create Order</h4>

                            <form method="POST" action="{{route('CreateOrder')}}">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="college">College</label>
                                            <select name="college_id" id="college" class="form-control">
                                                <option value="" selected disabled>Select college</option>
                                                @foreach($college as $c)
                                                    <option value="{{ $c->id }}">
                                                        {{ $c->college_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department">Department</label>
                                            <select name="department_id" id="department" class="form-control">
                                                {{-- AJAX FETCH RESULT HERE  --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_id">Product:</label>
                                            <select name="product_id" class="form-control" id="product_id">
                                                <option value="">Select Product...</option>
                                                @foreach ($inventory as $i)
                                                    <option value="{{$i->id}}">{{$i->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" name="quantity" class="form-control" id="quantity">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="requisition_number">Requisition Number</label>
                                            <input type="text" name="requisition_number" class="form-control" id="requisition_number">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="requisition_date">Requisition Date</label>
                                            <input type="date" name="requisition_date" class="form-control" value="<?php echo date("Y-m-d");?>" id="requisition_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="unit_price">Unit Price</label>
                                            <input type="text" name="unit_price" class="form-control" disabled id="price_id">
                                            {{-- <select name="unit_price" id="price_id" class="form-control">
                                                {{-- AJAX FOR PRICE  --}}
                                            {{-- </select> --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="issue_date">Issue Date</label>
                                        <input id="issue_date" type="date" value="<?php echo date("Y-m-d");?>" name="issue_date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="invoice_id">Invoice ID</label>
                                            <input type="text" name="invoice_id" class="form-control" id="invoice_id">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="total_cost">Total Cost</label>
                                            <input type="text" name="total_cost" class="form-control" id="total_cost" disabled>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000 ); // 5 secs

    });
</script>

<script>

$(document).ready(function() {
    $('select[name="college_id"]').on('change',function(){

        var collegeID= $(this).val();
        console.log(collegeID);
        if (collegeID) {
            $.ajax({
            url: "/get_department/"+collegeID,
            type: "GET",
            dataType: "json",
            success: function(data){
            console.log(data);
            $('select[name="department_id"]').empty();
            $.each(data,function(key,value){
                $('select[name="department_id"]').append('<option value="'+key+'">'+value+'</option>');
            });
            }
            });
        }else {
                $('select[name="department_id"]').empty();
        }
    });
})

</script>

<script>
    $(document).ready(function() {
        $('select[name="product_id"]').on('change',function(){

            var productID= $(this).val();
            console.log(productID);
            if (productID) {
                $.ajax({
                url: "/get_price/"+productID,
                type: "GET",
                dataType: "json",
                success: function(data){
                    console.log(data);
                    $('input[name="unit_price"]').empty();
                    $.each(data,function(key,value){
                        $('input[name="unit_price"]').val(value);
                    });
                }
                });
            }else {
                    $('input[name="unit_price"]').empty();
            }
        });
    })
</script>
