@extends('layouts.main')

@section('title')
@parent - Список новостей в категории {{ $category->title }}
@endsection

@section('header')
<div class="container">
    <h1>Список новостей</h1>
    <h2>Категория - {{ $category->title }}</h2>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @forelse ($categoriesNews as $news)

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

                <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                    src="https://picsum.photos/225/225?random={{$loop->index}}">
                <div class="card-body">
                    <strong>

                        <a href="{{ route('news.show', [ 'category' => $category->id, 'news' => $news->id  ]) }}">
                            {{ $news->title }}
                        </a>
                    </strong>
                    <p class="card-text">
                        {{ $news->description }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secondary"
                                href="{{ route('news.show', [ 'category' => $category->id, 'news' => $news->id  ]) }}">
                                далее ...
                            </a>
                            <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                        </div>
                        <small class="text-muted">
                            Дата добавления {{ date('d-M-Y', strtotime($news->created_at)) }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h2>Категорий нет</h2>
        @endforelse

    </div>
    <a class="btn btn-sm btn-outline-secondary" href="{{route('category.index')}}">Список категорий</a>


</div>

@endsection