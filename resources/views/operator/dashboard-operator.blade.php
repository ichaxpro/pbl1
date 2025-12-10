<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .card,
        .bg-white.card {
            background-color: #CDE3E7 !important;
            box-shadow: 0 6px 14px rgba(2, 6, 23, 0.06);
            border: 1px solid rgba(2, 6, 23, 0.06);
        }

        .card .section-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .approval-columns>div {
            padding: 1rem 0;
        }

        .approval-columns>div:not(:last-child) {
            border-right: 1px solid rgba(2, 6, 23, 0.06);
        }

        .h3 {
            font-family: poppins;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">

    <!-- Responsive Layout -->
    <div class="flex w-full min-h-screen">

        <!-- Sidebar (hidden on small screens) -->
        <aside class="w-64 h-screen border-r flex flex-col sticky top-0">
            @include('operator.sidebaroperator')
        </aside>

        <div class="flex-1 flex flex flex-col min-h screen">
            <!-- Topbar -->
            <div class="w-full">
                @include('operator.topbar')
            </div>

        </div>
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto px-8 py-6">
            <!-- Page Content -->
            <div class="max-w-full pl-12">
                <div class="container mx-auto px-2 sm:px-4 lg:px-6">
                    <!-- ========================= -->
                    <!-- ROW 1: Stats + Add Buttons -->
                    <!-- ========================= -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                        <!-- === LEFT: Statistics (4 cards) === -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-6">

                            <!-- Total News -->
                            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Total News</h3>
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-newspaper text-blue-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <div>
                                        <h2 class="text-3xl font-bold text-gray-800">{{ $totalNews }}</h2>
                                        <p
                                            class="text-sm {{ $newsDiff > 0 ? 'text-green-500' : ($newsDiff < 0 ? 'text-red-500' : 'text-gray-500') }} mt-1">
                                            @if ($newsDiff > 0)
                                                +{{ $newsDiff }} vs yesterday
                                            @elseif ($newsDiff < 0)
                                                {{ $newsDiff }} vs yesterday
                                            @else
                                                0 vs yesterday
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Publication -->
                            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-sm font-medium text-gray-500">Total Publication</h3>
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-book text-green-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex items-end justify-between">
                                    <div>
                                        <h2 class="text-3xl font-bold text-gray-800">{{ $totalPublications }}</h2>
                                        <p
                                            class="text-sm {{ $publicationsDiff > 0 ? 'text-green-500' : ($publicationsDiff < 0 ? 'text-red-500' : 'text-gray-500') }} mt-1">
                                            @if ($publicationsDiff > 0)
                                                +{{ $publicationsDiff }} vs yesterday
                                            @elseif ($publicationsDiff < 0)
                                                {{ $publicationsDiff }} vs yesterday
                                            @else
                                                0 vs yesterday
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Member (you had commented, so keeping removed) -->

                        </div>

                        <!-- === RIGHT: 2x2 Add Buttons === -->
                        <div class="grid grid-cols-2 gap-4">

                            <!-- Add Activity -->
                             <a href="{{ url('/add-activities') }}" class="{{ Request::is('add-activities') ? 'active' : '' }}">
                            <div class="bg-white card rounded-xl shadow-sm p-6 cursor-pointer transition-all duration-200">
                                <div class="flex flex-col items-center text-gray-800">
                                    <div
                                        class="w-10 h-6 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold">Add Activity</h3>
                                </div>
                            </div>
                            </a>

                            <!-- Add News -->
                             <a href="{{ url('/add-news') }}" class="{{ Request::is('add-news') ? 'active' : '' }}">
                            <div class="bg-white card rounded-xl shadow-sm p-6 cursor-pointer transition-all duration-200">
                                <div class="flex flex-col items-center text-gray-800">
                                    <div
                                        class="w-10 h-6 bg-green-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fas fa-newspaper text-green-600 text-xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold">Add News</h3>
                                </div>
                            </div>
                            </a>

                            <!-- Add Publication -->
                             <a href="{{ url('/add-publications') }}" class="{{ Request::is('add-publications') ? 'active' : '' }}">
                            <div class="bg-white card rounded-xl shadow-sm p-6 cursor-pointer transition-all duration-200">
                                <div class="flex flex-col items-center text-gray-800">
                                    <div
                                        class="w-10 h-6 bg-yellow-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fas fa-book text-yellow-600 text-xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold">Add Publication</h3>
                                </div>
                            </div>
                            </a>

                            <!-- Add Facility -->
                             <a href="{{ url('/add-facilities') }}" class="{{ Request::is('add-facilities') ? 'active' : '' }}">
                            <div class="bg-white card rounded-xl shadow-sm p-6 cursor-pointer transition-all duration-200">
                                <div class="flex flex-col items-center text-gray-800">
                                    <div
                                        class="w-10 h-6 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                                        <i class="fas fa-calendar-plus text-purple-600 text-xl"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold">Add Facilities</h3>
                                </div>
                            </div>
                            </a>

                        </div>

                    </div>

                    <!-- ============================= -->
                    <!-- ROW 2: Approval + Notification -->
                    <!-- ============================= -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100 lg:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6 section-title">
                                <span class="inline-block text-blue-600"><i class="fas fa-check-circle"></i></span>
                                Approval Status
                            </h3>

                            <div class="approval-columns grid grid-cols-3 text-center">
                                <!-- Requested -->
                                <div>
                                    <div class="text-sm text-gray-700 mb-3">Requested</div>
                                    <div class="text-3xl font-bold text-gray-800">{{ $requestedCount }}</div>
                                    @isset($requestedDiff)
                                        <p
                                            class="text-sm mt-1 {{ $requestedDiff > 0 ? 'text-green-500' : ($requestedDiff < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                            {{ $requestedDiff > 0 ? '+' . $requestedDiff : $requestedDiff }} vs yesterday
                                        </p>
                                    @else
                                        <div class="text-sm text-gray-500 mt-1">pending approval</div>
                                    @endisset
                                </div>

                                <!-- Approved -->
                                <div>
                                    <div class="text-sm text-gray-700 mb-3">Approved</div>
                                    <div class="text-3xl font-bold text-gray-800">{{ $approvedCount }}</div>
                                    @isset($approvedDiff)
                                        <p
                                            class="text-sm mt-1 {{ $approvedDiff > 0 ? 'text-green-500' : ($approvedDiff < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                            {{ $approvedDiff > 0 ? '+' . $approvedDiff : $approvedDiff }} vs yesterday
                                        </p>
                                    @else
                                        <div class="text-sm text-gray-500 mt-1">total approved</div>
                                    @endisset
                                </div>

                                <!-- Declined -->
                                <div>
                                    <div class="text-sm text-gray-700 mb-3">Declined</div>
                                    <div class="text-3xl font-bold text-gray-800">{{ $rejectedCount }}</div>
                                    @isset($rejectedDiff)
                                        <p
                                            class="text-sm mt-1 {{ $rejectedDiff > 0 ? 'text-green-500' : ($rejectedDiff < 0 ? 'text-red-500' : 'text-gray-500') }}">
                                            {{ $rejectedDiff > 0 ? '+' . $rejectedDiff : $rejectedDiff }} vs yesterday
                                        </p>
                                    @else
                                        <div class="text-sm text-gray-500 mt-1">total rejected</div>
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <!-- Notification -->
                        <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Notification</h3>
                            <div class="space-y-4">
                                <div
                                    class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-700">Admin menyetujui 1 permintaan</p>

                                        <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 p-3">
                                    <div class="w-2 h-2 bg-gray-300 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-700">User baru mendaftar</p>
                                        <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="flex items-start space-x-3 p-3">
                                    <div class="w-2 h-2 bg-gray-300 rounded-full mt-2"></div>
                                    <div>
                                        <p class="text-sm text-gray-700">Publikasi baru ditambahkan</p>
                                        <p class="text-xs text-gray-500 mt-1">1 day ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Statistic -->
                        <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100 lg:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-800 mb-6">Monthly Statistic</h3>
                            <div class="space-y-4">
                                <!-- News Stat -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-sm text-gray-600">News</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $monthlyNews }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        @php
                                            $newsWidth = $totalNews > 0 ? min(($monthlyNews / $totalNews) * 100, 100) : 0;
                                        @endphp
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $newsWidth }}%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Publication Stat -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-sm text-gray-600">Publication</span>
                                        <span
                                            class="text-sm font-medium text-gray-800">{{ $monthlyPublications }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        @php
                                            $pubWidth = $totalPublications > 0 ? min(($monthlyPublications / $totalPublications) * 100, 100) : 0;
                                        @endphp
                                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $pubWidth }}%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Member Stat -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-sm text-gray-600">Member</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $monthlyMembers }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        @php
                                            $memberWidth = $totalMembers > 0 ? min(($monthlyMembers / $totalMembers) * 100, 100) : 0;
                                        @endphp
                                        <div class="bg-purple-500 h-2 rounded-full" style="width: {{ $memberWidth }}%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Activity Stat -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-sm text-gray-600">Activity</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $monthlyActivities }}</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        @php
                                            $activityWidth = $monthlyActivities > 0 ? min(($monthlyActivities / max($monthlyActivities, 1)) * 100, 100) : 0;
                                        @endphp
                                        <div class="bg-orange-500 h-2 rounded-full"
                                            style="width: {{ $activityWidth }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </main>
    </div>

    <script>
        // Animate cards
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.bg-white');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });

            // Mobile sidebar toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileSidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('overlay');

            mobileMenuBtn.addEventListener('click', () => {
                mobileSidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            });

            overlay.addEventListener('click', () => {
                mobileSidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        });
    </script>

</body>

</html>