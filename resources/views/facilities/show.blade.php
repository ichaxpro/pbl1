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
                    You are viewing this content in preview mode. Status: <span style="font-weight: 600;">{{ ucfirst($facility->status) }}</span>
                </p>
            </div>
        </div>
        @if($facility->status === 'requested')
            <div style="margin-top: 16px; padding-top: 12px; border-top: 1px solid #FCD34D; display: flex; gap: 12px;">
                <form action="{{ url('/admin/content/facilities/' . $facility->id . '/approve') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: #10B981; color: white; padding: 8px 16px; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                        ✓ Approve
                    </button>
                </form>
                <button onclick="showRejectForm()" style="background: #EF4444; color: white; padding: 8px 16px; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                    ✗ Reject
                </button>
                <a href="{{ route('content.management') }}" style="background: #6B7280; color: white; padding: 8px 16px; border: none; border-radius: 6px; text-decoration: none; display: inline-block; font-weight: 500;">
                    ← Back to Management
                </a>
            </div>
            <form id="rejectForm" action="{{ url('/admin/content/facilities/' . $facility->id . '/reject') }}" method="POST" style="display: none; margin-top: 12px; padding: 12px; background: white; border-radius: 6px;">
                @csrf
                <input type="text" name="note_admin" placeholder="Enter reason for rejection" required style="width: 100%; padding: 8px; border: 1px solid #D1D5DB; border-radius: 4px; margin-bottom: 8px;">
                <div style="display: flex; gap: 8px;">
                    <button type="submit" style="background: #EF4444; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">Submit Rejection</button>
                    <button type="button" onclick="hideRejectForm()" style="background: #9CA3AF; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                </div>
            </form>
            <script>
                function showRejectForm() {
                    document.getElementById('rejectForm').style.display = 'block';
                }
                function hideRejectForm() {
                    document.getElementById('rejectForm').style.display = 'none';
                }
            </script>
        @else
            <a href="{{ route('content.management') }}" style="display: inline-block; margin-top: 12px; background: #6B7280; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500;">
                ← Back to Management
            </a>
        @endif
    </div>
    @endif


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
