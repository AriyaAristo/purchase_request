<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the Dashboard, <?= session()->get('username'); ?>!</h1>
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>

</html>