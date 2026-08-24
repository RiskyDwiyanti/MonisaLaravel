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
            sidebarOpen: true,
            mobileOpen: false
        }"
        class="flex h-screen overflow-hidden"
    >

        <x-sidebar />

        <div class="flex flex-col flex-1 overflow-hidden">

            <x-navbar />

            <main class="flex-1 overflow-y-auto bg-slate-100">
                <div class="max-w-7xl mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>

            <x-footer />

        </div>

    </div>

</body>

</html>
