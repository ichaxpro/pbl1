<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css') }}"/>
</head>
<body>
    <div class="gallery-wrapper no-left" style="background-color: white">
    <button class="gallery-btn left" onclick="scrollGallery(-1)">&#8249;</button>

    <div class="gallery-container" id="gallerySlider">
        <img src="images/heroSection/1.jpg" alt="Lab 1">
        <img src="images/heroSection/2.jpg" alt="Lab 2">
        <img src="images/heroSection/3.jpg" alt="Lab 3">
        <img src="images/heroSection/4.jpg" alt="Lab 4">
        <img src="images/news/news1.jpeg" alt="Lab 4">
        <img src="images/news/news2.jpeg" alt="Lab 4">
        <img src="images/news/news3.jpeg" alt="Lab 4">
        <img src="images/news/news4.jpeg" alt="Lab 4">
    </div>

    <button class="gallery-btn right" onclick="scrollGallery(1)">&#8250;</button>
    </div>


    <script>
        function scrollGallery(direction) {
            const slider = document.getElementById("gallerySlider");
            const imgWidth = 350 + 25; // width + gap

            slider.scrollLeft += direction * imgWidth;
            updateGalleryFade();
        }

        const galleryWrapper = document.querySelector('.gallery-wrapper');
        const gallerySlider = document.getElementById("gallerySlider");

        function updateGalleryFade() {
            const slider = document.getElementById("gallerySlider");
            const maxScroll = slider.scrollWidth - slider.clientWidth;
            const currentScroll = slider.scrollLeft;

            const tolerance = 5;
    
            galleryWrapper.classList.remove('no-left', 'no-right');

            if (currentScroll <= tolerance) {
                galleryWrapper.classList.add('no-left');
            }
            // Jika di akhir (scrollLeft >= maxScroll - tolerance), sembunyikan tombol kanan
            if (currentScroll >= maxScroll - tolerance) {
                galleryWrapper.classList.add('no-right');
            }

            if (currentScroll >= maxScroll - tolerance) {
                galleryWrapper.classList.add('no-right');
            } else {
                galleryWrapper.classList.add('can-scroll-right');
            }
        }

        window.addEventListener('load', function() {
        updateGalleryFade();  // Dipanggil setelah semua gambar dan elemen load
        });
    gallerySlider.addEventListener('scroll', updateGalleryFade);
    </script>
</body>
</html>