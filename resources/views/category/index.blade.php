@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item active"><a href="{{ route('category.index') }}">Article Lists</a></li>
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
                        @if (session('update-status'))
                            {!! session('update-status') !!}
                        @endif
                        @if (session('del-status'))
                            {!! session('del-status') !!}
                        @endif
                        <h5>Article Lists</h5>
                        <table class="table table-hovered mb-0 at-list table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Category::all() as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->name }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('category.edit', $a->id) }}" class="btn btn-sm btn-outline-success">
                                                <i class="feather-edit-3"></i>
                                            </a>
                                            <form action="{{ route('category.destroy', $a->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" type="submit" onclick="alert('Sure To Delete?')"><i class="feather-trash"></i></button>
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
