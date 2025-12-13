<!-- <!DOCTYPE html>
<html lang="id"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Data Technology Laboratory</title>

    <link rel="stylesheet" href="{{ asset('css/news_detail.css') }}">

</head>

<!-- <body>  -->
<div class="container">
    <h1>{{ $news->title }}</h1>

    <p class="date">{{ $news->published_at->format('d F, Y') }}</p>

    @if($news->thumbnail_url)
        <figure>
            <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}">
        </figure>
    @endif

    <div class="news-content">
        {!! $news->content !!}
    </div>
    <!-- <h1>Data Technology Laboratory of POLINEMA Presents at Google Conference</h1>

        <p class="date">4 November, 2025</p>

        <figure>
            <img src="https://placehold.co/800x450/2E8B57/FFFFFF?text=Technology+Conference+Image"
                alt="Suasana Konferensi">

            <figcaption>
                Lorem Ipsum caption Suspendisse urna lacus, viverra et tincidunt in, aliquet quis arcu. In felis metus,
                rutrum ac aliquam vel, pulvinar suscipit massa.
            </figcaption>
        </figure>

        <h2>Sub Title 1</h2>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor. Suspendisse
            urna lacus, viverra et tincidunt in, aliquet quis arcu. In felis metus, rutrum ac aliquam vel, pulvinar
            suscipit massa. Fusce elit urna, mattis ac ultrices et, fermentum non massa. Nam quis justo metus. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor. Suspendisse urna
            lacus, viverra et tincidunt in, aliquet quis arcu.
        </p>

        <figure>
            <img src="https://placehold.co/800x450/2E8B57/FFFFFF?text=Technology+Conference+Image"
                alt="Suasana Konferensi">

            <figcaption>
                Lorem Ipsum caption Suspendisse urna lacus, viverra et tincidunt in, aliquet quis arcu. In felis metus,
                rutrum ac aliquam vel, pulvinar suscipit massa.
            </figcaption>
        </figure>

        <h2>Sub Title 1</h2>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor. Suspendisse
            urna lacus, viverra et tincidunt in, aliquet quis arcu. In felis metus, rutrum ac aliquam vel, pulvinar
            suscipit massa. Fusce elit urna, mattis ac ultrices et, fermentum non massa. Nam quis justo metus. Lorem
            ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor. Suspendisse urna
            lacus, viverra et tincidunt in, aliquet quis arcu.
        </p> -->
</div>

<!-- </body>

</html> -->