@extends('app')

@section("content")

<section class="Wrapper">
    <h1 class="header">Employees</h1>
    <div class="employees" id="app">
        <table class="table ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Working years</th>
                <th scope="col">Salary</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>


              </tr>
            </thead>
            <tbody>
                @foreach($employees as $key => $employee)
                    @include('employees.partials.employee',$employee)    
                @endforeach
            
            </tbody>
          </table>
            
        {{$employees->links()}}
    </div>
</section>

@push('css')

{!! css('employees/index')!!}

@endpush