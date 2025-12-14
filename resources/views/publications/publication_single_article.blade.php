<link rel="stylesheet" type="text/css" href="{{ asset('css/publication_single_article.css') }}"/>

<section class="publication-wrapper">
    <div class="publication-box">

        <div class="publication-container">

            <div class="publication-item">
                
                {{-- Detail Publikasi Utama --}}
                <p class="article-category">Journal of Information Technology</p>
                <h2 class="article-title">{{ $publication->title }}</h2>
                
                {{-- Detail Tambahan --}}
                <div class="article-details">
                    
                    {{-- Penulis (Tetap di baris pertama detail) --}}
                    <span class="article-authors">{{ $publication->author ?? 'Author Unknown' }}</span> 
                    
                    {{-- Link DOI (Dipaksa ke baris baru oleh CSS) --}}
                    <a href="{{ $publication->file_url }}" class="article-link">{{ $publication->file_url }}</a>
                </div>
                
                <hr>

                {{-- Label Abstract di Tengah (CENTER BOLD) --}}
                <h3 class="abstract-label">ABSTRACT</h3>

                {{-- Bacaan Panjang (Isi Abstrak) --}}
                <p class="article-abstract-content">
                    {!! $publication->abstract ?? 'No description available.' !!}
                </p>
                
                {{-- KATA KUNCI DENGAN LABEL BOLD --}}
                @if(property_exists($publication, 'keywords') && $publication->keywords)
                    <p class="article-abstract-content">
                        <strong>Kata Kunci:</strong> {{ $publication->keywords }}
                    </p>
                @endif
                
            </div>

        </div>

    </div>
</section>