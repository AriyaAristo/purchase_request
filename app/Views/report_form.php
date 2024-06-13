<!DOCTYPE html>
<html>

<head>
    <title>Generate Purchase Request Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Finance Dashboard</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('finance/report') ?>">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Generate Purchase Request Report</h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('finance') ?>" class="btn btn-secondary mb-3">Back</a>
                <form action="<?= base_url('finance/report/generate') ?>" method="post">
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>