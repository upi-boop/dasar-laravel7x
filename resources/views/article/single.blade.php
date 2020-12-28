@extends('layouts/app')
@section('content')

<h1>baca selengkapnya : {{$article->title}}</h1> 

<p>
{{$article->subject}}
</p>

<div class="row mb-1">
        <a href="/article/{{$article->id}}/edit" class="btn btn-secondary btn-sm">edit</a>
        <form action="/article/{{$article->id}}" method="post" class="">
            @csrf
            @method('DELETE')
        <button class="btn btn-danger btn-sm">hapus</button>
        </form>
</div>
<a href="/article"class="btn btn-sm btn-info"><<</a>

@include('layouts.footer')
@endsection