@extends('layouts.main')

@section('title')
@parent - Форма заказа
@endsection

@section('header')
<div class="container">
    <h2>Форма заказа на получение выгрузки данных</h2>
</div>
@endsection

@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <form action="{{route('forms.order.store')}}" method="post">
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
            <button type="submit" class="btn btn-success">Заказать</button>
    </form>


</div>
@endsection