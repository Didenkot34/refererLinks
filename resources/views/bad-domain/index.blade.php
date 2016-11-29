@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Dashboard</div>

                    <div class="panel-body text-center">
                        @if(!count($badDomains))Don't have @endif  Info about Bad Domains
                    </div>
                </div>
                @if(count($badDomains))
                    <table class="table table-bordered table-responsive table-hover" id="table-id">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($badDomains as $info)
                            <tr>
                                <td>{{$info->id}}</td>
                                <td>{{$info->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
