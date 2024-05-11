<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>CI4 WEB</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-aVs5+zv9D3u4T/4p+Oxlq66KWkd/oUjPwhIz9F0P/f5H8UPInWwMMJLVPm4QF5ew" crossorigin="anonymous">

</head>

<style>
    body {
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
    }
</style>

<body>
    <?php include 'Navbar.php' ?>
    
    <main class="container">

        <div class="starter-template text-center py-5 px-3">
            <h1>Hai ! <?= session()->get('name'); ?></h1>
            <p class="lead">Selamat Datang di Belajar yang bener, Kita sudah belajar membuat Authentikasi dengan Codeigniter 4</p>
        </div>

    </main><!-- /.container -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>