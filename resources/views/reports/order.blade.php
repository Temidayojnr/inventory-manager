@extends('themes.index')


@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Order Reports</h4>

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
                        <h4 class="card-title mb-4">Get Order Report</h4>
                            <div class="row">
                                <div class="col-md-6">Total Order Data <b><span id="total_records"></span></b></div>
                                    <div class="form-group">
                                        <label for="from_date">From</label>
                                        <input type="date" name="from_date" class="form-control" id="from_date">
                                    </div>
                                {{-- </div> --}}

                                {{-- <div class="col-md-6"> --}}
                                    <div class="form-group">
                                        <label for="from_date">To</label>
                                        <input type="date" name="to_date" class="form-control" id="to_date">
                                    {{-- </div> --}}
                                </div>
                                <div>
                                    <button type="button" name="filter" id="filter" class="btn btn-primary w-md">Filter <i class="fa fa-arrow"></i></button>&nbsp;
                                <button type="button" name="refresh" id="refresh" class="btn btn-primary w-md">Refresh <i class="fa fa-circle"></i></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Product</h4>
                        <a id="downloadLink" class="btn btn-sm btn-success" onclick="exportF(this)">Export to excel</a> <br> <br>
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered dt-responsive nowrap no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        {{-- <th>ID</th> --}}
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>College</th>
                                        <th>Department</th>
                                        <th>Total Quantity</th>
                                        <th>Total Cost</th>
                                        <th>Issue Date</th>
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
    function exportF(elem) {
        var table = document.getElementById("table");
        var html = table.outerHTML;
        var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
        elem.setAttribute("href", url);
        elem.setAttribute("download", "order-export.xls"); // Choose the file name
        return false;
    }
</script>

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
       url:"/reports/fetch_order",
       method:"POST",
       data:{from_date:from_date, to_date:to_date, _token:_token},
       dataType:"json",
       success:function(data)
       {
        var output = '';
        console.log(data);
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
         output += '<tr>';
         output += '<td>' + data[count].product.product_name + '</td>';
         output += '<td>' + data[count].unit_price + '</td>';
         output += '<td>' + data[count].college.college_name + '</td>';
         output += '<td>' + data[count].department.department_name + '</td>';
         output += '<td>' + data[count].quantity + '</td>';
         output += '<td>' + data[count].total_cost + '</td>';
         output += '<td>' + data[count].issue_date + '</td>';
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
