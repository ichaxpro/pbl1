<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/lastestNews.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="news-section" style="background-color: white">
    <h2 class="title">LATEST NEWS</h2>

    <div class="news-wrapper">
        <button class="arrow left" id="btnLeft" onclick="scrollNews(-1)">&#10094;</button>

        <div class="news-slider" id="newsSlider">
            <a href="#" class="news-card">
                <img src="images/news/news1.jpeg" alt="">
                <span class="news-date">14, October 2028</span>
                <h3 class="news-title">Judul Berita 1</h3>
                <div class="card-footer">
                    <span>READ</span>
                    <span class="footer-arrow">→</span>
                </div>
            </a>

            <a href="#" class="news-card">
                <img src="images/news/news1.jpeg" alt="">
                <span class="news-date">14, October 2028</span>
                <h3 class="news-title">Judul Berita 1</h3>
                <div class="card-footer">
                    <span>READ</span>
                    <span class="footer-arrow">→</span>
                </div>
            </a>

            <a href="#" class="news-card">
                <img src="images/news/news1.jpeg" alt="">
                <span class="news-date">14, October 2028</span>
                <h3 class="news-title">Judul Berita 1</h3>
                <div class="card-footer">
                    <span>READ</span>
                    <span class="footer-arrow">→</span>
                </div>
            </a>

            <a href="#" class="news-card">
                <img src="images/news/news1.jpeg" alt="">
                <span class="news-date">14, October 2028</span>
                <h3 class="news-title">Judul Berita 1</h3>
                <div class="card-footer">
                    <span>READ</span>
                    <span class="footer-arrow">→</span>
                </div>
            </a>

            <a href="#" class="news-card">
                <img src="images/news/news1.jpeg" alt="">
                <span class="news-date">14, October 2028</span>
                <h3 class="news-title">Judul Berita 1</h3>
                <div class="card-footer">
                    <span>READ</span>
                    <span class="footer-arrow">→</span>
                </div>
            </a>
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

</body>
</html>