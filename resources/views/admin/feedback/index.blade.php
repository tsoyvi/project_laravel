@extends('layouts.admin')

@section('header')
<h1 class="h2">Список отзыв</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.feedback.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить отзыв
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">

    @forelse ($feedbacks as $feedback)
    <div class="card mb-4">
        <div class="card-body">

            <p>{{ $feedback['comment'] }} </p>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-center">
                    <p class="small mb-0 ms-2">{{ $feedback['name'] }}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <p class="small text-muted mb-0">{{ date_format($feedback['created_at'], 'd-M-Y H:i:s')}}</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <a href="{{ route ('admin.feedback.edit', ['feedback' => $feedback])}}">Ред.</a>&nbsp;
                    <a href="">Удал.</a>
                </div>
            </div>
        </div>
    </div>

    @empty
    <div class="card-body">
        <p>Отзывов нет</p>
    </div>
    @endforelse


    {{ $feedbacks->links()}}
</div>
@endsection