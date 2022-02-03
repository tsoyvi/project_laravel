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

<form action="{{route('admin.order.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">
        <label for="phone">Телефон</label>
        <input type="tel" class="form-control" name="phone" id="phone" value="{{@old('phone')}}">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{@old('email')}}">

        <div class="form-group">
            <label>Информация о том, что нужно получить</label>
            <textarea name="comment" class="form-control">{{@old('comment')}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </div>
</form>
@endsection