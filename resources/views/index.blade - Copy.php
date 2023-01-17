@extends('layout/main')
@section('page_title', trans('admin.home'))
@section('additional_css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datetimepicker/bootstrap-4.min.css')}}" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
    .dashboard-card-bg {
        background-color: #02025A;
        color: #FFF;
    }

</style>
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
                       $citiesString = $getcitydata->join(', ');
                                               ?>
                                            <td>{{$description->country_name}}</td>
                                            <td class="text-center">{{$citiesString}}</td>
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
            <div class="container-fluid">
                <h3>{{__('admin.user_created_date')}}</h3>
                <form class="list-table" id="form-search1" method="get" action="{{route('admin.home.index')}}">
                    <div class="row">
                        <div class="col-12">
                            <section class="content">
                                <div class="card {{config('custom.card-primary')}}">
                                    <div class="card-body pb-0">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <input data-toggle="datetimepicker" data-target=".fromDate" class="fromDate form-control datetimepicker-input" placeholder="From Date" name="fromDate" type="text">
                                                        <div class="input-group-append" data-toggle="datetimepicker" data-target=".fromDate">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('fromDate')
                                                    <div class="text-red">{{ $message }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <input data-toggle="datetimepicker" data-target=".toDate" class="toDate form-control datetimepicker-input" placeholder="To Date" name="toDate" type="text">
                                                        <div class="input-group-append" data-toggle="datetimepicker" data-target=".toDate">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('toDate')
                                                    <div class="text-red">{{ $message }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <div class="input-group btn-toolbar">
                                                        <div class="btn-group">
                                                            <button type="button" id="serchBtn1" class="{{config('custom.btn-success-form')}}" title="{{__('admin.search')}}">{{__('admin.search')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <!-- New Order -->
                            <div class="small-box dashboard-card-bg" style="font-size: 21px">
                                <div class="inner">
                                    <b>Total Countries</b>
                                    <p>0</p>
                                </div>
                                <div class="icon"><i class=""></i></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <!-- New Order -->
                            <div class="small-box dashboard-card-bg" style="font-size: 21px">
                                <div class="inner">
                                    <b>Total City </b>
                                    <p>0</p>
                                </div>
                                <div class="icon"><i class=""></i></div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <!-- New Order -->
                            <div class="small-box dashboard-card-bg" style="font-size: 21px">
                                <div class="inner">
                                    <b>Total User</b>
                                    <p>0</p>
                                </div>
                                <div class="icon"><i class=""></i></div>
                            </div>
                        </div>


                    </div>
                    <!-- /.row -->
                </form>
                <hr>
            </div><!-- /.container-fluid -->
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('page_specific_js')
<script src="{{asset('plugins/jquery/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('plugins/datetimepicker/bootstrap-4.js')}}" crossorigin="anonymous"></script>
@include('layout/datatable')
@endsection
<script>


</script>
