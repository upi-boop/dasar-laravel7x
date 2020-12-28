@extends('layouts/app')

@section('title', 'Halaman Artikel')

@section('content')


<h1>ini article dong</h1>



@foreach($articles->chunk(4) as $ArticleChunk)
<div class="row">
@foreach($ArticleChunk as $art)
<div class="col card mb-1 ml-3 mr-3">
    <img class="card-img-top" src="/image/{{$art->thumbnail}}" alt="card image cap" style="width:50%">
    <div class=" card-body">
        <p><strong>{{ ucfirst ($art->title)}}</strong></p>
        <p>{{$art->subject}}</p>
        
        <a href="/article/{{$art->title}}" class="btn btn-primary btn-sm streched-link">lihat</a>
    </div>
</div>

@endforeach

</div>

@endforeach
<div>
    {{$articles->links()}}
</div>

@include('layouts.footer')
@endsection