@extends('layouts.admin')

@section('header')
<h1 class="h2">Добавление отзыва</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.order.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">
        @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="tel" class="form-control" name="phone" id="phone" value="{{@old('phone')}}">
        @error('phone') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{@old('email')}}">
        @error('email') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label>Информация о том, что нужно получить</label>
        <textarea name="comment" class="form-control">{{@old('comment')}}</textarea>
        @error('comment') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <button type="submit" class="btn btn-success">Добавить</button>

</form>
@endsection