@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title"> Update department</h3>
                   </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('department.update', $department->id) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $department->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ $department->code }}" required placeholder="Department Code">

                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br><br><br>
                        <div class="form-group">
                            <div class="col-md-3 pull-right">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"></i> Update Department
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
