<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aurora Myanmar</title>
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
                    @foreach ($posts as $p)
                        <div class="col-12 col-md-4 mb-2 shadow">
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
            <div class="col-12 col-md-4"></div>
        </div>
        <div class="row justify-contents-center">
            <div class="col-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>


    @component('components.js')
    @endcomponent
</body>

</html>
