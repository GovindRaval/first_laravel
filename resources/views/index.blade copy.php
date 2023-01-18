@extends('layout/main')
@section('page_title', trans('admin.home'))
@section('additional_css')

{{-- <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('plugins/datetimepicker/bootstrap-4.min.css')}}" crossorigin="anonymous" />
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
                </div>
                <!-- /.col -->

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
            <!-- /.row -->
        </div><!-- /.container-fluid -->

        <!--  form 1 filter-->
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
                                <b>Total Country</b>
                                <p>{{$countryTotal}}</p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <!-- New Order -->
                        <div class="small-box dashboard-card-bg" style="font-size: 21px">
                            <div class="inner">
                                <b>Total City</b>
                                <p>{{$cityTotal }}</p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <!-- New Order -->
                        <div class="small-box dashboard-card-bg" style="font-size: 21px">
                            <div class="inner">
                                <b>Total Video</b>
                                <p>{{$videoTotal }}</p>
                            </div>
                            <div class="icon"><i class=""></i></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
<!-- /.row -->
<!--form 2 start code filter wise-->
<div class="container-fluid">
    <!-- /.row -->
    <h3>{{__('admin.user_created_date')}}</h3>
    <form class="list-table" id="form-search2" method="get" action="{{route('admin.home.index')}}">
        <div class="row">
            <div class="col-12">
                <section class="content">
                    <div class="card {{config('custom.card-primary')}}">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="form-group col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <select name="camp_status" class="form-control select2 select-camp-status {{config('custom.select2-css')}}" data-dropdown-css-class="{{config('custom.select2-css')}}" style="width: 100%" id="camp_status">
                                            <option selected value="" disabled="">Select Camp Status</option>
                                            @foreach($campStatus as $key=>$val)
                                            <option value="{{$key}}" {{ (collect($filterCampStatus)->contains($key)) ? 'selected':'' }}>
                                                {{$val?ucfirst($val):''}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group date">
                                            <input data-toggle="datetimepicker" data-target=".camp-date" class="camp-date form-control datetimepicker-input" placeholder="{{__('admin.camp_from_date')}}" name="created_at" type="text">
                                            <div class="input-group-append" data-toggle="datetimepicker" data-target=".camp-date">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('created_at')
                                        <div class="text-red">{{ $message }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group date">
                                            <input data-toggle="datetimepicker" data-target=".end-date" class="end-date form-control datetimepicker-input" placeholder="{{__('admin.camp_to_date')}}" name="to_date" type="text">
                                            <div class="input-group-append" data-toggle="datetimepicker" data-target=".end-date">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @error('to_date')
                                        <div class="text-red">{{ $message }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="btn-toolbar float-right">
                                <div class="btn-group">
                                    <button type="button" id="searchBtn2" class="{{config('custom.btn-success-form')}}" title="{{__('admin.search')}}">{{__('admin.search')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header card-header-custom border-transparent">
                        <h3 class="card-title card-title-color">User By Camp</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0 table-head-fixed">
                                <thead>
                                    <tr>
                                        <th>Camp Name</th>
                                        <th class="text-center">No. of User</th>
                                        <th class="text-center">No. of Campers </th>
                                        <th class="text-center">No Login App </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(false)
                                    @forelse($campDetail as $record)
                                    <tr>
                                        <?php
                                                $description     = $record->getCampDescription();
//                                                $campUserCount   = $record->getCampUserCount($record->id) ? $record->getCampUserCount($record->id) : 0;//old
                                                $campUserCount   = $record->getCampUserCountCampAdminDashboard($record->id, $filterCampStatus, $fromDateFilter, $toDateFilter);
                                                $totalUSerCount  = $record->getTotalUser() ? $record->getTotalUser()->no_of_user : 0;
                                                $totalChildCount = $record->getTotalChildCampAdmin($record->id, $filterCampStatus, $fromDateFilter, $toDateFilter);
                                                $userByChildGet  = $record->getUserBychildGetTotal($record->id, $filterCampStatus, $fromDateFilter, $toDateFilter);
                                                ?>
                                        <td>{{$description ? $description->camp_name : ''}}</td>
                                        <td class="text-center">{{$campUserCount}}</td>
                                        <td class="text-center">{{$totalChildCount?$totalChildCount->count():'0'}}</td>
                                        <td class="text-center">{{$userByChildGet?$userByChildGet:'0'}}</td>

                                    </tr>
                                    @empty
                                    @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>
    </form>
</div>

</div>

</section>
</div>
@endsection
@section('page_specific_js')
<script src="{{asset('plugins/jquery/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('plugins/datetimepicker/bootstrap-4.js')}}" crossorigin="anonymous"></script>
@include('layout/datatable')
<script>
    $(document).ready(function() {

        //form 1 submit call filter    
        $('#serchBtn1').click(function() {
            $("#form-search1").attr("action", "{{ route('admin.home.index') }}");
            $("#form-search1").submit();
        });
    });

    //from 2 date formate
    startDate();
    endDate();
    $(".fromDate").on('change.datetimepicker', function(e) {
        var from = $(this).val();
        //                                                $(".end-date").datetimepicker("destroy");
        endDate(e.date);
        //                                                $(".end-date").datetimepicker('minDate', e.date);
    });

    function startDate() {
        $('.fromDate').inputmask("99-99-9999");
        $(".fromDate").datetimepicker({
            format: "{{config('custom.js_date_format')}}"
            , ignoreReadonly: true
            , buttons: {
                showClear: false
            , }
            , icons: {
                clear: 'fa fa-trash'
            , }
        , });
        //                                                $(".camp-date").val("{{date(config('custom.php_date_format'),strtotime(isset($fromDateFilter)?$fromDateFilter:date('Y-m-d')))}}");
        $(".fromDate").val("{{isset($fromDate)?$fromDate:''}}");
    }

    function endDate($defaultDate = false) {
        $('.toDate').inputmask("99-99-9999");
        $(".toDate").datetimepicker({
            format: "{{config('custom.js_date_format')}}",
            //                                minDate: $defaultDate ? $defaultDate : moment("{{date('Y-m-d')}}"),
            ignoreReadonly: true
            , buttons: {
                showClear: false
            , }
            , icons: {
                clear: 'fa fa-trash'
            , }
        });
        //                                                $(".end-date").val("{{date(config('custom.php_date_format'),strtotime(isset($toDateFilter)?$toDateFilter:date('Y-m-d')))}}");
        $(".toDate").val("{{isset($toDate)?$toDate:''}}");
    }

</script>

@endsection
