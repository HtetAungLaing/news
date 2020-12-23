@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active"><a href="{{ route('article.index') }}">Article Lists</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @inject('cat', '\App\Category')
            <div class="col-12 mt-2">
                <div class="card shadow-sm">
                    <div class="card-body pb-0">
                        <h5>Article Lists</h5>
                        <table class="table table-hovered mb-0 at-list table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    {{-- <th>Description</th>
                                    <th>Fb Photo</th>
                                    <th>Content</th>
                                    <th>Category</th> --}}
                                    <th>Author</th>
                                    <th>Actions</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td class="text-nowrap">{{ Str::substr($a->title, 0, 40) }}</td>
                                        <td>{{ \App\User::find($a->user_id)->name }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('article.show', $a->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="feather-more-horizontal "></i>
                                            </a>
                                            <a href="{{ route('article.edit', $a->id) }}" class="btn btn-sm btn-outline-success">
                                                <i class="feather-edit-3"></i>
                                            </a>
                                            <form action="{{ route('article.destroy', $a->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger"><i class="feather-trash"></i></button>
                                            </form>

                                        </td>
                                        <td class="text-nowrap">{{ $a->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#content').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['height', 50]
            ],
            height: 200
        });

    </script>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
@endsection
