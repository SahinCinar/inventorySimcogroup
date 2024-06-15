@extends('layouts.master')

@section('content')
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">List of Divisions</h3>
        <div class="text-right">
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addDivision">
                <i class="fa fa-plus"></i> Add New Division
            </button>
        <a href="#" onclick="window.print();" class="btn btn-primary ">
                                <i class="fa fa-print"></i> Print Page
        </a></div>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-6"></div>
        </div>
        <form method="POST" action="{{ route('division.search') }}">
            {{ csrf_field() }}
            @component('layouts.search', ['title' => 'Search'])
                @component('layouts.two-cols-search-row', ['items' => ['Name'], 'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '', isset($searchingVals) ? $searchingVals['name'] : '']])
                @endcomponent
            @endcomponent
        </form>
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divisions as $division)
                                <tr role="row" class="odd">
                                    <td>{{ $division->id }}</td>
                                    <td>{{ $division->name }}</td>
                                    <td>{{ $division->code }}</td>
                                    <td colspan="3">
                                        <form class="row" method="POST" action="{{ route('division.destroy', $division->id) }}" onsubmit="return confirm('Are you sure?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('division.edit', $division->id) }}" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                                                <i class="fa fa-edit "></i>
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
                    @include('system-mgmt.division.create')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{ count($divisions) }} of {{ count($divisions) }} entries</div>
                </div>
                <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        {{ $divisions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
