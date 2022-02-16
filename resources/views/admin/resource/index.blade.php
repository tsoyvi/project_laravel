@extends('layouts.admin')

@section('header')
<h1 class="h2">Список ресурсов</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.resource.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить ресурс
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">
    
    @include('includes.messages')

    @forelse ($resources as $resource)
    <div class="card mb-4">
        <div class="card-body">

            <p>{{ $resource['comment'] }} </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <p class="small mb-0 ms-2">{{ $resource['name'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">ссылка: {{ $resource['url'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">{{ date_format($resource['created_at'], 'd-M-Y H:i:s')}}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <a href="{{ route ('admin.resource.edit', ['resource' => $resource]) }}">Ред.</a>&nbsp;
                    <a href="javascript:;" class="delete" rel="{{ $resource->id }}" url="/admin/resource/">Удал.</a>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="card-body">
        <p>ресурсов нет</p>
    </div>
    @endforelse

    <a class="btn btn-success" href="{{ route('admin.loadAll') }}">Загрузить новости со всех ресурсов</a>

    {{ $resources->links()}}
</div>
@endsection