@extends('layouts.task-layout')
@section('content')
<form action="{{route('book.store', ['author' => $author->id])}}" method="post">
    @csrf
    <div>
        <label for="title"></label>Title:
        <input type="text" name="title" id="title">
    </div>
    <div>
        <button type="submit">Add</button>
    </div>
</form>
@endsection
