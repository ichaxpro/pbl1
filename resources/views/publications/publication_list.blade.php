<link rel="stylesheet" type="text/css" href="{{ asset('css/publication_list.css') }}"/>

<section class="publication-wrapper">
    <div class="publication-box">

        <div class="publication-container">

            {{-- 4 Item Publikasi Dummy --}}
            @for ($i = 0; $i < 4; $i++)
                <div class="publication-item">
                    <p class="publication-category">Journal of Information Technology</p>
                    <h2 class="publication-title">Artificial Intelligence on Processing Big Data</h2>
                    <p class="publication-date">11/11/2025</p>
                    <p class="publication-authors">Author 1, Author 2, Author 3</p>
                    <a href="https://doi.1929.101" class="publication-link">https://doi.1929.101</a>
                </div>
                
                {{-- Hanya tambahkan HR jika bukan item terakhir --}}
                @if ($i < 3)
                    <hr>
                @endif
            @endfor

        </div>

    </div>
</section>