<link rel="stylesheet" href="{{ asset('css/activitiesprofile.css') }}">

<div class="activities-section">

    <h2 class="activities-title">ACTIVITIES</h2>

    <div class="activities-wrapper no-left" id="activitiesWrapper">

        <button class="arrow left" onclick="scrollActivities(-1)">&#8249;</button>

        <div class="activities-container" id="activitiesSlider">
                    <!-- dummy data -->
            @foreach ([
                ['img' => 'images/news/news1.jpeg', 'title' => 'Lab DT Visit to Nvidia Headquarters'],
                ['img' => 'images/news/news2.jpeg', 'title' => 'Lab DT Present Research at Bloomberg Technology Conference'],
                ['img' => 'images/news/news3.jpeg', 'title' => 'Conference about Digital Transformation at The Forum'],
                ['img' => 'images/news/news4.jpeg', 'title' => 'Lab DT Team Guest Lecture at International Symposium'],
            ] as $activity)
                <div class="activity-card">
                    <div class="activity-thumb">
                        <img src="{{ asset($activity['img']) }}" alt="">
                    </div>
                    <p class="activity-title">{{ $activity['title'] }}</p>
                </div>
            @endforeach

        </div>

        <button class="arrow right" onclick="scrollActivities(1)">&#8250;</button>
    
        <div class="fade-left"></div>
        <div class="fade-right"></div>
    </div>
</div>


<script>
function scrollActivities(direction) {
    const slider = document.getElementById("activitiesSlider");
    const wrapper = document.getElementById("activitiesWrapper");
    const cardWidth = 350;

    slider.scrollLeft += direction * cardWidth;

    setTimeout(() => updateArrows(), 200);
}

function updateArrows() {
    const slider = document.getElementById("activitiesSlider");
    const wrapper = document.getElementById("activitiesWrapper");

    const maxScroll = slider.scrollWidth - slider.clientWidth;

    wrapper.classList.remove("no-left", "no-right");

    if (slider.scrollLeft <= 0) wrapper.classList.add("no-left");
    if (slider.scrollLeft >= maxScroll - 5) wrapper.classList.add("no-right");
}

window.addEventListener("load", updateArrows);
document.getElementById("activitiesSlider").addEventListener("scroll", updateArrows);
</script>
