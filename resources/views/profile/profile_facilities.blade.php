<link rel="stylesheet" href="{{ asset('css/facilitiesprofile.css') }}">

<div class="facilities-section">

    <h2 class="facilities-title">FACILITIES</h2>

    <div class="facilities-wrapper no-left" id="facilitiesWrapper">

        {{-- Tombol panah hanya akan muncul jika ada fasilitas --}}
            @if (isset($facilities) && $facilities->count() > 0)        
            <button class="fac-arrow left" onclick="scrollFacilities(-1)">&#8249;</button>
        @endif

        <div class="facilities-container" id="facilitiesSlider">
            {{-- MENGGANTI DUMMY ARRAY DENGAN DATA DARI CONTROLLER ($facilities) --}}
            @forelse ($facilities ?? [] as $facility)
                <div class="facility-card">
                    <div class="facility-thumb">
                        {{-- SESUAIKAN nama kolom gambar jika berbeda (misalnya ->image_path) --}}
                        <img src="{{ asset($facility->image_url ?? 'images/default_facility.png') }}" 
                             alt="{{ $facility->title }}">
                    </div>
                    {{-- Tampilkan Title dari database --}}
                    <p class="facility-title">{{ $facility->title }}</p>
                    
                    {{-- Opsional: Tambahkan link atau detail jika fasilitas memiliki halaman sendiri --}}
                    {{-- <a href="{{ route('facilities.show', $facility->id) }}" class="facility-link">View Details</a> --}}
                </div>
            @empty
                {{-- Tampilkan pesan jika tidak ada fasilitas yang tersedia --}}
                <div class="facility-card">
                    <p>No approved facilities available.</p>
                </div>
            @endforelse
            
        </div>
        
        @if (isset($facilities) && $facilities->count() > 0)
            <button class="fac-arrow right" onclick="scrollFacilities(1)">&#8250;</button>
            <div class="fac-fade-left"></div>
            <div class="fac-fade-right"></div>
        @endif
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
