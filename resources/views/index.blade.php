@extends('layout/main')
@section('page_title', trans('admin.home'))
@section('additional_css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('admin.dashboard')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.dashboard')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>Country</h3>
                            <p>{{$countrycount}}</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="{{route('admin.master.country.index')}}" class="small-box-footer">{{__('admin.view-all')}} <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <!-- New Order -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>City</h3>
                            <p>{{$citycounter}}</p>
                        </div>
                        <div class="icon"><i class="fa fa-cart-plus"></i></div>
                        <a href="{{route('admin.master.city.index')}}" class="small-box-footer">{{__('admin.view-all')}} <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-custom border-transparent">
                            <h3 class="card-title card-title-color">Country wise City</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table m-0 table-head-fixed">
                                    <thead>
                                        <tr>
                                            <th>Country Name</th>
                                            <th class="text-center">No. of City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getCountry as $record)
                                        <tr>
                                            <?php
                                             $description    = $record->getCountryDescription();
                         $getcitydata = $record->cityCount($record->id);
                                               ?>
                                            <td>{{$description->country_name}}</td>
                                            <td class="text-center">{{$getcitydata}}</td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- ./col -->

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('page_specific_js')
@include('layout/datatable')
@endsection
