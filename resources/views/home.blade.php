<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoefree</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">
    @if (session('$purchaseMessage'))
        <h1>{{ $purchaseMessage }}</h1>
    @endif
    <header class="*:text-white">
        @extends('layouts.nav')
        <section
            class="bg-section p-10 w-full h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat">
            <div class="text-center">
                <h1
                    class="inline-block px-4 py-2 bg-white text-2xl font-semibold mb-8 text-black rounded-lg border-2 border-yellow-500">
                    Shoefree</h1>
                <div class="mb-5">
                    <h1 class="text-5xl font-bold text-center mb-5 md:text-7xl">TRY OUR NEW INOVATION</h1>
                    <p class="opacity-75">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet ex
                        reiciendis dicta eaque cupiditate nam quasi fugiat, omnis soluta alias.</p>
                </div>
                <div class="flex justify-center gap-5">
                    <button class="py-2 px-4 border-yellow-500 border-2 bg-yellow-500 font-semibold rounded-md">Try Now</button>
                    <button class="py-2 px-4 border-red-600 border-2 bg-red-500 font-semibold rounded-md">See Products</button>
                </div>
            </div>
        </section>
    </header>
    <main>
        @if (Auth::user())
            <div class="p-10 text-center flex flex-col items-center">
                <h1 class="text-3xl font-semibold mb-10">Your Purchase</h1>
                <table class="w-1/2">
                    <thead>
                        <th class="border-b-2 border-black text-xl p-2">Item</th>
                        <th class="border-b-2 border-black text-xl p-2">Quantity</th>
                        <th class="border-b-2 border-black text-xl p-2">Time</th>
                    </thead>
                @empty($purchases->all())
                    <tr>
                        <td colspan="4" class="text-xl font-semibold p-2">None</td>
                    </tr>
                @else
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td class="text-center p-2">{{ $purchase->name }}</td>
                            <td class="text-center p-2">{{ $purchase->quantity }}</td>
                            <td class="text-center p-2">{{ $purchase->time }}</td>
                        </tr>
                    @endforeach
                @endempty
            </table>
        </div>
    @endif

    <div class="pt-10 pb-20">
        <h1 class="text-3xl font-semibold text-center mb-10">Featured Products</h1>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="featured-card" data-aos="fade-down">
                <img src={{ asset('images/featured/ervan-m-wiraman.jpg') }} alt="Ervan M Wiraman"
                    class="duration-500 hover:scale-125">
            </div>
            <div class="featured-card" data-aos="fade-down">
                <img src={{ asset('images/featured/mojtaba-fahiminia.jpg') }} alt="Mojtaba Fahiminia"
                    class="duration-500 hover:scale-125">
                <a href="" class="text-white font-bold">Click To See More</a>
            </div>
            <div class="featured-card" data-aos="fade-down">
                <img src="{{ asset('images/featured/ox-street.jpg') }}" alt="Ox Street"
                    class="duration-500 hover:scale-125">
                <a href="" class="text-white font-bold">Click To See More</a>
            </div>
        </div>
    </div>

    <div class="p-10">
        <h1 class="main-header relative text-3xl text-center font-semibold mb-20">Available Product</h1>
        <div class="flex flex-wrap justify-center gap-10">
            @foreach ($products as $product)
                <div class="product-card" data-aos="fade-down">
                    <img src={{ asset('images/products/product-' . $product->id . '.jpg') }} alt="">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold my-2">{{ $product->name }}</h1>
                        <span class="py-1 px-3 bg-yellow-500 text-white rounded-md">Rp.
                            {{ number_format($product->price), '.', '.' }}</span>
                    </div>
                    <p class="opacity-75 mb-3">{{ $product->description }}</p>
                    <a href="/products/{{ $product->id }}"
                        class="inline-block font-semibold text-white py-2 px-4 bg-red-500">See More</a>
                </div>
            @endforeach
        </div>
    </div>
</main>

<footer>

</footer>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>

</html>
