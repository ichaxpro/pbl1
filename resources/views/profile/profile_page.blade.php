<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <title>Homepage</title>
</head>
<body>
    @include('navbar')
    @include('profile/background')
    @include('profile/profile_vision_mission')
    @include('profile/research_focus')
   <x-laboratory-structure />
    @include('profile.profile_activities', ['activities' => $activities])
    @include('profile/profile_facilities')
    @include('footer')
</body>
</html>