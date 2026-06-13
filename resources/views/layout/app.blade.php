<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="bg-slate-100">

<div
    x-data="{
        sidebarOpen:true,
        mobileOpen:false
    }"
    class="h-screen flex overflow-hidden"
>

    <x-sidebar />

    <div class="flex flex-col flex-1 overflow-hidden">

        <x-navbar />

        <main class="flex-1 overflow-y-auto">

            @yield('content')

        </main>

        <x-footer />

    </div>

</div>

</body>
</html>
