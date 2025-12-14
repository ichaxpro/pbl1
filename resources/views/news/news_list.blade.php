<link rel="stylesheet" type="text/css" href="{{ asset('css/news_list.css') }}" />

<section class="news-wrapper">
    <div class="news-box">

        <div class="news-container">

            @forelse ($news as $news)
                <div class="news-item">
                    <div class="news-text">
                        <p class="news-category">NEWS</p>
                        <h2 class="news-title">
                            <a href="{{ route('news.show', $news->slug) }}">
                                {{ $news->title }}
                            </a>
                        </h2>
                        <p class="news-date">
                            {{ $news->published_at?->translatedFormat('d F, Y') }}
                        </p>
                        <p class="news-desc">
                            {{ \Illuminate\Support\Str::limit(strip_tags($news->content), 120) }}
                        </p>
                    </div>
                    @if ($news->thumbnail_url)
                        <img class="news-image" src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}">
                    @endif
                </div>
                <hr>
            @empty
                <div class="news-text">
                    <h2 class="news-title">No News Available</h2>
                    <p class="news-category">Please contact the laboratory to aquire more news and information</p>
                </div>

            @endforelse

            <!-- <div class="news-item">
                <div class="news-text">
                    <p class="news-category">NEWS</p>
                    <h2 class="news-title">Lorem Ipsum News</h2>
                    <p class="news-date">4 November, 2025</p>
                    <p class="news-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor.
                    </p>
                </div>
                <img class="news-image" src="{{ asset('images/sample_news.jpg') }}" alt="news">
            </div>

            <hr>

            
            <div class="news-item">
                <div class="news-text">
                    <p class="news-category">NEWS</p>
                    <h2 class="news-title">Lorem Ipsum News</h2>
                    <p class="news-date">4 November, 2025</p>
                    <p class="news-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor.
                    </p>
                </div>
                <img class="news-image" src="{{ asset('images/sample_news.jpg') }}" alt="news">
            </div>

            <hr>

            <div class="news-item">
                <div class="news-text">
                    <p class="news-category">NEWS</p>
                    <h2 class="news-title">Lorem Ipsum News</h2>
                    <p class="news-date">4 November, 2025</p>
                    <p class="news-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sit amet facilisis tortor.
                    </p>
                </div>
                <img class="news-image" src="{{ asset('images/sample_news.jpg') }}" alt="news">
            </div>

            <hr> -->

        </div>

    </div>
</section>