@extends('role.admin.layout.sidebar')
@section('sidebar')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Selamat datang Admin {{ auth()->user()->name }}</h3>
    </div>
@endsection