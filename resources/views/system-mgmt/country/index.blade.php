@extends('layouts.master')

@section('top')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">List of Countries</h3>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addCountry">
                            <i  class="fa fa-plus"></i> Add New Country
                        </button>
                        <a href="#" onclick="window.print();" class="btn btn-primary">
                                <i class="fa fa-print"></i> Print Page
                            </a>
                    </div>
                </div>
            </div>    
            <!-- /.box-header -->
            
                <br>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <table class="table table-bordered table-hover table-striped" id="countries-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($countries as $country)
        <tr role="row" class="odd">
            <td>{{ $country->name }}</td>
            <td>{{ $country->country_code }}</td>
            <td>
                <form class="row" method="POST" action="{{ route('country.destroy', $country->id) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('country.edit', $country->id) }}" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                        <i class="fa fa-edit"></i>
                    </a>
                    <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@include('system-mgmt.country.create')

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{ count($countries) }} of {{ count($countries) }} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $countries->links() }}
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

@section('bot')
    <!-- DataTables -->
    <script src="{{ asset('assets/components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endsection
