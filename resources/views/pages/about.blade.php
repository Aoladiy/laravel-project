{{--@extends('layouts.inner_two_columns')--}}
{{--@section('page-title', 'О компании')--}}
{{--@section('title', 'О компании')--}}
{{--@section('content')--}}
<x-layouts.inner_two_columns
        page-title="О компании"
        title="О компании"
>
{{--    @include('components.panels.static_demo_content')--}}
    <x-panels.static_demo_content />
    {{--@endsection--}}
</x-layouts.inner_two_columns>
