@extends('components.layout')

@section('body')
    <div class="container p-4">
        <div class="text-center pb-3">
            <h1>Dashboard Articles </h1>
            <a class="btn btn-outline-primary" href="{{ route('article.admin.create') }}">Add new</a>
        </div>
        <div class="row">
            @if ($articles->count() > 0)
                <div class="table-responsive">
                    <table id="myTable" style="min-width: 800px" class="pt-3 table table-hover">
                        <thead class="table-secondary">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Publish</th>
                                <th>Thumbnail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><span class="line-1"><a href="{{ route('single_article' , $item->slug) }}">{{ $item->title }}</a></span></td>
                                    <td><span class="text-nowrap">{{ $item->created_at }}</span></td>
                                    <td>
                                        <a href="{{ $item->thumbnail }}">
                                            <img src="uploads/{{ $item->thumbnail }}" class="my-img img-table" alt="{{ $item->title }}">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <a href="{{ route('article.admin.edit' , $item->slug) }}" class="btn btn-warning btn-sm">
                                                <img width="16" height="16" src="https://img.icons8.com/material-outlined/24/pen.png" alt="edit" title="edit"/>
                                            </a>
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-{{ $item->id }}">
                                                <img width="18" height="16" src="https://img.icons8.com/sf-regular-filled/16/FFFFFF/trash.png" alt="hapus" title="hapus"/>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-danger text-center fw-bold">Article not found !</p>                  
            @endif
        </div>
    </div>    

<!-- Modal -->
@foreach ($articles as $item)
    <form method="POST" action="{{ route('article.admin.destroy' , $item->slug) }}" class="modal fade" id="modal-{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        @csrf
        @method('Delete')
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Article</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the article "{{ $item->title }}"?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </div>
        </div>
    </form>
@endforeach    

@endsection