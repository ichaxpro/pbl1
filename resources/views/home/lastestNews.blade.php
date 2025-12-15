

<link rel="stylesheet" type="text/css" href="css/lastestNews.css">


<!-- <body> -->
<div class="news-section" style="background-color: white">
    <h2 class="title">LATEST NEWS</h2>

    <div class="news-wrapper">
        <button class="arrow left" id="btnLeft" onclick="scrollNews(-1)">&#10094;</button>
        <div class="news-slider" id="newsSlider">

            @forelse ($latestNews as $news)
                <a href="{{ route('news.show', $news->slug) }}" class="news-card">
                    <img src="{{ asset($news->thumbnail_url) }}" alt="{{ $news->title }}">

                    <span class="news-date">
                        {{ optional($news->published_at)->format('d F Y') }}
                    </span>

                    <h3 class="news-title">
                        {{ $news->title }}
                    </h3>

                    <div class="card-footer">
                        <span>READ</span>
                        <span class="footer-arrow">→</span>
                    </div>
                </a>
            @empty
                <p>No news available</p>
            @endforelse


        </div>

        <button class="arrow right" id="btnRight" onclick="scrollNews(1)">&#10095;</button>
    </div>
</div>

<script>
    function scrollNews(direction) {
        const slider = document.getElementById("newsSlider");
        const boxWidth = 320; // card width + gap

        slider.scrollLeft += direction * boxWidth;
        updateFade();
    }

    const wrapper = document.querySelector('.news-wrapper');
    const slider = document.getElementById("newsSlider");
    const boxWidth = 320;

    function updateFade() {
        // Cek posisi scroll
        const maxScroll = slider.scrollWidth - slider.clientWidth;

        if (slider.scrollLeft <= 5) {
            wrapper.classList.add('no-left');
        } else {
            wrapper.classList.remove('no-left');
        }

        if (slider.scrollLeft >= maxScroll - 5) {
            wrapper.classList.add('no-right');
        } else {
            wrapper.classList.remove('no-right');
        }
    }

    slider.addEventListener('scroll', updateFade);
    updateFade();
</script>


<!-- <div style="display:flex; gap:20px; overflow-x:auto; white-space:nowrap;">
        <div style="width:300px; height:200px; background:red;"></div>
        <div style="width:300px; height:200px; background:green;"></div>
        <div style="width:300px; height:200px; background:blue;"></div>
        <div style="width:300px; height:200px; background:orange;"></div>
    </div> -->