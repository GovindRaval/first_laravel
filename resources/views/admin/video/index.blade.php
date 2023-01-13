@extends('layout/main')
@section('page_title', trans('admin.video'))
@section('additional_css')
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @include('layout/toaster')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('admin.video')}}</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.video.index')}}">{{__('admin.video')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.list')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <form class="list-table" method="get" action="{{route('admin.video.index')}}">
                        <div class="card {{config('custom.card-primary')}}">
                            <div class="table-card card-header pl-0">
                                <div class="card-tools w-100">
                                    {{-- @include('common/paginate') --}}
                                    <div class="input-group input-group-sm float-right custom-search">
                                        <input type="text" name="q" class="form-control float-right float-sm-right" placeholder="{{__('admin.search')}}" value="{{isset($searchText)?$searchText:''}}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" title="{{__('admin.search')}}"><i class="fas fa-search"></i></button>
                                        </div>
                                        @canany([config('custom_middleware.create_video')])
                                        <a class="pl-2" href="{{route('admin.video.add')}}"><button type="button" class="{{config('custom.btn-primary','btn btn-outline-primary')}} add-new-btn" title="{{__('admin.add')}}">{{__('admin.add')}}</button></a>
                                        @endcanany
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <table data-model="AdminVideo" class="table sorting-table table-striped">
                                <thead>
                                    <tr>
                                        <th class="asc-desc text-center" id="@if($sortKey == 'sorting'){{$sortVal}}@endif">{{__('admin.index')}}<input @if($sortKey !='sorting' ) disabled="" @endif name="sorting" type="hidden" value="@if($sortKey == 'sorting'){{$sortVal}}@endif"></th>
                                        <th class="asc-desc" id="@if($sortKey == 'video_name'){{$sortVal}}@endif">{{__('admin.video-name')}} <input @if($sortKey !='video_name' ) disabled="" @endif type="hidden" name="video_name" value="@if($sortKey == 'video_name'){{$sortVal}}@endif"></th>
                                        <th class="asc-desc" id="@if($sortKey == 'video_url'){{$sortVal}}@endif">{{__('admin.video-url')}} <input @if($sortKey !='video_url' ) disabled="" @endif type="hidden" name="video_url" value="@if($sortKey == 'video_url'){{$sortVal}}@endif"></th>
                                        <th class="asc-desc text-center" id="@if($sortKey == 'is_active'){{$sortVal}}@endif">{{__('admin.status')}}<input @if($sortKey !="is_active" ) disable="" @endif type="hidden" name="is_active" value="@if($sortKey == 'is_active'){{$sortVal}}@endif"></th>
                                        @canany([config('custom_middleware.edit_video'),config('custom_middleware.delete_video')])
                                        <th class="text-center">{{__('admin.action')}}</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($VideoList as $record)
                                    {{-- <?php dd('$record')?> --}}
                                    @php
                                    $description = $record->GetVideoDescription();

                                    @endphp
                                    <tr id="{{$record->id}}">
                                        <td class="text-center">{{$record->sorting}}</td>
                                        <td>{{ $description ?ucfirst($description->video_name):''}}</td>
                                        {{-- <td>{{ $description?ucfirst($description->video_name):''}}</td> --}}
                                        <td>{{$description? $description->video_url:''}}</td>
                                        <td class="text-center">@if($record->is_active)
                                            <span class="{{config('custom.badge-success','badge bg-success')}}">{{__('admin.active')}}</span>
                                            @else
                                            <span class="{{config('custom.badge-danger','badge bg-danger')}}">{{__('admin.in_active')}}</span>

                                            @endif
                                        </td>
                                        @canany([config('custom_middleware.edit_video'),config('custom_middleware.delete_video')])
                                        <td class="text-center">
                                            @can(config('custom_middleware.edit_video'))
                                            <a href="{{route('admin.video.edit',['id'=>$record->id])}}"><button type="button" class="{{config('custom.btn-primary','btn btn-outline-primary btn-sm')}}" title="{{__('admin.edit')}}"><i class="fas fa-edit"></i></button></a>
                                            @if($record->is_active)
                                            <a href="{{route('admin.video.change-status',['id'=>$record->id,'active'=>0]).'?'.http_build_query($_GET)}}"><button type="button" class="{{config('custom.btn-danger','btn btn-outline-danger btn-sm')}}" title="{{__('admin.click_in_active')}}"><i class="fas fa-times"></i></button></a>
                                            @else
                                            <a href="{{route('admin.video.change-status',['id'=>$record->id,'active'=>1]).'?'.http_build_query($_GET)}}"><button type="button" class="{{config('custom.btn-success','btn btn-outline-success btn-sm')}}" title="{{__('admin.click_active')}}"><i class="fas fa-check"></i></button></a>
                                            @endif
                                            @endcan
                                            @can(config('custom_middleware.delete_country'))
                                            <a onclick="showSweetAlert('{{route('admin.video.delete',['id'=>$record->id])}}')"><button type="button" class="{{config('custom.btn-danger','btn btn-outline-danger btn-sm')}}" title="{{__('admin.delete')}}"><i class="fas fa-trash"></i></button></a>
                                            @endcan
                                        </td>
                                        @endcanany
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                    </form>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection
@section('page_specific_js')
@include('common/sorting')
@include('layout/sweetalert')
@include('layout/datatable')
@endsection
