<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoefree - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-login h-screen w-full flex justify-center items-center bg-cover bg-center bg-no-repeat">
        <div class="bg-slate-100 p-10 rounded-xl">
            <h1 class="text-3xl text-center text-semibold mb-10">Login</h1>
            <form action="" method="post">
                @csrf
                <table class="mb-5">
                    <tr>
                        <td class="p-2"><label for="email">Email</label></td>
                        <td><input required type="text" placeholder="input your email..." id="email" name="email" class="p-1" value="{{ old('email') }}"></td>
                    </tr>
                    <tr>
                        <td class="p-2"><label for="password">Password</label></td>
                        <td><input required type="password" placeholder="input your password..." id="passowrd" name="password" class="p-1" value="{{ old('password') }}"></td>
                    </tr>
                </table>
                <button type="submit" class="py-2 px-3 bg-blue-500 text-white">Login Now</button>
                @if($errors->any())
                <p class="text-red-500 font-medium">{{ $errors->first() }}</p>
                @endif
                <p>Don't have an account? <a href="/register" class="text-blue-500 underline decoration-inherit">Register</a></p>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
