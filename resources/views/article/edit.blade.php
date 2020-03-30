
@extends('layouts.master')

@section('title', 'Danh sach bai viet')

@section('page_content')
    <form action="{{ route('updateArticle') }}" method="POST" role="form">
        <legend>Sua bai viet</legend>
        {{csrf_field()}}

        <input type="hidden" value="{{$article->id}}" name="id" />
        <div class="form-group">
            <label for="">Tieu de</label>
            <input type="text" class="form-control" id=""  name="title" value="{{$article->title}}">
        </div>
        <div class="form-group">
            <label for="">Noi dung</label>
            <textarea name="content" id="input" class="form-control" rows="3" required="required">{{$article->content}}</textarea>
        </div>

        

        <button type="submit" class="btn btn-primary">Hoan thanh</button>
    </form>
@endsection


