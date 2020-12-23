@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <div class="card shadow">
                    <div class="card-body p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 mt-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4>Create Category</h4>
                        <hr>
                        @if (session('status'))
                            {!! session('status') !!}
                        @endif
                        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @method("put")
                            @csrf
                            <div class="form-group">
                                <label for="title">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button class="btn btn-primary" name="addBtn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
