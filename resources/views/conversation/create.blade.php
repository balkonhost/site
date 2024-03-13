@extends('layout')

@section('title', 'Новый разговор / Разговоры на балконе / Балкон.Хост')

@section('main')
    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post') }}">Разговоры на балконе</a></li>
                <li class="breadcrumb-item active" aria-current="page">Новая тема</li>
            </ol>
        </nav>

        <h1 class="mb-5">Новая тема</h1>

        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Упс!</strong> В процессе добавления возникли некоторые проблемы.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="col-md-10 col-lg-8 col-xl-7">
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input class="form-control @error('created_at') is-invalid @enderror" name="created_at" type="text" placeholder="Y-m-d H:i:s" required>
                        <label for="title">Дата</label>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-floating">
                        <select class="form-select @error('admin_id') is-invalid @enderror" name="admin_id" placeholder="Идентификатор" required>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }} ({{ $admin->position }})</option>
                            @endforeach
                        </select>
                        <label for="admin_id">Одмин</label>
                        @error('admin_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-floating">
                        <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" placeholder="Тема" required>
                        <label for="title">Тема</label>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-floating">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Подробности" style="height: 12rem" required></textarea>
                        <label for="message">Подробности</label>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <button class="btn btn-success text-uppercase" type="submit">Рассказать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
