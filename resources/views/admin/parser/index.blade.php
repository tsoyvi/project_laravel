@extends('layouts.admin')

@section('header')
<h1 class="h2">Список сторонних новостей</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.resource.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить заказ
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">

    @include('includes.messages')


    <div class="card mb-4">

        <form action="{{ route('admin.load',  ['resources' => $resources] ) }}" method="get">
            <div class="form-group">
                <label for="resourceUrl">Выберите название</label>
                <select class="form-control" name="resourceUrl" id="resourceUrl">
                    @foreach ($resources as $resource)
                    <option value="{{ $resource->url }}">
                        {{ $resource->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Загрузить</button>
        </form>

        <div class="card-body">
            <table class="table table-bresourceed">
                <thead>
                    <tr>
                        <th>Заголовок</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>

                    @if ($newsList)

                    @php
                    $newsItems = $newsList['news'];
                    @endphp

                    <img src="{{ $newsList['image'] }}" alt="" style="width: 70px;">
                    <h3>Категория: <a href="{{$newsList['link']}}" target="blank">{{ $newsList['title'] }}</a> </h3>
                    <h4>{{ $newsList['description'] }}</h4>

                    @foreach ($newsItems as $news)

                    <tr>
                        <td>
                            <a href="{{ $news['link'] }}" target="blank">{{ $news['title'] }}</a>
                        </td>
                        <td>
                            {{ $news['description'] }}
                        </td>
                        <td>
                            {{ $news['pubDate'] }}
                        </td>
                        <td>
                            <a href="{{ route ('admin.news.create', ['AddNews' =>
                            [                                 
                                'title' => $news['title'],
                                'description' => $news['description'],
                                'category' => $newsList['title'],
                            ]
                            ])}}">Добавить</a>
                        </td>
                    </tr>

                    @endforeach

                    @else
                    <h3>Список пуст</h3>
                    @endif


                </tbody>
            </table>

        </div>
    </div>




</div>
@endsection