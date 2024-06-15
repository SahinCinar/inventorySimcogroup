@extends('layouts.master')

@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="box box-success">
        <div class="box">
            <div class="box-header">

                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of Employees</h3>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addEmployee">
                            <i class="fa fa-plus"></i> Add New Employee
                        </button>
                    </div>
                    @include('employees-mgmt.create')
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <form method="POST" action="{{ route('employee-management.search') }}">
                    {{ csrf_field() }}
                    @component('layouts.search', ['title' => 'Search'])
                        @component('layouts.two-cols-search-row', ['items' => ['First Name', 'Department_Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['firstname'] : '', isset($searchingVals) ? $searchingVals['department_name'] : '']])
                        @endcomponent
                    @endcomponent
                </form>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">DoB</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Division</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr role="row" class="odd">
                                            <td><img src="../{{$employee->picture }}"  class="user-image" width="50px" height="50px"/></td>
                                            <td>{{ $employee->firstname }} {{$employee->middlename}} {{$employee->lastname}}</td>
                                            <td class="hidden-xs">{{ $employee->birthdate }}</td>
                                            <td class="hidden-xs">{{ $employee->department_name }}</td>
                                            <td class="hidden-xs">{{ $employee->division_name }}</td>
                                            <td colspan="3">
                                                <form class="row" method="POST" action="{{ route('employee-management.destroy', $employee->id) }}" onsubmit = "return confirm('Are you sure?')">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a href="{{ route('employee-management.edit', $employee->id) }}" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-edit "></i>
                                                    </a>
                                                    <a href="{{ route('employee-management.edit', $employee->id) }}" class="btn btn-primary col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-print "></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin">
                                                        <i class="fa fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($employees)}} of {{count($employees)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $employees->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection
