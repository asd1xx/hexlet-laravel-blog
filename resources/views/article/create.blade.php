@extends('layouts.app')

@section('title', 'Создать статью')
@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ html()->modelForm($article, 'POST', route('articles.store'))->open() }}
        <p>{{ html()->label('Имя', 'name') }}</p>
        <p>{{ html()->input('text', 'name') }}</p>
        <p>{{ html()->label('Содержание', 'body') }}</p>
        <p>{{ html()->textarea('body') }}</p>
        <p>{{ html()->submit('Создать') }}</p>
    {{ html()->closeModelForm() }}
@endsection