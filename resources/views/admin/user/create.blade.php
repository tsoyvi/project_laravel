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

<form action="{{route('admin.user.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ @old('name') }}">
        @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ @old('email') }}">
        @error('email') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <div class="form-group">
        <label for="isAdmin">Уровень доступа</label>
        <select class="form-control" name="isAdmin" id="isAdmin">
            <option value="0" @if(@old('isAdmin') == 0) selected @endif>Обычный пользователь</option>
            <option value="1" @if(@old('isAdmin') == 1) selected @endif>Администратор</option>
        </select>
    </div>

    <div class="form-group">
        <label for="password">Новый пароль</label>
        <input type="password" class="form-control" name="password" id="password" value="">
        @error('password') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <button type="submit" class="btn btn-success">Сохранить</button>

</form>
@endsection