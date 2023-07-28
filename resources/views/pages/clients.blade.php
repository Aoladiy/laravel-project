{{--@extends('layouts.inner_two_columns')--}}
{{--@section('page-title', 'Для клиентов')--}}
{{--@section('title', 'Для клиентов')--}}
{{--@section('content')--}}
<x-layouts.inner_two_columns
        page-title="Для клиентов"
        title="Для клиентов"
>
{{--    @include('components.panels.static_demo_content')--}}
    <x-panels.static_demo_content />
    {{--@endsection--}}
</x-layouts.inner_two_columns>
