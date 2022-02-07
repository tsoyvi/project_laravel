@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать Отзыв</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.feedback.update',  ['feedback' => $feedback] ) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $feedback ->name }}">
        @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label>Комментарий</label>
        <textarea name="comment" class="form-control">{{ $feedback->comment }}</textarea>
        @error('comment') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <button type="submit" class="btn btn-success">Сохранить</button>

</form>

</div>


@endsection