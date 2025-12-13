<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $facility->title }} - Facility Detail</title>
    <link rel="stylesheet" href="{{ asset('css/facilitiesprofile.css') }}">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .facility-detail-wrapper {
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 30px;
            color: #129DCE;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .facility-detail-card {
            background: white;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
            overflow: hidden;
        }
        .facility-detail-image {
            width: 100%;
            height: 500px;
            overflow: hidden;
            background-color: #f0f0f0;
        }
        .facility-detail-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .facility-detail-content {
            padding: 30px;
        }
        .facility-detail-title {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin: 0 0 20px 0;
        }
    </style>
</head>
<body>
    @include('navbar')

    <div class="facility-detail-wrapper">
        <a href="{{ url()->previous() }}" class="back-link">&larr; Back</a>

        <div class="facility-detail-card">
            <div class="facility-detail-image">
                <img src="{{ asset($facility->image_url ?? 'images/default_facility.png') }}" alt="{{ $facility->title }}">
            </div>
            <div class="facility-detail-content">
                <h1 class="facility-detail-title">{{ $facility->title }}</h1>
                @if(!empty($facility->note_admin))
                    <p style="color: #666; font-size: 14px; line-height: 1.6; margin-top: 15px;">
                        <strong>Admin Note:</strong> {{ $facility->note_admin }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
