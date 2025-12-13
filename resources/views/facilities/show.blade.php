<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-50 text-gray-800">
    @include('navbar')

    <div class="max-w-5xl mx-auto py-10 px-4">
        <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:text-gray-800">&larr; Back</a>

        <div class="bg-white shadow rounded-lg mt-4 overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2 bg-gray-100 flex items-center justify-center p-4">
                    <img src="{{ asset($facility->image_url ?? 'images/default_facility.png') }}" alt="{{ $facility->title }}" class="max-h-96 object-contain">
                </div>
                <div class="md:w-1/2 p-6 space-y-4">
                    <div>
                        <p class="text-xs uppercase tracking-wide text-green-700 font-semibold">Facility</p>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $facility->title }}</h1>
                    </div>
                    <div class="text-sm text-gray-600">
                        <p><span class="font-semibold">Status:</span> {{ ucfirst($facility->status ?? 'unknown') }}</p>
                        <p><span class="font-semibold">Uploaded:</span> {{ optional($facility->created_at)->format('d M Y') }}</p>
                    </div>
                    @if(!empty($facility->note_admin))
                        <div class="bg-yellow-50 border border-yellow-200 rounded p-3 text-sm text-yellow-900">
                            <span class="font-semibold">Admin note:</span> {{ $facility->note_admin }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('footer')
</body>
</html>
