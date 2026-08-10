<aside
    class="bg-slate-900 text-white transition-all duration-300"
    :class="sidebarOpen ? 'w-64' : 'w-20'"
>

    <!-- Logo -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-slate-800">

        <div class="flex items-center gap-3">

            <div
                class="w-10 h-10 rounded bg-pink-500 flex items-center justify-center font-bold">
                M
            </div>

            <span
                x-show="sidebarOpen"
                x-transition
                class="font-semibold text-lg">
                Metronic
            </span>

        </div>

        <button @click="sidebarOpen=!sidebarOpen">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-4 h-4 text-slate-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"/>

            </svg>

        </button>

    </div>

    <!-- Menu -->

    <nav class="mt-4 px-2">
        @php

        $user = auth()->user();
        $roleIds = $user->roles->pluck('id')->toArray();

        $menus = \App\Models\Menu::query()
            ->whereNull('parent_id')
            ->where('is_active', 1)
            ->whereHas('roles', function ($q) use ($roleIds) {
                $q->whereIn('role_id', $roleIds);
            })
            ->with([
                'children' => function ($q) use ($roleIds) {
                    $q->where('is_active', true)
                        ->whereHas('roles', function ($q2) use ($roleIds) {
                            $q2->whereIn('role_id', $roleIds);
                        })
                        ->orderBy('order');
                }
            ])
            ->orderBy('order')
            ->get();
        @endphp

        @foreach ($menus as $menu)
            <x-menu-item :menu="$menu" />
        @endforeach

    </nav>

    <div class="border-t border-slate-800 p-4">
        <form
            action="{{ route('auth.logout') }}"
            method="POST"
            >
            @csrf

            <button
                type="submit"
                onclick="return confirm('Yakin ingin logout?')"
                class="w-full flex items-center gap-3 rounded-lg px-4 py-3 text-slate-400 hover:bg-red-600 hover:text-white transition">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span x-show="sidebarOpen">

                    Logout

                </span>

            </button>

        </form>
    </div>

</aside>
