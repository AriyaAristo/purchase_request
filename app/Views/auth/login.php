<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f7f7f7;
        }

        .login-container {
            margin-top: 100px;
        }

        .login-form {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }

        .form-group input {
            height: 45px;
            font-size: 16px;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
            height: 45px;
            font-size: 16px;
        }

        .register-link {
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div class="login-form">
                    <h3 class="text-center">Login</h3>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="/register" class="btn btn-secondary register-link">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>