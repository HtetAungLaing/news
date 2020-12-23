<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aurora Myanmar</title>
    @component('components.meta')

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
                                @if (session('edit-status'))
                                    {!! session('edit-status') !!}
                                @endif
                                <h4 class=""><b class="title">{{ $post->title }}</b></h4>
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
                        <h6><b>လူကြည့်အများဆုံး သတင်းများ</b></h6>
                        <div class="my-3" style="width: 50%;height: 5px;background: #000012ad"></div>
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
