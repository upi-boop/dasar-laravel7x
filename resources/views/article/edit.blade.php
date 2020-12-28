@extends('layouts/app')
@section('content')




<h1>edit tulisan </h1>


    <form action="/article/{{$article->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    
    <x-input field="title" label="judul" type="text" value="{{$article->title}}"/>
    
    <x-input field="tag" label="tag" type="text"/>


    <div class="form-group">
    <label for="subject">Subject</label>
    <textarea type="text" name="subject" id="subject" class="form-control" rows="3" value="">{{old('subject') ? old('title'): $article->subject}}</textarea>
                
            @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

    </div><br>
    
    @if ($article->thumbnail)
    <img src="/image/{{$article->thumbnail}}" width="150">
    @else
    <p>belum ada gambar</p>



    @endif
    <x-file field="tag" label="tag" type="text"/>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


@endsection