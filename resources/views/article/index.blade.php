@extends('layouts.app')

@section('title', 'Статьи')

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif 

@section('content')
    {{ html()->form('GET', route('articles.index'))->open() }}
        {{ html()->input('text', 'search', $dataSearch) }}
        {{ html()->submit('Find') }}
    {{ html()->form()->close() }}

    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2><a href="{{ route('articles.show', $article) }}">{{ $article->name }}</a></h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{ Str::limit($article->body, 7) }}</div>
        <a href="{{ route('articles.edit', $article) }}">Edit</a>
    @endforeach
@endsection