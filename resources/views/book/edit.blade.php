@extends('layouts.task-layout')
@section('content')
<div>
    Книга: {{$book->title}}
</div>
<div>
    Автор: {{$book->authorName}}
</div>

<form action="{{route('admin.book.update', ['book' => $book])}}" method="post">
    @csrf
    @method('patch')
    <label for="authors"></label>
    <select id="authors" name="author">
        @foreach($authors as $author)
        <option value="{{$author->id}}">{{$author->name}}</option>
        @endforeach
    </select>
    <div>
        <button type="submit">Save</button>
    </div>
</form>
@endsection
