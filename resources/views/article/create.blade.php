@extends('layouts.app')

@section('title', 'Создать статью')
@section('content')
    {{ html()->modelForm($article, 'POST', route('articles.store'))->open() }}
        @include('article.form')
        <p>{{ html()->submit('Создать') }}</p>
    {{ html()->closeModelForm() }}
@endsection