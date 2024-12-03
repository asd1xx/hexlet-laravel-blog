@extends('layouts.app')

@section('title', 'Статья')
@section('content')
    <h1>{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
@endsection