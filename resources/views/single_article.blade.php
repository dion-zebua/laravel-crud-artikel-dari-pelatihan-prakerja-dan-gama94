@extends('components.layout')

@section('body')
    <article class="container p-4">
        <div>
            <div class="row">
                <div class="z-index-1 col-lg-8 mb-5 pe-lg-5">
                    <div class="mb-4 text-start">
                        <h1 class="text-secondary fs-2 fw-bold mb-0">{{ $single_article->title }}</h1>
                            <span class="fs-7 text-secondary">
                                Publish at: {{ $single_article->created_at }}
                            </span>
                        <img src="{{ asset('uploads/' . $single_article->thumbnail) }}" class="shadow-sm my-img my-2 rounded-1" alt="{{ $single_article->title }}">
                        <div class="my-4 my-lg-6">
                            {!! $single_article->description !!}
                        </div>
                    </div>
                </div>
                <div class="z-index-1 col-lg-4 ps-lg-5">
                    <div>
                        <h4 class="text-secondary fw-medium mb-3">Latest Articles</h4>
                        <div class="row flex-column flex-md-row">
                            @if ($all_articles->count() > 0)
                                @foreach ($all_articles as $item)
                                    <div class="col-md-4 col-lg-12">
                                        <div class="p-3 mb-4 shadow-sm rounded">
                                            <div class="card border-0 flex-row flex-md-column flex-lg-row">
                                                <div class="col-4 col-md-12 col-lg-4">
                                                    <img src="{{ asset('uploads/' . $item->thumbnail) }}" class="rounded my-img" alt="{{ $item->title }}">
                                                </div>
                                                <div class="card-body pt-0 pt-md-3 pt-lg-0 pe-0 pe-md-3 pe-lg-0 pb-0 d-flex justify-content-between flex-column">
                                                    <h5 class="fs-6 card-title line-1 mb-0 link-primary fw-medium">{{ $item->title }}</h5>
                                                    <div class="fs-7 card-text mb-0 line-1 text-secondary">{{ strip_tags($item->description) }}</div>
                                                    <a href="{{ route('single_article' , $item->slug) }}" class="fs-7 text-primary stretched-link">Read More..</a>
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
                    <hr class="my-5 my-lg-7">
                </div>
            </div>
        </div> 
    </article>   
@endsection