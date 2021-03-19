@extends('themes.index')


@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Inventory Reports</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
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
                        <h4 class="card-title mb-4">Get Reports</h4>
                            <div class="row">
                                <div class="col-md-6">Total Data <b><span id="total_records"></span></b></div>
                                <div class="col-md-6">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" name="from_date" id="from_date" readonly class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker" data-date-autoclose="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>

                                    <label>To</label>
                                    <div class="input-group">
                                        <input type="text" name="to_date" id="to_date" readonly class="form-control" placeholder="dd M, yyyy"  data-date-format="dd M, yyyy" data-provide="datepicker" data-date-autoclose="true">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_supplied">From</label>
                                        <input type="date" name="date_supplied" class="form-control" id="date_supplied">
                                    </div>
                                </div> --}}

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unit_price">Unit Price</label>
                                        <input type="text" name="unit_price" class="form-control" id="unit_price">
                                    </div>
                                </div> --}}
                                <button type="button" name="filter" id="filter" class="btn btn-primary w-md">Filter <i class="fa fa-arrow"></i></button>&nbsp;
                                <button type="button" name="refresh" id="refresh" class="btn btn-primary w-md">Refresh <i class="fa fa-circle"></i></button>
                            </div>
        
                            {{-- <div>
                                <button type="button" name="filter" id="filter" class="btn btn-primary w-md">Filter <i class="fa fa-arrow"></i></button>
                                <button type="button" name="refresh" id="refresh" class="btn btn-primary w-md">Refresh <i class="fa fa-circle"></i></button>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Product</h4>
                        <div class="table-responsive">
                            <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>stock Value</th>
                                        <th>Date Supplied</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody >

                                </tbody>
                            </table>
                            {{ csrf_field() }}
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function(){
    
     var date = new Date();
     console.log(date);
    
     $('.input-group').datepicker({
      todayBtn: 'linked',
    //   format: 'yyyy-mm-dd',
      autoclose: true
     });
    
     var _token = $('input[name="_token"]').val();
     console.log(_token);
    
     fetch_data();
    
     function fetch_data(from_date = '', to_date = '')
     {
      $.ajax({
       url:"/reports/fetch_data",
       method:"POST",
       data:{from_date:from_date, to_date:to_date, _token:_token},
       dataType:"json",
       success:function(data)
       {
        var output = '';
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
         output += '<tr>';
         output += '<td>' + data[count].product_name + '</td>';
         output += '<td>' + data[count].product_quantity + '</td>';
         output += '<td>' + data[count].stock_value + '</td>';
         output += '<td>' + data[count].date_supplied + '</td>';
        //  output += '<td>' + data[count].status + '</td></tr>';
        }
        $('tbody').html(output);
       }
      })
     }
    
     $('#filter').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      if(from_date != '' &&  to_date != '')
      {
       fetch_data(from_date, to_date);
      }
      else
      {
       alert('Both Date is required');
      }
     });
    
     $('#refresh').click(function(){
      $('#from_date').val('');
      $('#to_date').val('');
      fetch_data();
     });
    
    
    });
    </script>