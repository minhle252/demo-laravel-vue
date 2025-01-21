<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Vue 3</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div id="app">
        <todo-app></todo-app> 
        <!-- Vue component sẽ được render ở đây -->
    </div>
</body>
</html>
