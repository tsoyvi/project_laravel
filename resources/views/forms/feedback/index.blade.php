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


    @forelse ($feedbacks as $feedback)
    <div class="card mb-4">
        <div class="card-body">

            <p>{{ $feedback['comment'] }} </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <p class="small mb-0 ms-2">{{ $feedback['name'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">{{ date_format($feedback['created_at'], 'd-M-Y H:i:s')}}</p>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="card-body">
        <p>Отзывов нет</p>
    </div>
    @endforelse

    <hr>

    @include('includes.messages')

    <form action="{{ route('forms.feedback.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">
            @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <div class="form-group">
            <label>Комментарий</label>
            <textarea name="comment" class="form-control">{{@old('comment')}}</textarea>
            @error('comment') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>


</div>
@endsection