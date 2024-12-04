@extends('layouts.app')

@section('title', 'Статья')
@section('content')
    <a href="{{ route('articles.edit', $article) }}">Редактировать статью</a>
    <h1>{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
@endsection