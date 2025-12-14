<link rel="stylesheet" type="text/css" href="{{ asset('css/publication_single_article.css') }}"/>

@if(isset($isPreview) && $isPreview)
<div style="background: #FEF3C7; border-left: 4px solid #F59E0B; padding: 16px; margin: 20px auto; max-width: 1200px; border-radius: 8px;">
    <div style="display: flex; align-items: center; gap: 12px;">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        <div>
            <strong style="color: #92400E; font-size: 16px;">Preview Mode</strong>
            <p style="color: #78350F; margin: 4px 0 0 0; font-size: 14px;">
                You are viewing this content in preview mode. Status: <span style="font-weight: 600;">{{ ucfirst($publication->status) }}</span>
            </p>
        </div>
    </div>
    <a href="{{ route('content.management') }}" style="display: inline-block; margin-top: 12px; background: #6B7280; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">
        ← Back to Management
    </a>
</div>
@endif

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
                    
                    {{-- Download Button --}}
                    <a href="{{ route('publications.download', $publication->id) }}" class="download-btn" style="display: inline-block; margin-top: 15px; background: #215C66; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px; transition: background 0.3s;">
                        📥 Download PDF
                    </a>
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