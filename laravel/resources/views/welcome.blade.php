<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Laravel Docker</h1>
    <p>Ini adalah aplikasi Laravel dengan Docker dan beberapa Image didalamnya</p>
    <ul>
        <li>PHP APACHE : 8.1.0</li>
        <li>MYSQL : 8.1</li>
        <li>PHP MY ADMIN : Latest</li>
    </ul>


    <hr>
    <p>Note, Jika error run command berikut : </p>
    <p><span style="font-style: italic">sudo chmod -R 777 ./laravel/storage</span></p>
    <p><span style="font-style: italic">composer exec -it laravel-docker artisan cache:clear</span></p>
    <p><span style="font-style: italic">composer exec -it laravel-docker artisan config:clear</span></p>
    <p><span style="font-style: italic">composer exec -it laravel-docker artisan config:cache</span></p>
</body>

</html>
