@extends('layouts.main')

@section('header')
<div class="container">
    <h1> Приветствуем на нашем сайте новостного агрегатора </h1>
</div>
@endsection

@section('content')
<div class="container">
    <h1>О Проекте</h1>
    <div>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        Dolorem ex dolores recusandae repellat nesciunt, officiis aliquam,
        autem enim illo id corrupti accusantium iure velit. Ducimus architecto
        omnis fugit et, molestias dicta incidunt atque totam facilis eligendi dolorum
        nihil aliquam, ab earum aperiam. Esse, provident dolore ipsam consectetur alias,
        consequatur impedit autem porro velit, repudiandae atque. Quibusdam facilis enim
        sapiente. Ipsa modi iure ad, dicta inventore dignissimos consectetur eos nulla consequuntur
        debitis doloribus in. Id asperiores minus velit ex odit dolor laudantium vitae expedita!
        A repellat tenetur, molestiae quos veritatis exercitationem, cumque et itaque possimus,
        assumenda suscipit nesciunt rerum? Hic quo cum exercitationem voluptates laboriosam quod
        sequi ullam, quidem sapiente voluptatem asperiores ab! Recusandae officiis eum ad nisi, consequuntur
        quasi, nulla quibusdam voluptatem rem saepe inventore odit et, sunt necessitatibus provident.
        Impedit iste at velit laboriosam cum mollitia voluptatum sunt natus dicta, iusto quod, voluptas
        repellat voluptate magnam eveniet porro sit exercitationem ad incidunt. Asperiores quis minima
        perferendis qui corporis minus consectetur nisi, ad eos possimus earum adipisci quia, cum fugiat
        odio accusamus molestiae ea soluta officiis voluptate voluptatum? Repellat minus quo ipsa, accusamus
        ratione in assumenda incidunt sapiente quaerat sunt sed. Et magnam ex officiis aperiam similique! Vel,
        blanditiis eaque!
    </div>
    <br>
    <div>
        <a class="btn btn-sm btn-outline-secondary" href="{{route('category.index')}}">Список категорий новостей</a>
    </div>

</div>
@endsection