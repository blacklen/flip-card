@use('Illuminate\Support\Facades\Vite')

<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Flip Card</title>
    <script>
        window.quests = @json($quests);
    </script>
</head>
<body>
<div id="app"></div>
@vite('resources/js/app.js')
</body>
</html>

