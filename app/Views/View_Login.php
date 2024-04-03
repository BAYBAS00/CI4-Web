<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-aVs5+zv9D3u4T/4p+Oxlq66KWkd/oUjPwhIz9F0P/f5H8UPInWwMMJLVPm4QF5ew" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">

    <style>
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating {
            margin-bottom: 15px;
        }

        .form-signin .form-floating input {
            height: calc(3.5rem + 2px);
            border-radius: 10px;
        }

        .form-signin .form-floating label {
            font-size: 0.9rem;
        }

        .form-signin .btn-primary {
            background-color: #008B8B;
            border-color: #008B8B;
            border-radius: 10px;
        }

        .form-signin .btn-primary:hover {
            background-color: #6495ED;
            border-color: #6495ED;
        }

        .form-signin .btn-primary:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.5);
        }

        .form-signin .btn-primary:active {
            background-color: #A9A9A9;
            border-color: #A9A9A9;
        }

        .form-signin p {
            margin-top: 1rem;
        }

        body {
            background: #87CEEB;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('error') as $data) : ?>
                        <li>
                            <?= $data ?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url(); ?>/login/process">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating">
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                <label for="password">Password</label>
            </div>
            <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
            <p class="mt-3">Belum punya akun? <a href="<?= base_url(); ?>register">Register</a></p>
        </form>
    </main>

</body>

</html>