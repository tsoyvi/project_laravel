@extends('layouts.admin')

@section('header')
<h1 class="h2">Список пользователей</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
        <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-outline-secondary">
            Добавить пользователя
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="table-responsive">

    @include('includes.messages')

    <div class="table-responsive">

        @php
       // dd($users);
        @endphp

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>email</th>
                    <th>Последний вход</th>
                    <th>Администратор</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->id}}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email}}
                    </td>
                    <td>
                        {{ $user->last_login_at}}
                    </td>
                    <td>
                        @if($user->is_admin === true) да @else нет @endif
                    </td>
                    <td>
                        <a href="{{ route ('admin.user.edit', ['user' => $user])}}">Ред.</a>
                        <a href="javascript:;" class="delete" rel="{{ $user->id }}" url="/admin/user/">Удал.</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
     

    {{ $users->links()}}
</div>
@endsection