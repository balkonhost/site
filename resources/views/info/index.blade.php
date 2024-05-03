@extends('layout')

@section('title', 'О проекте / Балкон.Хост')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">О проекте</li>
            </ol>
        </nav>

        <h1 class="mb-5">О проекте</h1>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action active" aria-current="true">О проекте</a>
                        <a href="{{ route('info.timeline') }}" class="list-group-item list-group-item-action">История</a>
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                        <a href="{{ route('info.partners') }}" class="list-group-item list-group-item-action">Партнеры</a>
                        <a href="{{ route('info.competitors') }}" class="list-group-item list-group-item-action">Конкуренты</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <img src="/img/info/about.jpg" class="img-fluid" alt="">
                <h2 class="h3 mt-3">У нас как в дружном детсадовском коллективе.</h2>

                <p>Да, по сути, так и есть. Мы в самом начале пути, только родились и все, что умеем - это сучить ручками,
                    топать ножками и громко хотеть всего подряд.</p>
                <p>C начала 2019 года успешно не пытаемся привлечь хотя бы одного клиента и у это у нас хорошо получается.
                    За все это время мы так и не разместили ни одного сайта. Возможно и вас не уговорим захостить у нас
                    свой интернет-проект. А все почему? Потому что у нас в коллективе <a href="{{ route('info.team') }}" title="Наши одмины">собрались
                    самые сливки</a> специалистов ИТ-индустрии.</p>

                    {{--Каждый сайт бесплатно получает базовую защиту от DDoS-атак, а дружелюбная техническая поддержка готова прийти на помощь в любое время дня и ночи.
                    Клиенты ценят нас за надежность, качество и ответственность.--}}

                </p>
            </div>
        </div>
    </div>
@endsection
