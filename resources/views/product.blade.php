<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div class="h-screen w-full flex flex-col lg:flex-row p-20 bg-slate-100 gap-20">
        <img src="{{ asset('images/products/product-' . $product->id . '.jpg') }}" alt="{{ $product->name }}"
            class="h-96">
        <div>
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-semibold my-2">{{ $product->name }}</h1>
                <span class="py-1 px-3 bg-yellow-500 text-white rounded-md">Rp.
                    {{ number_format($product->price), '.', '.' }}</span>
            </div>
            <p class="italic mb-5">Stock: 100</p>
            <p class="w-3/4">{{ $product->description }}</p>
            <form action="/products/{{ $product->id }}" method="post" class="flex items-center gap-x-10 my-10">
                @csrf
                <div class="w-fit bg-white p-1">
                    <input type="hidden" value="{{ $product->id }}" name="product_id" id="product_id">
                    <span id="decrement" onclick="decrement()" class="cursor-pointer">-</span>
                    <input type="number" value="1" class="w-5" id="total_product" name="total_product">
                    <span id="increment" onclick="increment()" class="cursor-pointer">+</span>
                </div>
                <button class="inline-block font-semibold text-white py-2 px-4 bg-red-500">Buy</button>
            </form>
        </div>

    </div>

    <script>
        function decrement() {
            if (document.getElementById('total_product').value == 1) return
            document.getElementById('total_product').value--
        }

        function increment() {
            if (document.getElementById('total_product').value == 100) return
            document.getElementById('total_product').value++
        }
    </script>
</body>

</html>
