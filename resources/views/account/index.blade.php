<h2>Привет, {{ Auth::user()->name }}</h2>

@if(Auth::user()->avatar)
<img src="{{ Auth::user()->avatar }}" style="width: 200px;">
<br>
@endif

@if(Auth::user()->is_admin)
<a href="{{ route('admin.index') }}"> Администрирование</a>
<br>
@endif

<a href="{{ route ('/') }}">На главную</a>
<br>
<a href="{{ route ('account.logout')}}">Выход</a>