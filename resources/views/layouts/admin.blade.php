@extends('layouts.app')
@section('user-menu')
    @include('panels.user_authorized_menu')
@endsection
@section('nav-menu')
    @include('panels.admin_menu')
@endsection
@section('template-content')
<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>
    @yield('content')
</div>
@endsection
