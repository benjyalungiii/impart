<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="h-full">
    <div class="h-full grid place-items-center">
        <form action="/api/login" method="post">
            @csrf
            <div class="shadow-lg border rounded-md flex gap-3 flex-col min-w-[400px] px-5 py-8">
                <input type="email" name="email"
                    class="block border p-3 rounded focus:ouline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                    placeholder="email">
                <input type="password" name="password"
                    class="block border p-3 rounded focus:ouline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500"
                    placeholder="password">

                <button type="submit" class="bg-sky-700 p-3 rounded hover:shadow-md text-white">LOGIN</button>
            </div>
        </form>
    </div>
</body>

</html>
