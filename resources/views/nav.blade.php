<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mahmud</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}
</head>
<body>

<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div
        class="relative min-h-screen flex flex-col items-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2  gap-2 py-10 lg:grid-cols-3">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        <a href="{{ route("projects.index")  }}"
                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >Projects </a>
{{--                        <a href="{{ route('tasks.index')  }}"--}}
{{--                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
{{--                        > Tasks </a>--}}

                        @auth
{{--                            <a--}}
{{--                                    href="{{ url('/dashboard') }}"--}}
{{--                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"--}}
{{--                            >--}}
{{--                                Dashboard--}}
{{--                            </a>--}}
                            <form method="post" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit">log out</button>
                            </form>
                        @else
                            <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
        </div>

    </div>
</div>
</body>
</html>
