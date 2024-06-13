<!DOCTYPE html>
<html>

<head>
    <title>Officer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
        }

        .dashboard-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .status-approved {
            color: #28a745;
        }

        .status-pending {
            color: #ffc107;
        }

        .status-rejected {
            color: #dc3545;
        }

        .card-stats {
            margin-bottom: 20px;
        }

        .card-stats .card-body {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-stats .icon {
            font-size: 2em;
        }

        .card-stats .text {
            font-size: 1.2em;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Officer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/officer/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/officer/requests">Data Request Barang</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>