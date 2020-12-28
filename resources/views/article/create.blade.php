@extends('layouts/app')
@section('content')




<h1>buat tulisan baru</h1>


    <form action="/article" method="post" enctype="multipart/form-data">
    @csrf

    <x-input field="title" label="judul" type="text"/>
    
    <x-input field="tag" label="tag" type="text"/>

    <div class="form-group">
    <label for="subject">Subject</label>
    <textarea type="text" name="subject" id="subject" class="form-control" rows="3" value="">{{old('subject')}}</textarea>
                
            @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

    </div><br>


    <x-file field="tag" label="tag" type="text"/>

   
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>


@endsection