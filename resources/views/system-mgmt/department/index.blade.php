@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            @include('flash_message')
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of departments</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDepartment">
                                <i class="fa fa-plus"></i> Add New Department
                            </button>
                            <a href="#" onclick="window.print();" class="btn btn-primary">
                                <i class="fa fa-print"></i> Print Page
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <form method="POST" action="{{ route('department.search') }}">
                            {{ csrf_field() }}
                            @component('layouts.search', ['title' => 'Search'])
                                @component('layouts.two-cols-search-row', ['items' => ['Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
                                @endcomponent
                            @endcomponent
                        </form>
                        <br>
                        <div class="col-sm-12">
                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr role="row">
                                        <th >Department Name</th>
                                        <th >Department Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr role="row" class="odd">
                                            <td>{{ $department->name }}</td>
                                            <td>{{ $department->code }}</td>
                                            <td>
                                                <form class="row" method="POST" action="{{ route('department.destroy', $department->id) }}" onsubmit="return confirm('Are you sure?')">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a href="{{ route('department.edit', $department->id) }}" title="Edit Department" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                                                        <i class="fa fa-edit fa-lg"></i>
                                                    </a>
                                                    <button type="submit" title="Delete Department" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                                                        <i class="fa fa-trash fa-lg"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('system-mgmt.department.create') <!-- Add Department Form Modal -->
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{ $departments->firstItem() }} to {{ $departments->lastItem() }} of {{ $departments->total() }} entries</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    {{ $departments->links() }}
                                </div>
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
