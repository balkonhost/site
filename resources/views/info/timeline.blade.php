@extends('layout')

@section('title', 'История / О проекте / Балкон.Хост')

@section('style')
    <style>
        .timeline {
            border-left: 3px solid #727cf5;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            background: rgba(114, 124, 245, 0.09);
            margin: 0 auto;
            letter-spacing: 0.2px;
            position: relative;
            line-height: 1.4em;
            font-size: 1.03em;
            padding: 50px;
            list-style: none;
            text-align: left;
            max-width: 50%;
        }

        @media (max-width: 767px) {
            .timeline {
                max-width: 98%;
                padding: 25px;
            }
        }

        .timeline h1 {
            font-weight: 300;
            font-size: 1.4em;
        }

        .timeline h2,
        .timeline h3 {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .timeline .event {
            border-bottom: 1px dashed #e8ebf1;
            padding-bottom: 25px;
            margin-bottom: 25px;
            position: relative;
        }

        @media (max-width: 767px) {
            .timeline .event {
                padding-top: 30px;
            }
        }

        .timeline .event:last-of-type {
            padding-bottom: 0;
            margin-bottom: 0;
            border: none;
        }

        .timeline .event:before,
        .timeline .event:after {
            position: absolute;
            display: block;
            top: 0;
        }

        .timeline .event:before {
            left: -207px;
            content: attr(data-date);
            text-align: right;
            font-weight: 100;
            font-size: 0.9em;
            min-width: 120px;
        }

        @media (max-width: 767px) {
            .timeline .event:before {
                left: 0px;
                text-align: left;
            }
        }

        .timeline .event:after {
            -webkit-box-shadow: 0 0 0 3px #727cf5;
            box-shadow: 0 0 0 3px #727cf5;
            left: -55.8px;
            background: #fff;
            border-radius: 50%;
            height: 9px;
            width: 9px;
            content: "";
            top: 5px;
        }

        @media (max-width: 767px) {
            .timeline .event:after {
                left: -31.8px;
            }
        }

        .rtl .timeline {
            border-left: 0;
            text-align: right;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
            border-right: 3px solid #727cf5;
        }

        .rtl .timeline .event::before {
            left: 0;
            right: -170px;
        }

        .rtl .timeline .event::after {
            left: 0;
            right: -55.8px;
        }
    </style>
@endsection

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('info') }}">О проекте</a></li>
                <li class="breadcrumb-item active" aria-current="page">История</li>
            </ol>
        </nav>

        <h1 class="mb-5">История</h1>

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action">О проекте</a>
                        <a href="{{ route('info.timeline') }}" class="list-group-item list-group-item-action active">История</a>
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action" aria-current="true">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                        <a href="{{ route('info.partners') }}" class="list-group-item list-group-item-action">Партнеры</a>
                        <a href="{{ route('info.competitors') }}" class="list-group-item list-group-item-action">Конкуренты</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div id="content">
                            <ul class="timeline">
                                <li class="event" data-date="21.12.2018">
                                    <h3>Начало</h3>
                                    <p>Именно <a href="{{ route('conversation.show', 1) }}">в этот день</a> поселиласть
                                        в голове Виталия мысль о том, что надо бы организовать свою хостинговую площадку.</p>
                                </li>
                                <li class="event" data-date="26.12.2018">
                                    <h3>Рождение команды Одминов и слогана</h3>
                                    <p>Команда там, где двое или трое в согласии, ради общего дела… Будем считать,
                                        что <a href="{{ route('conversation.show', 5) }}">вечерняя посиделка</a> Игната,
                                        Леонида и Виталия была первым собранием команды, в результате которого появился рекламный слоган:
                                        «Балкон.Хост предоставляет тот же хостинг, только дешевле!»</p>
                                </li>
                                <li class="event" data-date="03.01.2019">
                                    <h3>Пополнение в команде Одминов</h3>
                                    <p>Теперь нас уже не двое или трое, а четверо. Игнату <a href="{{ route('conversation.show', 8) }}">пришла мысль</a>
                                        подключить к проекту своего ученика по дизайну — Галину Особую.</p>
                                </li>
                                <li class="event" data-date="14.01.2019">
                                    <h3>Хостинга еще нет, а тарифы уже есть</h3>
                                    <p>Хоть у нас и нет еще рабочего сервера, зато уже сформированы первые <a href="{{ route('conversation.show', 10) }}">тарифные планы</a> по хостингу.</p>
                                </li>
                                <li class="event" data-date="20.01.2019">
                                    <h3>Наш первый сервер</h3>
                                    <p>Именно в этот день <a href="{{ route('conversation.show', 13) }}">был смонтирован</a> в стойку первый и единственный балконовский сервер.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
