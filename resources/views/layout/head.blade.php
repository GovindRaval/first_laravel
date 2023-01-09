<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{Helper::getFavIcon()}}">
    <title>{{Helper::getAppName()?Helper::getAppName()." | ":''}} @yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('additional_css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">

    <style>
        .help-block{
            font-weight: normal;
            font-size: 11px;
            margin-bottom: 0;
        }
        .hr-custom{
            margin-top:0px; 
        }
        .page-item.active .page-link{
            background-color:#343a40;
            border-color:#343a40;
        }
        .page-link{
            color:#343a40;
        }
        .page-link:hover{
            color:#343a40;
        }
        a{
            color:#343a40;
        }
        .table-card{
            border-bottom: none;
        }
        table.dataTable{
            margin-bottom: 0px !important;
            /*            padding: 3px;*/
        }
        .pb-0{
            padding-bottom: 0px;
        }
        table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td.dtr-control::before, table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th.dtr-control::before {
            left: 7px
        }
        .custom-search{
            width: 15%;
        }
        .pl-0
        {
            padding-left: 0px
        }
        .pl-2{
            padding-left: 2px;
        }
        .w-100{
            width: 100%;
        }
        .card-header{
            padding-bottom: 7px;
        }
        @media only screen and (min-width: 250px) and (max-width: 1800px) {
            .card-header > .card-tools .input-group, .card-header > .card-tools .nav, .card-header > .card-tools .pagination {
                margin-bottom: 2px;
            }
            .custom-search{
                width: 70%;
            }
            .table-card{
                padding-bottom: 0px;
            }
        }

    </style>
</head>