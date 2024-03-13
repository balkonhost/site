@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">CMS</li>
            </ol>
        </nav>

        <h1 class="mb-5">Продажа CMS</h1>

        <p>Раздел в стадии наполнения.</p>
    </div>
@endsection
