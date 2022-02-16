@extends('layouts.admin')

@section('header')
<h1 class="h2">Список заказов</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.order.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить заказ
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">
    
    @include('includes.messages')

    @forelse ($orders as $order)
    <div class="card mb-4">
        <div class="card-body">

            <p>{{ $order['comment'] }} </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <p class="small mb-0 ms-2">{{ $order['name'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">phone: {{ $order['phone'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">email: {{ $order['email'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">Категория: {{ $order['category'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">ссылка: {{ $order['url'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">{{ date_format($order['created_at'], 'd-M-Y H:i:s')}}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <a href="{{ route ('admin.order.edit', ['order' => $order]) }}">Ред.</a>&nbsp;
                    <a href="javascript:;" class="delete" rel="{{ $order->id }}" url="/admin/order/">Удал.</a>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="card-body">
        <p>Заказов нет</p>
    </div>
    @endforelse


    {{ $orders->links()}}
</div>
@endsection