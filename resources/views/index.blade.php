@extends('components.layout')

@section('body')
    <div class="container p-4">
        <h1 class="text-center">Articles </h1>
        <div class="row">
            @if ($articles->count() > 0)
                @foreach ($articles as $item)
                    @if ($loop->first)
                        <p class="lead fw-semibold mb-0">Total {{ $loop->count }}</p>
                    @endif
                    <div class="col-12 col-md-6 col-xl-4 mb-4 position-relative">
                        <div class="card h-100 overflow-hidden shadow-lg"> <img class="card-img-top my-img" src="{{ asset('uploads/' . $item->thumbnail) }}" alt="{{ $item->title }}" />
                            <div class="card-body d-flex flex-column justify-content-between py-4 px-3 px-md-4">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="link-900 fs-5 line-1 fw-bold text-decoration-none mb-0">{{ $item->title }}</span>
                                </div>
                                <div class="">
                                    <div class="d-flex flex-column align-items-start">
                                        <div class="line-3 my-2">{{ strip_tags($item->description) }}</div>
                                    </div>
                                    <a href="{{ route('single_article' , $item->slug ) }}" class="stretched-link mt-3">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-danger text-center fw-bold">Article not found !</p>                  
            @endif
        </div>

    </div>    
@endsection