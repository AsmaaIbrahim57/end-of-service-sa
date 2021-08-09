@extends('app')

@section("content")
<section class="Wrapper">
    <h1 class="header">Evaluate End of Service for {{$employee->name}} </h1>
    <div class="create-form container" id="app">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <end-service 
                employeeid={{$employee->id}}
                employeegender={{$employee->gender}}
                route={{route('get-end-service')}}
                resignationreason={{$employee->resignation_reason}}
            >
    </div>
</section>

@push('css')

{!! css('employees/end-service') !!}

@endpush