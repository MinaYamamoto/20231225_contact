@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('header')
<form class="logout" action="/logout" method="post">
    @csrf
    <button class="logout__button">logaut</button>
</form>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin-heading">
        Admin
    </div>
</div>
@endsection

