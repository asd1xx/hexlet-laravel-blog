@extends('layouts.app')

@section('title', 'Статьи')
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
    @endforeach
@endsection