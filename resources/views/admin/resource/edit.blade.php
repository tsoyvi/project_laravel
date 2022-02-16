@extends('layouts.admin')

@section('header')
<h1 class="h2">Редактировать ресурс</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
</div>
@endsection

@section('content')

@include('includes.messages')

<form action="{{route('admin.resource.update', ['resource' => $resource] )}}" method="post">
    @csrf
    @method('put')

        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $resource->name }}">
            @error('name') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        
        <div class="form-group">
            <label for="url">ссылка</label>
            <input type="url" class="form-control" name="url" id="url" value="{{ $resource->url }}">
            @error('url') <strong style="color:red;"> {{$message}} </strong> @enderror
        </div>
        
        <button type="submit" class="btn btn-success">Редактировать</button>

</form>

@endsection