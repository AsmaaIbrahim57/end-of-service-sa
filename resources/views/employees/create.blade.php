@extends('app')

@section("content")
<section class="Wrapper">
    <h1 class="header">Create Employee</h1>
    <div class="create-form container" id="app">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <create-employee route="{{route('store')}}" ></create-employee>
    </div>
</section>

@push("css")
{!! css('employees/create')!!}
@endpush

