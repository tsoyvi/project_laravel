@extends('layouts.admin')

@section('header')
    <h1 class="h2">Панель администрирования</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
    </div>
@endsection

@section('content')
<div class="table-responsive">
    Панель управления

    @php
    $mess = 'собщение 2 динамически'
    @endphp

    <x-alert type="success" message="собщение 1"></x-alert>
    <x-alert type="danger" :message="$mess"></x-alert>
    <x-alert type="warning" message="собщение 3"></x-alert>
</div>
@endsection