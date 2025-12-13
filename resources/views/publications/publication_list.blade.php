<link rel="stylesheet" type="text/css" href="{{ asset('css/publication_list.css') }}"/>

<section class="publication-wrapper">
    <div class="publication-box">

        <div class="publication-container">

            {{-- Display accepted publications from database --}}
            @forelse ($publications as $publication)
                @if ($publication->status === 'accepted')
                    <a href="{{ route('publications.show', $publication->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="publication-item">
                            <p class="publication-category">Journal of Information Technology</p>
                            {{-- Display title from database --}}
                            <h2 class="publication-title">{{ $publication->title }}</h2>
                            
                            {{-- Format date using Carbon --}}
                            <p class="publication-date">
                                {{ \Carbon\Carbon::parse($publication->created_at)->format('d/m/Y') }}
                            </p>
                            
                            {{-- Display authors --}}
                            <p class="publication-authors">{{ $publication->author ?? 'Author Unknown' }}</p> 
                            
                            {{-- Display link/DOI from database --}}
                            <a href="{{ $publication->file_url }}" class="publication-link" onclick="event.stopPropagation();">{{ $publication->file_url }}</a>
                        </div>
                    </a>
                    <hr>
                @endif
            @endfor

        </div>

    </div>
</section>