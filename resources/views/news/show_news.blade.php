@extends('layouts.main')

@section('title')
    @parent - {{$news->title}}
@endsection

@section('header')
<div class="container">
    <h2>Новость</h2>
</div>
@endsection


@section('content')
<div class="container">
    <div>
        <h4>
            {{ $news->title}}
        </h4>

        @php
        //dd(Storage::disk('public')->url( '/'.$news->image));
        @endphp

        @if($news->image)
        <img class="" width="255" height="225" src="{{ Storage::disk('public')->url( $news->image) }}">
        @else
        <img class="" width="255" height="225" src="https://picsum.photos/225/225?random={{$news->id}}">
        @endif
        <p>
            {{$news->description}}
        </p>
        <p>автор
            {{$news->author}} добавлено:
            {{$news->created_at}}
        </p>
    </div>
    <hr>

    <a class="btn btn-sm btn-outline-secondary" href="{{route('category.show', ['category' => $category->id ])}}">Список
        новостей в категории</a>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('category.index')}}">Список категорий</a>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('/')}}">На главную</a>
    <hr>

</div>
@endsection