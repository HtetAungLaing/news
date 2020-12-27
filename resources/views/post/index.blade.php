<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>အော်ရိုရာသတင်း</title>
    @component('components.meta')
        <!-- Primary Meta Tags -->
        <link rel="canonical" href="http://www.auroranews.online/index.php">
        <meta name="title" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ">
        <meta name="description" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ Like လုပ်ခြင်းဖြင့် လွယ်ကူစွာ ဖတ်ရှုလိုက်ပါ">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://www.auroranews.online/">
        <meta property="og:title" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ">
        <meta property="og:description" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ Like လုပ်ခြင်းဖြင့် လွယ်ကူစွာ ဖတ်ရှုလိုက်ပါ">
        <meta property="og:image" content="{{ asset('storage/photo/cover.jpg') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="http://www.auroranews.online/">
        <meta property="twitter:title" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ">
        <meta property="twitter:description" content="အော်ရိုရာသတင်း ကဏ္ဍစုံ နယ်ပယ်စုံမှသတင်းများနှင့် ဖျော်ဖြေရေး သတင်းစုံ Like လုပ်ခြင်းဖြင့် လွယ်ကူစွာ ဖတ်ရှုလိုက်ပါ">
        <meta property="twitter:image" content="{{ asset('storage/photo/cover.jpg') }}">
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

<body style="background: #eeeeee">
    <div class="container">
        @component('components.nav')
        @endcomponent

        <div class="row mt-2">
            <div class="col-12 col-md-8">
                <div class="row">
                    @foreach ($posts as $p)
                        <div class="col-12 col-md-6 mb-2 shadow">
                            <div class="card shadow" style="width:100%">
                                <div class="bg w-100" style="background: url('{{ asset('storage/photo/' . $p->og_photo) }}')">
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
            <div class="col-12 col-md-4 mt-4 mt-md-0">
                <div class="row">
                    <div class="col-12 my-4 my-md-0">
                        <h6 class="mt-2"><b>အခြား သတင်းများ</b></h6>
                        <div class="my-3" style="width: 50%;height: 5px;background: #000012ad"></div>
                    </div>
                    @foreach ($relateds as $p)
                        <div class="col-12 shadow mb-2">
                            <div class="card shadow" style="width:100%">
                                <div class="bg w-100" style="background: url('{{ asset('storage/photo/' . $p->og_photo) }}')">
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
