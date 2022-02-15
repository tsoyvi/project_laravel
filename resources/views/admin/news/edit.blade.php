@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать новость</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{ route('admin.news.update',  ['news' => $news] ) }}" 
    method="post" enctype="multipart/form-data">
    
    @csrf
    @method('put')
    <div class="form-group">
        <label for="categories">Выбрать категории</label>
        <select class="form-control" name="category_id" id="categories">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($category->id === $categoryNews->id) selected @endif>
                {{ $category->title }}
            </option>

            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$news->title}}">
        @error('title') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="author">Автор</label>
        <input type="text" class="form-control" name="author" id="author" value="{{$news->author}}">
        @error('author') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <div class="form-group">
        <label for="image">Загрузить изображение</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>

    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option @if($news->status==='DRAFT' ) selected @endif>DRAFT</option>
            <option @if($news->status==='ACTIVE' ) selected @endif>ACTIVE</option>
            <option @if($news->status==='BLOCKED' ) selected @endif>BLOCKED</option>
        </select>

    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea name="description" class="form-control">{{$news->description}}</textarea>
        @error('description') <strong style="color:red;" {{$message}}</strong> @enderror
    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection