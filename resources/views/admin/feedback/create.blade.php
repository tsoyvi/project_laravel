@extends('layouts.admin')

@section('header')
<h1 class="h2">Добавление отзыва</h1>
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

<form action="{{route('admin.feedback.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">

        <div class="form-group">
            <label>Комментарий</label>
            <textarea name="comment" class="form-control">{{@old('comment')}}</textarea>

        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
</form>
@endsection