<link rel="stylesheet" type="text/css" href="{{ asset('css/laboratory_structure.css') }}"/>
<section img src="images/LabDT/gedung-sipil.png" alt="background" class="lab-structure">
    <h2 class="section-title">LABORATORY STRUCTURE</h2>

<!-- Head of Lab -->
    @if($head)
    <div class="head-wrapper">
        <div class="card head-card">
            <div class="card-content">
                <img src="{{ (filter_var($head->photo_url, FILTER_VALIDATE_URL) ? $head->photo_url : asset(ltrim($head->photo_url, '/'))) }}" alt=" {{$head->name }}" class="profile-image">
                <a href="{{ $head->sinta_link }}" target="_blank" class="name-link">{{ $head->name }}</a>
                <p class="role">{{ $head->position->name }}</p>  <!-- AMBIL DARI DATABASE -->
            </div>
        </div>
    </div>
    @endif

    <!-- Researchers -->
    <div class="researcher-wrapper">
        @forelse($researchers as $researcher)
        <div class="card">
            <div class="card-content">
                <img src="{{ (filter_var($researcher->photo_url, FILTER_VALIDATE_URL) ? $researcher->photo_url : asset(ltrim($researcher->photo_url, '/'))) }}" alt="{{ $researcher->name }}" class="profile-image">
                <a href="{{ $researcher->sinta_link }}" target="_blank" class="name-link">{{ $researcher->name }}</a>
                <p class="role">{{ $researcher->position->name }}</p>  <!-- AMBIL DARI DATABASE -->
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-content">
                <p>No researchers data available</p>
            </div>
        </div>
        @endforelse
    </div>
</section>

    
