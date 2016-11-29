@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Dashboard</div>

                    <div class="panel-body text-center">
                        @if(!count($clicks))Don't have @endif  Info about clicks
                    </div>
                </div>
                @if(count($clicks))
                    <table class="table table-bordered table-responsive table-hover" id="table-id">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>UA</th>
                            <th>IP</th>
                            <th>REFER</th>
                            <th>PARAM1</th>
                            <th>PARAM2</th>
                            <th>ERROR</th>
                            <th>BAD DOMAIN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clicks as $info)
                            <tr>
                                <td>{{$info->id}}</td>
                                <td>{{$info->ua}}</td>
                                <td>{{$info->ip}}</td>
                                <td>{{$info->ref}}</td>
                                <td>{{$info->param1}}</td>
                                <td>{{$info->param2}}</td>
                                <td>{{$info->error}}</td>
                                <td>@if($info->bad_domain) TRUE @else FALSE @endif</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
