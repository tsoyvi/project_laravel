@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать категорию</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.order.update', ['order' => $order] )}}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $order->name }}">
        <label for="phone">Телефон</label>
        <input type="tel" class="form-control" name="phone" id="phone" value="{{ $order->phone }}">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $order->email }}">

        <div class="form-group">
            <label>Информация о том, что нужно получить</label>
            <textarea name="comment" class="form-control">{{ $order->comment }}</textarea>

        </div>
        <button type="submit" class="btn btn-success">Редактировать</button>
    </div>
</form>

@endsection