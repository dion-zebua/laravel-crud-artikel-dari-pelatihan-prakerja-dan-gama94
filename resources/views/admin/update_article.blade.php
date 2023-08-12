@extends('components.layout')

@section('body')
    <form class="container p-4" enctype="multipart/form-data" action="{{ route('article.admin.update' , $article->slug ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="text-center pb-3">
            <h1>Update Articles </h1>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled text-center">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="text-danger mt-2 mb-5">
            <span>*jika slug kosong maka otomatis dibuat</span>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="a" class="form-label mb-1">Title Article</label>
                <input type="text" name="title" value="{{ $article->title }}" class="form-control" id="a" placeholder="Title Article">
            </div>
            <div class="mb-3 col-md-6">
                <label for="b" class="form-label mb-1">Thumbnail Article</label>
                <input type="file" name="thumbnail" class="form-control" id="b">
                <img src="{{ asset('uploads/' . $article->thumbnail) }}" class="my-img col-md-6 mt-3" alt="{{ $article->title }}">
            </div>
            <div class="mb-3 col-md-6">
                <label for="c" class="form-label mb-1">Slug Article</label>
                <input type="text" name="slug" value="{{ $article->slug }}" class="form-control" id="c" placeholder="slug-article">
            </div>
            <div>
                <label for="editor" class="form-label mb-1">Description Article</label>
                <textarea class="form-control" name="description" placeholder="Write Description Article" id="editor" style="height: 100px">{{ $article->description }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4 d-flex align-items-center gap-2">
            <img width="16" height="16" src="https://img.icons8.com/ios/16/ffffff/save--v1.png" alt="save" title="save"/>
            Save
        </button>


    </form>    
@endsection
