@extends('backend.layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Asset Allocating</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Allocating</li>
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
                                @if (isset($editData))
                                    Edit Asset Allocating

                                    @else
                                    Add Asset Allocating

                                @endif
                                <a class="btn btn-success float-right btn-sm" href="{{ route('allocates.view') }}">
                                    <i class="fa fa-list"></i>Asset Allocating List</a>
                            </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                        {{-- User add form --}}
                        <form method="post" action="{{ (@$editData) ? route('allocates.update', $editData->id): route('allocates.store') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="employee_id">Employee</label>
                                    <select name="employee_id" id="employee_id" class="form-control">
                                        <option value="">Select Employee</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ (@$editData->employee_id==$user->id)? "selected": "" }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="asset_id">Asset</label>
                                    <select name="asset_id" id="asset_id" class="form-control">
                                        <option value="">Select Asset</option>
                                        @foreach ($assets as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary btn-sm">{{ (@$editData)? 'Update': 'Submit' }}</button>
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

{{-- jQuary validation --}}
    <script>
        $(function () {

        $('#myForm').validate({
            rules: {
            employee_id: {
                required: true,
            },
            asset_id: {
                required: true,
            }
            },

            messages: {
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
