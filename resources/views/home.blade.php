
@extends('layouts.app')

@section('content')
    <a class="text-center" href="/issue">Submit issue></a>
@endsection

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif


