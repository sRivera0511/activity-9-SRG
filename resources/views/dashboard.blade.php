@extends('layout')

@section('content')
<h1 style="color: white;">Dashboard</h1>
<p>Bienvenido, {{ Auth::user()->name }}</p>
@endsection