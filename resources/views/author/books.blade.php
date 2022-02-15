@extends('layouts.task-layout')
@section('content')
<div>
    Автор: {{$author->name}}
</div>
<div>
    Книги:
    <ul>
        @foreach($author->books as $book)
            <li>
                Title: {{$book->title}}
            </li>
        @endforeach
    </ul>
</div>
@endsection
