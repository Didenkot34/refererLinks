@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1 id="error" data-google="{{$info->bad_domain}}">Error {{$info->id}}</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non
                incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam
                repellat.</p>
        </header>
        <!-- /.row -->

        <!-- /.row -->
    </div>
@endsection
