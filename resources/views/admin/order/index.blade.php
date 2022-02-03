@extends('layouts.admin')

@section('header')
<h1 class="h2">Список заказов</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить заказ
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">
    
    @forelse ($oreders as $oreder)
    <div class="card mb-4">
        <div class="card-body">

            <p>{{ $oreder['comment'] }} </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <p class="small mb-0 ms-2">{{ $oreder['name'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">{{ date_format($oreder['created_at'], 'd-M-Y H:i:s')}}</p>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="card-body">
        <p>Заказов нет</p>
    </div>
    @endforelse


    {{ $oreders->links()}}
</div>
@endsection

