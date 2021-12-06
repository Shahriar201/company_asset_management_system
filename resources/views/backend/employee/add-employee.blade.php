@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Employee</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-md-12">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                @if(isset($editData))
                                    Edit Employee
                                @else
                                    Add Employee
                                @endif

                                <a class="btn btn-success float-right btn-sm" href="{{ route('employees.view') }}">
                                    <i class="fa fa-list"></i>Employee List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData)? route('employees.update', $editData->id): route('employees.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="name">Name</label></label>
                                    <input type="text" name="name" value="{{ @$editData->name }}" id="name" class="form-control">

                                    <font style="color:red">
                                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                                    </font>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="department">Department</label></label>
                                    <input type="text" name="department" value="{{ @$editData->department }}" id="department" class="form-control">

                                    <font style="color:red">
                                        {{ $errors->has('department') ? $errors->first('department') : '' }}
                                    </font>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label></label>
                                    <input type="email" name="email" value="{{ @$editData->email }}" id="email" class="form-control">

                                    <font style="color:red">
                                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                                    </font>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label></label>
                                    <select name="gender" id="gender" class="form-control form-control-sm">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ @$editData->gender == 'Male' ? 'selected' : '' }} >Male</option>
                                        <option value="Female" {{ @$editData->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>

                                    <font style="color:red">
                                        {{ $errors->has('gender') ? $errors->first('gender') : '' }}
                                    </font>
                                </div>

                                <div class="form-group col-md-6" style="padding-top:30px">
                                    <input type="submit" value="{{ (@$editData)? 'Update': 'Submit' }}" class="btn btn-primary">
                                </div>
                            </div>


                          </form>


                        </div>
                        <!-- /.card-body -->
                    </div>

                </section>

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script validation -->
<script>
    $(function () {

      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
          department: {
            required: true,
          },
          email: {
            required: true,
          },
          gender: {
            required: true,
          },

        },
        messages: {
          name: {
            required: "Please enter asset name"
          },
          department: {
            required: "Please enter your department name"
          },
          email: {
            required: "Please enter your email name"
          },
          gender: {
            required: "Please enter your gender name"
          },

          //terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>

@endsection
