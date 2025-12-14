<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css') }}">
</head>
<body>
    <div class="gallery-wrapper no-left" style="background-color: white">
    <button class="gallery-arrow left" id="btnLeft" onclick="scrollGallery(-1)">&#10094;</button>

    @php
        $images = glob(public_path('storage/gallery_images/*'));
    @endphp

    <div class="gallery-container" id="gallerySlider">
    @foreach ($images as $image)
        <img src="{{ asset('storage/gallery_images/' . basename($image)) }}" alt="Gallery Image">
    @endforeach
    </div>
    <!-- <div class="gallery-container" id="gallerySlider">
        <img src="images/heroSection/1.jpg" alt="Lab 1">
        <img src="images/heroSection/2.jpg" alt="Lab 2">
        <img src="images/heroSection/3.jpg" alt="Lab 3">
        <img src="images/heroSection/4.jpg" alt="Lab 4">
        <img src="images/news/news1.jpeg" alt="Lab 4">
        <img src="images/news/news2.jpeg" alt="Lab 4">
        <img src="images/news/news3.jpeg" alt="Lab 4">
        <img src="images/news/news4.jpeg" alt="Lab 4">
    </div> -->

    <button class="gallery-arrow right" id="btnRight" onclick="scrollGallery(1)">&#10095;</button>
    </div>


    <script>

        function scrollGallery(direction) {
        const slider = document.getElementById("newsSlider");
        const boxWidth = 320; // card width + gap

        slider.scrollLeft += direction * boxWidth;
        updateFade();
    }

    const galleryWrapper = document.querySelector('.gallery-wrapper');
    const gallerySlider = document.getElementById("gallerySlider");
    const imgWidth = 350 + 25; // width + gap
    
    function scrollGallery(direction) {
        gallerySlider.scrollLeft += direction * imgWidth;
        updateGalleryFade();
    }
    
    function updateGalleryFade() {
        const maxScroll = gallerySlider.scrollWidth - gallerySlider.clientWidth;
        const tolerance = 5;
    
        galleryWrapper.classList.remove('no-left', 'no-right');
    
        if (gallerySlider.scrollLeft <= tolerance) {
            galleryWrapper.classList.add('no-left');
        }
    
        if (gallerySlider.scrollLeft >= maxScroll - tolerance) {
            galleryWrapper.classList.add('no-right');
        }
    }
    
    // Event listener
    gallerySlider.addEventListener('scroll', updateGalleryFade);
    
    // Panggil saat page load
    window.addEventListener('load', updateGalleryFade);

    //     function scrollGallery(direction) {
    //         const slider = document.getElementById("gallerySlider");
    //         const imgWidth = 350 + 25; // width + gap

    //         slider.scrollLeft += direction * imgWidth;
    //         updateGalleryFade();
    //     }

    //     const galleryWrapper = document.querySelector('.gallery-wrapper');
    //     const gallerySlider = document.getElementById("gallerySlider");

    //     function updateGalleryFade() {
    //         const slider = document.getElementById("gallerySlider");
    //         const maxScroll = slider.scrollWidth - slider.clientWidth;
    //         const currentScroll = slider.scrollLeft;

    //         const tolerance = 5;
    
    //         galleryWrapper.classList.remove('no-left', 'no-right');

    //         if (currentScroll <= tolerance) {
    //             galleryWrapper.classList.add('no-left');
    //         }
    //         // Jika di akhir (scrollLeft >= maxScroll - tolerance), sembunyikan tombol kanan
    //         if (currentScroll >= maxScroll - tolerance) {
    //             galleryWrapper.classList.add('no-right');
    //         }

    //         if (currentScroll >= maxScroll - tolerance) {
    //             galleryWrapper.classList.add('no-right');
    //         } else {
    //             galleryWrapper.classList.add('can-scroll-right');
    //         }
    //     }

    //     window.addEventListener('load', function() {
    //     updateGalleryFade();  // Dipanggil setelah semua gambar dan elemen load
    //     });
    // gallerySlider.addEventListener('scroll', updateGalleryFade);
    </script>
</body>
</html>