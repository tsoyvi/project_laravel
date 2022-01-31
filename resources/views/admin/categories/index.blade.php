@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-outline-secondary">
                Добавить категорию
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="table-responsive">
    Список категорий
</div>
@endsection