<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>အင်ကြင်းသတင်း</title>
    @component('components.meta')
        <link rel="canonical" href="http://139.180.191.179/post/{{ $post->id }}">
        <!-- Primary Meta Tags -->
        <meta name="title" content="{{ $post->title }}">
        <meta name="description" content="{{ $post->description }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://139.180.191.179/post/{{ $post->id }}">
        <meta property="og:title" content="{{ $post->title }}">
        <meta property="og:description" content="{{ $post->description }}">
        <meta property="og:image" content="http://139.180.191.179/storage/photo/{{ $post->og_photo }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="http://139.180.191.179/post/{{ $post->id }}">
        <meta property="twitter:title" content="{{ $post->title }}">
        <meta property="twitter:description" content="{{ $post->description }}">
        <meta property="twitter:image" content="http://139.180.191.179/storage/photo/{{ $post->og_photo }}">
    @endcomponent
    @component('components.css')

    @endcomponent
    <style>
        .bg {
            background-repeat: no-repeat !important;
            height: 10rem;
            background-size: cover !important;
            background-position: center !important;
        }

    </style>
</head>

<body style="background: #cacaca6b">
    <div class="container">
        @component('components.nav')
        @endcomponent

        <div class="row mt-2">
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div><img src="{{ asset('storage/photo/') . '/' . $post->og_photo }}" class="img-fluid rounded" alt=""></div>
                                <h4 class="mt-3"><b class="title">{{ $post->title }}</b></h4>
                                <div class="my-3">
                                    <small class="text-success mr-2"><i class="feather-user"></i>{{ \App\User::find($post->user_id)->name }}</small>
                                    <small class="text-info mr-2"><i class="feather-layers"></i>{{ \App\Category::find($post->category_id)->name }}</small>
                                    <small><i class="feather-calendar"></i>{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                                <p><b>{{ $post->description }}</b></p>
                                <div>
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-4 mt-md-0">
                <div class="row">
                    <div class="col-12 my-4 my-md-0">
                        <h6 class="mt-2"><b>အခြား သတင်းများ <i class="feather-book-open ml-2"></i></b></h6>
                        <div class="my-3" style="width: 35%;height: 5px;background: #000012ad"></div>
                    </div>
                    @foreach ($relateds as $p)
                        <div class="col-12 shadow mb-2">
                            <div class="card shadow" style="width:100%">
                                <div class="bg w-100" style="background: url({{ asset('storage/photo/') . '/' . $p->og_photo }})">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p->title }}</h5>
                                    <p class="card-text">{{ $p->description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $p->updated_at->diffForHumans() }}</small></p>
                                    <a href="{{ route('post.show', $p->id) }}" class="btn btn-sm btn-outline-primary">ဖတ်မယ်
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    @component('components.js')
    @endcomponent
</body>

</html>
