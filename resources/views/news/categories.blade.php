@extends('layouts.main')

@section('title')
    @parent - Категории новостей
@endsection

@section('header')
<div class="container">
    <h1>Категории новостей</h1>
    <!--<a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        @forelse ($categoryList as $categories)

        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">

                <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                    src="https://picsum.photos/225/225?random={{ $loop->index }}">
                <div class="card-body">
                    <strong>
                        <a href="{{ route('category.show', ['category' => $categories['id']]) }}">
                            {{ $categories['title'] }}
                        </a>
                    </strong>
                    <p class="card-text">
                        {{ $categories['description'] }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-outline-secondary"
                                href="{{ route('category.show', ['category' => $categories['id']]) }}">
                                Далее..
                            </a>
                            <!--<button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
                        </div>
                        <small class="text-muted">
                            Дата обновления {{ date('d-M-Y', strtotime($categories['created_at'])) }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h2>Категорий нет</h2>
        @endforelse

    </div>


</div>

@endsection