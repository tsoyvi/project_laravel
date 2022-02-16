@extends('layouts.admin')

@section('header')
<h1 class="h2">Добавление новости</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

@php

//dd ($addNews);

@endphp


<form action="{{route('admin.news.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="categories">Выбрать категории</label>
        <select class="form-control" name="category_id" id="categories" multiple>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>

            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">Наименование</label>
        <input type="text" class="form-control" name="title" id="title" value="{{@old('title', $addNews['title'])}}">
        @error('title') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="author">Автор </label>
        <input type="text" class="form-control" name="author" id="author" value="{{@old('author')}}">
        @error('author') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
            <option @if(old('status')==='DRAFT' ) selected @endif>DRAFT</option>
            <option @if(old('status')==='ACTIVE' ) selected @endif>ACTIVE</option>
            <option @if(old('status')==='BLOCKED' ) selected @endif>BLOCKED</option>
        </select>

    </div>
    <div class="form-group">
        <label>Описание</label>
        <textarea name="description" id="description"
            class="form-control">{{@old('description', $addNews['description'])}}</textarea>

    </div>
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@endsection



<script>
    window.onload = function() {
    
      ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
     } );

  };
</script>