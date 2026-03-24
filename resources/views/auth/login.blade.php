@extends('layout')

@section('content')
<h2>Login</h2>

<form method="POST" action="/login">
    @csrf
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif
@endsection