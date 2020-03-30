@extends('layouts.master')

@section('title', 'Chi tiet bai viet')

@section('page_content')

    <h1>{{$article->title}}</h1>
    <hr />
    <ul>
    @foreach ($article->categories as $category)
        <li>{{$category->name}}</li>
    @endforeach 
    </ul>
    <hr />
    <div>
        {{$article->content}}
    </div>

    <hr />

    @foreach ($comments as $comment)
        <div>{{$comment->content}}</div>
    @endforeach
    {{$comments->links()}}
@endsection