<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Ensure `.card` wins over Tailwind's `.bg-white` (CDN may inject styles after this file). */
        .card,
        .bg-white.card {
            background-color: #CDE3E7 !important;
            box-shadow: 0 6px 14px rgba(2,6,23,0.06);
            border: 1px solid rgba(2,6,23,0.06);
        }
        .card .section-title {
            display: flex;
            align-items: center;
            gap: .75rem;
        }
        .approval-columns > div {
            padding: 1rem 0;
        }
        .approval-columns > div:not(:last-child) {
            border-right: 1px solid rgba(2,6,23,0.06);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total News Card -->
            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Total News</h3>
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-newspaper text-blue-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">16</h2>
                        <p class="text-sm text-gray-500 mt-1">0 vs yesterday</p>
                    </div>
                </div>
            </div>

            <!-- Total Publication Card -->
            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Publication</h3>
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-book text-green-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">30</h2>
                        <p class="text-sm text-green-500 mt-1">+1 vs yesterday</p>
                    </div>
                </div>
            </div>

            <!-- Total Member Card -->
            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Total Member</h3>
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">9</h2>
                        <p class="text-sm text-green-500 mt-1">+1 vs yesterday</p>
                    </div>
                </div>
            </div>

            <!-- Add Member Card -->
            <div class="bg-white card rounded-xl shadow-sm p-6 cursor-pointer transition-all duration-200">
                <div class="flex flex-col items-center justify-center h-full text-gray-800">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">+ Add Member</h3>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Approval Status -->
            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100 lg:col-span-2">
                <h3 class="text-lg font-semibold text-gray-800 mb-6 section-title">
                    <span class="inline-block text-blue-600"><i class="fas fa-check-circle"></i></span>
                    Approval Status
                </h3>

                <div class="approval-columns grid grid-cols-3 text-center">
                    <div>
                        <div class="text-sm text-gray-700 mb-3">Requested</div>
                        <div class="text-3xl font-bold text-gray-800">3</div>
                        <div class="text-sm text-green-500 mt-1">+1 vs yesterday</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-700 mb-3">Approved</div>
                        <div class="text-3xl font-bold text-gray-800">1</div>
                        <div class="text-sm text-green-500 mt-1">+1 vs yesterday</div>
                    </div>

                    <div>
                        <div class="text-sm text-gray-700 mb-3">Declined</div>
                        <div class="text-3xl font-bold text-gray-800">0</div>
                        <div class="text-sm text-gray-500 mt-1">0 vs yesterday</div>
                    </div>
                </div>
            </div>

            <!-- Notification -->
            <div class="bg-white card rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">Notification</h3>
                
                <div class="space-y-4">
                    <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
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
                            <span class="text-sm font-medium text-gray-800">12</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <!-- Publication Stat -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-600">Publication</span>
                            <span class="text-sm font-medium text-gray-800">8</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>

                    <!-- Member Stat -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-600">Member</span>
                            <span class="text-sm font-medium text-gray-800">5</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>

                    <!-- Activity Stat -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-600">Activity</span>
                            <span class="text-sm font-medium text-gray-800">15</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-orange-500 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple animation on page load
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</body>
</html>