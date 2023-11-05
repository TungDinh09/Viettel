<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React App</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    <div id="root"></div>
</body>

</html>
