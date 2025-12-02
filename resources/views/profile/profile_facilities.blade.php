<link rel="stylesheet" href="{{ asset('css/facilitiesprofile.css') }}">

<div class="facilities-section">

    <h2 class="facilities-title">FACILITIES</h2>

    <div class="facilities-wrapper no-left" id="facilitiesWrapper">

        <button class="fac-arrow left" onclick="scrollFacilities(-1)">&#8249;</button>

        <div class="facilities-container" id="facilitiesSlider">
            @foreach ([
                ['img' => 'images/Jti_polinema.png', 'title' => 'Facility #1'],
                ['img' => 'images/Jti_polinema.png', 'title' => 'Facility #2'],
                ['img' => 'images/Jti_polinema.png', 'title' => 'Facility #3'],
                ['img' => 'images/Jti_polinema.png', 'title' => 'Facility #4'],
                ['img' => 'images/Jti_polinema.png', 'title' => 'Facility #5'],
            ] as $f)
                <div class="facility-card">
                    <div class="facility-thumb">
                        <img src="{{ asset($f['img']) }}" alt="">
                    </div>
                    <p class="facility-title">{{ $f['title'] }}</p>
                </div>
            @endforeach
        </div>

        <button class="fac-arrow right" onclick="scrollFacilities(1)">&#8250;</button>

        <div class="fac-fade-left"></div>
        <div class="fac-fade-right"></div>
    </div>
</div>

<script>
function scrollFacilities(direction) {
    const slider = document.getElementById("facilitiesSlider");
    const cardWidth = 350; // match card width

    slider.scrollLeft += direction * cardWidth;
    setTimeout(updateFacilitiesArrows, 200);
}

function updateFacilitiesArrows() {
    const slider = document.getElementById("facilitiesSlider");
    const wrapper = document.getElementById("facilitiesWrapper");
    const maxScroll = slider.scrollWidth - slider.clientWidth;

    wrapper.classList.remove("no-left", "no-right");

    if (slider.scrollLeft <= 0) wrapper.classList.add("no-left");
    if (slider.scrollLeft >= maxScroll - 5) wrapper.classList.add("no-right");
}

window.addEventListener("load", updateFacilitiesArrows);
document.getElementById("facilitiesSlider").addEventListener("scroll", updateFacilitiesArrows);
</script>
