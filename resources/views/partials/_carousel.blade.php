<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/js/carousel.js'])
</head>
<body>
    <div id="carousel" data-storage-url="{{ Storage::url('') }}"></div>
</body>
</html>