@extends('layouts.admin')

@section('header')
<h1 class="h2">Добавление ресурса</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.resource.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{@old('name')}}">
        @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>
    
    <div class="form-group">
        <label for="url">ссылка</label>
        <input type="url" class="form-control" name="url" id="url" value="{{ @old('url') }}">
        @error('url') <strong style="color:red;"> {{$message}} </strong> @enderror
    </div>

    <button type="submit" class="btn btn-success">Добавить</button>

</form>
@endsection