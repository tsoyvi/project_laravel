@extends('layouts.main')

@section('title')
@parent - Форма обратной связи
@endsection

@section('header')
<div class="container">
    <h2>Форма обратной связи</h2>
</div>
@endsection

@section('content')
<div class="container">


    @if (!empty($name))
    <div>
        {{ $name }}
    </div>
    <div>
        {{ $comment }}
    </div>

    @endif

    <form action="{{route('forms.feedback.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">

            <div class="form-group">
                <label>Комментарий</label>
                <textarea name="comment" class="form-control">{{@old('comment')}}</textarea>

            </div>
            <button type="submit" class="btn btn-success">Отправить</button>
    </form>


</div>
@endsection