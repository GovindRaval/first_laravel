@extends('layout/main')
@section('page_title',  trans('admin.country'))
@section('additional_css')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection
@section('content')
@include('layout/toaster')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('admin.country')}}</h1>
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">{{__('admin.home')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.master.country.index')}}">{{__('admin.country')}}</a></li>
                        <li class="breadcrumb-item active">{{__('admin.add')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card {{config('custom.card-primary')}}">
                <div class="card-header">
                    <h3 class="card-title">{{__('admin.add_new')}}</h3>
                </div>
                <form method="post" action="{{route('admin.master.country.add')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            @foreach($languageList as $language)
                            <div class="col-md-6">
                                <div class="col-md-12 col-sm-12 p-0">
                                    <div class="form-group">
                                        <label>{{__('admin.country')}} ({{ucfirst($language->name)}})</label><span class="required"></span>
                                        <input name="country_{{$language->id}}" type="text" class="form-control length-30 {{ $errors->has('country_'.$language->id) ?'is-invalid':'' }}" placeholder="{{__('admin.country')}} ({{ucfirst($language->name)}})" value="{{old('country_'.$language->id)}}">
                                        @error('country_'.$language->id)
                                        <div class="text-red">{{ $message }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>{{__('admin.status')}}</label><span class="required"></span>
                                    <select class="form-control select2 select-is-feature {{config('custom.select2-css')}}" data-dropdown-css-class="{{config('custom.select2-css')}}" name="is_active">
                                        @foreach($isActive as $key=>$status)
                                        <option value="{{$key}}" {{ (collect(old('is_active'))->contains($key)) ? 'selected':'' }}>{{$status}}</option>
                                        @endforeach
                                    </select>
                                    @error('is_active')
                                    <div class="text-red">{{ $message }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group"> 
                                <label>{{__('admin.sorting_order')}}<span class="required"></span> <small class="{{config('custom.text-note-css')}}">({{__('admin.highest_sorting')}} : {{$sortingNumber}})</small></label>
                                <input type="text" name="sorting" placeholder="{{__('admin.sorting_order')}}" class="form-control number-input {{ $errors->has('sorting') ?'is-invalid':'' }}" value="{{old('sorting',$sortingNumber)}}">
                                @error('sorting')
                                <div class="text-red">{!! $message !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="card-footer">
                        <span class="float-left">{!!__('admin.additional_notes')!!}</span>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="{{route('admin.master.country.index')}}" class="{{config('custom.btn-danger-form')}}" title="{{__('admin.cancel')}}">{{__('admin.cancel')}}</a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="{{config('custom.btn-success-form')}}" title="{{__('admin.submit')}}">{{__('admin.submit')}}</button>
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
@include('layout/select2')
@endsection