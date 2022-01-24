<!DOCTYPE html>
<html lang="pl_PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bartosz Pazdur - portfolio</title>
    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&family=Roboto+Condensed&display=swap" rel="stylesheet"> 

    <!-- custom styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app" class="app" v-cloak>
        <h1 class="text-primary-accent font-body"><% msg %></h1>
        <p class="text-gray font-display font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, reprehenderit!</p>
    </div>

    <!-- custom scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>