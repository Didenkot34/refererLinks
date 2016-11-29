@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>Success</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non
                incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam
                repellat.</p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <strong>ID</strong> - {{$info->id}}
                </div>
                <div class="alert alert-success ">
                    <strong>UA</strong> - {{$info->ua}}
                </div>
                <div class="alert alert-success ">
                    <strong>IP</strong> - {{$info->ip}}
                </div>
                <div class="alert alert-success ">
                    <strong>REFER</strong> - {{$info->ref}}
                </div>
                <div class="alert alert-success ">
                    <strong>PARAM1</strong> - {{$info->param1}}
                </div>
                <div class="alert alert-success ">
                    <strong>PARAM2</strong> - {{$info->param2}}
                </div>
                <div class="alert @if($info->bad_error) alert-danger @else alert-success @endif ">
                    <strong>ERROR</strong> - {{$info->error}}
                </div>
                <div class="alert @if($info->bad_domain) alert-warning @else alert-success @endif ">
                    <strong>BAD DOMAIN</strong> - {{$info->bad_domain}}
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->

        <!-- /.row -->
    </div>
@endsection
