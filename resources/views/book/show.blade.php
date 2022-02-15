@extends('layouts.task-layout')
@section('content')
<div>
    Title: {{$book->title}}
</div>
<div>
    Author: {{$book->authorName}}
</div>
@endsection
