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
                                <li class="breadcrumb-item active">Article Details</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (session('edit-status'))
                            {!! session('edit-status') !!}
                        @endif
                        <h5 class=""><b class="title">{{ $article->title }}</b></h5>
                        <div class="my-3">
                            <small class="text-success mr-2"><i class="feather-user"></i>{{ \App\User::find($article->user_id)->name }}</small>
                            <small class="text-info mr-2"><i class="feather-layers"></i>{{ \App\Category::find($article->category_id)->name }}</small>
                            <small><i class="feather-calendar"></i>{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                        <div>
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
