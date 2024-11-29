<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoefree - Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="h-screen w-full flex justify-center items-center bg-register bg-cover bg-center bg-no-repeat">
        <div class=" bg-slate-100 p-10 rounded-xl">
            <h1 class="text-3xl text-center text-semibold mb-10">Register</h1>
            <form action="/register" method="post">
                @csrf
                <table class="mb-5">
                    <tr>
                        <td class="p-2"><label for="name">Name</label></td>
                        <td><input required type="text" placeholder="Input your name..." id="name" name="name" class="p-1" value="{{ old('name') }}"></td>
                    </tr>
                    <tr>
                        <td class="p-2"><label for="email">Email</label></td>
                        <td><input required type="text" placeholder="Input your email..." id="email" name="email" class="p-1" value="{{ old('email') }}"></td>
                    </tr>
                    <tr>
                        <td class="p-2"><label for="password">Password</label></td>
                        <td><input required type="text" placeholder="Input your password..." id="passowrd" name="password" class="p-1" value="{{ old('password') }}"></td>
                    </tr>
                    <tr>
                        <td class="p-2"><label for="password_confirmation">Confirm Password</label></td>
                        <td><input required type="text" placeholder="Confirm your password..." id="password_confirmation" name="password_confirmation" class="p-1" value="{{ old('password_confirmation') }}"></td>
                    </tr>
                </table>
                <button type="submit" class="py-2 px-3 bg-blue-500 text-white">Register Now</button>
                @if($errors->any())
                    <p class="text-red-500 font-medium">{{ $errors->first() }}</p>
                @endif
                <p>Already have an account? <a href="/login" class="text-blue-500 underline decoration-inherit">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
