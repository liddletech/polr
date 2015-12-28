<!--
Polr, a minimalist URL shortening platform.
Copyright (C) 2013-2015 Chaoyi Zha

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
-->

<!DOCTYPE html>
<html>
<head>
    <title>@section('title'){{env('APP_NAME')}}@show</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Load Stylesheets --}}
    <link rel="stylesheet" href="{{env('APP_STYLESHEET')}}" />
    <link href="/css/base.css" rel="stylesheet">
    <link href="/css/toastr.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico">

    {{-- Load header JavaScript --}}
    <script src='/js/constants.js'></script>
    <script src="/js/jquery-1.11.3.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    @yield('css')
</head>
<body>
    @include('snippets.navbar')
    <div class="container">
        <div class="content-div @if (!isset($no_div_padding)) content-div-padding @endif @if (isset($large)) jumbotron large-content-div @endif">
            @yield('content')
        </div>
    </div>

    <script src='/js/toastr.min.js'></script>
    <script src='/js/base.js'></script>
    <script>
    @if (Session::has('info'))
        toastr["info"]("{{session('infoo')}}", "Info")
    @endif
    @if (Session::has('error'))
        toastr["error"]("{{session('error')}}", "Error")
    @endif
    @if (Session::has('warning'))
        toastr["warning"]("{{session('warning')}}", "Warning")
    @endif
    @if (Session::has('success'))
        toastr["success"]("{{session('success')}}", "Success")
    @endif
    </script>

    @yield('js')
</body>
</html>
