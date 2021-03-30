@extends('themes.index')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ol>
                        </div>
                    </div>

                    <div class="float-right align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#add_user"><i class="fas fa-pen fa-sm text-white-50"></i>Add User</a>
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
                    <h4 class="card-title mb-4">All Users</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table project-list-table table-nowrap table-centered table-borderless" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Staff Type</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                    {{-- <th>Manage</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $u)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$u->name}}</td>
                                        <td>{{$u->email}}</td>
                                        <th>
                                            @if ($u->is_admin == 1)
                                                <span class="badge badge-pill badge-soft-success font-size-12">Admin</span>
                                            @else
                                                <span class="badge badge-pill badge-soft-info font-size-12">Staff</span>
                                            @endif
                                        </th>
                                        <td>{{$u->created_at->format('jS F Y') ?? ''}}</td>
                                        <td>
                                            {{-- <a href="{{route('editPurchase', $u->id)}}" class="btn btn-info"><i class="fa fa-info"></i>Edit</a> --}}
                                            @if ($u->is_admin == 1)
                                                <a href="#" class="btn btn-danger" disabled>Delete</a>
                                            @else
                                                <a href="#" onclick="deleteItem('{{$u->id}}')" class="btn btn-danger">Delete</a>
                                            @endif
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


<!-- Modal -->
<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{route('AddUser')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $("document").ready(function(){
        setTimeout(function(){
            $("div.alert").remove();
        }, 5000 ); // 5 secs

    });
</script>

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
                window.location.href = "/delete-user/"+id;
            swal("Poof! Store User has been deleted!", {
                icon: "success",
            });
            } else {
            swal("Store User is safe!");
            }
        });
    }
</script>
