<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestion des rendez-vous</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
    </script>

    <script nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js">
    </script>

</head>


<body class="bg-[#f7f5f2] text-gray-900">

    <div class="min-h-screen">

        @yield('content')

    </div>

</body>

</html>