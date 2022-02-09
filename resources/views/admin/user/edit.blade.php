@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать пользователя</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{ route('admin.user.update', ['user' => $user]) }}" method="post">
    @csrf
    @method('put')


    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
        @error('email') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <!--
    <div class="form-group">
        <label for="password">Текущий пароль</label>
        <input type="password" class="form-control" name="password" id="password" value="">
        @error('password') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    -->

    <div class="form-group">
        <label for="isAdmin">Уровень доступа</label>
        <select class="form-control" name="isAdmin" id="isAdmin">
            <option value="0" @if($user->is_admin === false) selected @endif>Обычный пользователь</option>
            <option value="1" @if($user->is_admin === true) selected @endif>Администратор</option>
        </select>
    </div>

    <div class="form-group">
        <label for="newPassword">Новый пароль (заполните для смены)</label>
        <input type="password" class="form-control" name="newPassword" id="newPassword" value="">
        @error('newPassword') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <button type="submit" class="btn btn-success">Сохранить</button>

</form>

@endsection