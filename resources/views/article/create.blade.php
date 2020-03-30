
@extends('layouts.master')

@section('title', 'Danh sach bai viet')

@section('page_content')
    <form action="{{ route('createArticle') }}" method="POST" role="form">
        <legend>Them bai viet</legend>
        {{csrf_field()}}

        <div class="form-group">
            <label for="">Tieu de</label>
            <input type="text" class="form-control" id=""  name="title">

            @error('title')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="">Noi dung</label>
            <textarea name="content" id="input" class="form-control" rows="3"></textarea>
        </div>

        

        <button type="submit" class="btn btn-secondary">Dang bai</button>
    </form>
@endsection

