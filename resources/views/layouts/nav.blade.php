<nav class="fixed top-0 w-full flex justify-between px-16 py-5 duration-300 bg-white" data-aos="fade-down">
    <div>
        <h1 class="text-2xl font-semibold">Shoefree</h1>
    </div>

    <div class="block lg:hidden">
        <span class="bi bi-list"></span>
    </div>

    <ul class="hidden justify-between gap-10 items-center lg:flex">
        <li><a href="">Home</a></li>
        <li><a href="">Featured</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        @if (Auth::user())
            <li>
                <div class="flex items-center bg-white py-1 px-3">
                    <span class="bi bi-person-circle text-black mr-3"></span>
                    <h1 class="text-black">{{ Auth::user()->name }}</h1>
                </div>
            </li>
            <li>
                <form action="/logout">
                    <button type="submit" class="bg-blue-500 py-2 px-4 text-white">Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href='/login' class="bg-login-b py-2 px-4 text-white">Login on Shoefree</a>
            </li>
        @endif
    </ul>
</nav>
