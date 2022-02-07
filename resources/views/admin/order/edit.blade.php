@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать заказ</h1>
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
            @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" class="form-control" name="phone" id="phone" value="{{ $order->phone }}">
            @error('phone') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $order->email }}">
            @error('email') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <div class="form-group">
            <label>Информация о том, что нужно получить</label>
            <textarea name="comment" class="form-control">{{ $order->comment }}</textarea>
            @error('comment') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <button type="submit" class="btn btn-success">Редактировать</button>

</form>

@endsection