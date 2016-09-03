@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Cube Test App</h1>
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Example data</div>
                <div class="panel-body">
                    <br>
                    2 <br>
                    4 5 <br>
                    UPDATE 2 2 2 4 <br>
                    QUERY 1 1 1 3 3 3 <br>
                    UPDATE 1 1 1 23 <br>
                    QUERY 2 2 2 4 4 4 <br>
                    QUERY 1 1 1 3 3 3 <br>
                    2 4 <br>
                    UPDATE 2 2 2 1 <br>
                    QUERY 1 1 1 1 1 1 <br>
                    QUERY 1 1 1 2 2 2 <br>
                    QUERY 2 2 2 2 2 2 <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Data for evaluation</div>
                <div class="panel-body">
                    <form id="cube-form" class="form-horizontal" role="form" method="POST" action="{{ url('/cube') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-md-1 control-label">Operations:</label>

                            <div class="col-md-12">
                                <textarea rows="12" class="form-control" style="min-width: 100%" name="cases"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Evaluate
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">RESULT</div>
                <div class="panel-body">
                    <div id="result-panel"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
