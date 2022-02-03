@extends('layouts.admin')

@section('header')
<h1 class="h2">Добавление категории</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')
@if($errors->any())
    @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
@endif

<form action="{{route('admin.categories.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" name="title" id="title" value="{{@old('title')}}">

    </div>
    <div class="form-group">
        <label for="author">Автор </label>
        <input type="text" class="form-control" name="author" id="author" value="{{@old('author')}}">

    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
            <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
            <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
        </select>

    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea name="description" class="form-control">{{@old('description')}}</textarea>

    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection