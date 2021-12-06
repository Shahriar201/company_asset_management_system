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
                            <h3>Asset List
                                <a class="btn btn-success float-right btn-sm" href="{{ route('allocates.add') }}">
                                    <i class="fa fa-plus-circle"></i>Add Asset Allocating</a>

                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Employee</th>
                                        <th>Asset</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($allData as $key => $allocate)

                                    <tr class="{{ $allocate->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $allocate['user']->name }}</td>
                                        <td>{{ $allocate['asset']->name }}</td>

                                        {{--
                                        @php
                                            $count_category = App\Model\Product::where('category_id', $category->id)->count();
                                        @endphp --}}

                                        <td>
                                            <a title="Edit" id="edit" class="btn btn-sm btn-primary" href="{{ route('allocates.edit', $allocate->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- @if ($count_category<1) --}}
                                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('allocates.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $allocate->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            {{-- @endif --}}

                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>

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

@endsection
