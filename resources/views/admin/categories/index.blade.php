@extends('layouts.admin')

@section('header')
<h1 class="h2">Список категорий</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить категорию
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">
    Список категорий

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    #ID
                </th>
                <th>
                    Заголовок
                </th>
                <th>
                    Описание
                </th>
                <th>
                    Дата добавления
                </th>
                <th>
                    Действия
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoriesList as $categories)
            <tr>
                <td>
                    {{ $categories->id}}
                </td>
                <td>
                    {{ $categories->title}}
                </td>
                <td>
                    {{ $categories->description}}
                </td>
                <td>
                    {{ date_format( $categories->created_at, 'd-M-Y')}}
                </td>
                <td>
                    <a href="{{ route ('admin.categories.edit', ['category' => $categories])}}">Ред.</a>
                    <a href="">Удал.</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categoriesList->links()}}
</div>
@endsection