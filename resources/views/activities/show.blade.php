<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $activity->title }} - Activity Detail</title>
    <link rel="stylesheet" href="{{ asset('css/activitiesprofile.css') }}">
    <style>
        body { font-family: 'Montserrat', sans-serif; background-color: #f5f5f5; margin: 0; }
        .activity-detail-wrapper { padding: 40px 20px; max-width: 800px; margin: 0 auto; }
        .back-link { display: inline-block; margin-bottom: 30px; color: #129DCE; text-decoration: none; font-size: 14px; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
        .activity-detail-card { background: white; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.12); overflow: hidden; }
        .activity-detail-image { width: 100%; height: 500px; overflow: hidden; background-color: #f0f0f0; }
        .activity-detail-image img { width: 100%; height: 100%; object-fit: cover; }
        .activity-detail-content { padding: 30px; }
        .activity-detail-title { font-size: 28px; font-weight: 600; color: #333; margin: 0 0 20px 0; }
        .activity-detail-note { color: #666; font-size: 14px; line-height: 1.6; margin-top: 15px; }
    </style>
</head>
<body>
    @include('navbar')

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
                    You are viewing this content in preview mode. Status: <span style="font-weight: 600;">{{ ucfirst($activity->status) }}</span>
                </p>
            </div>
        </div>
        <a href="{{ route('content.management') }}" style="display: inline-block; margin-top: 12px; background: #6B7280; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">
            ← Back to Management
        </a>
    </div>
    @endif

    <div class="activity-detail-wrapper">
        

        <div class="activity-detail-card">
            <div class="activity-detail-image">
                <img src="{{ asset($activity->image_url ?? 'images/default_activity.png') }}" alt="{{ $activity->title }}">
            </div>
            <div class="activity-detail-content">
                <h1 class="activity-detail-title">{{ $activity->title }}</h1>
                @if(!empty($activity->note_admin))
                    <p class="activity-detail-note">
                        <strong>Admin Note:</strong> {{ $activity->note_admin }}
                    </p>
                @endif
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
