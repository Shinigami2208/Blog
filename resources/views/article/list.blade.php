@extends('layouts.master')

@section('title', 'Danh sach bai viet')

@section('page_content')
    <h3>Danh sach bai viet</h3>

    <form action="{{ route('showListArticle') }}" method="get">
        <input type="text" name="keyword" placeholder="Tim kiem..."/>
    </form>

    <div id="article-list">
        <article-list></article-list>
    </div>
@endsection

