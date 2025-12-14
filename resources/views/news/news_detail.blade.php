<!-- <!DOCTYPE html>
<html lang="id"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Data Technology Laboratory</title>

    <link rel="stylesheet" href="{{ asset('css/news_detail.css') }}">

</head>

<!-- <body>  -->

@if(isset($isPreview) && $isPreview)
    <div
        style="background: #FEF3C7; border-left: 4px solid #F59E0B; padding: 16px; margin: 20px auto; max-width: 1200px; border-radius: 8px;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                <circle cx="12" cy="12" r="3" />
            </svg>
            <div>
                <strong style="color: #92400E; font-size: 16px;">Preview Mode</strong>
                <p style="color: #78350F; margin: 4px 0 0 0; font-size: 14px;">
                    You are viewing this content in preview mode. Status: <span
                        style="font-weight: 600;">{{ ucfirst($news->status) }}</span>
                </p>
            </div>
        </div>
            <a href="{{ route('content.management') }}" style="display: inline-block; margin-top: 12px; background: #6B7280; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">
                ← Back to Management
            </a>
        
    </div>
@endif

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