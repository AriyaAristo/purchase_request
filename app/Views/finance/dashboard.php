<!DOCTYPE html>
<html>

<head>
    <title>Finance Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .dashboard-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Finance Dashboard</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('finance/dashboard') ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('finance/report') ?>">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="<?= base_url('logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container dashboard-container">
        <h2>Finance Dashboard</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Approved Requests</h3>
                    </div>
                    <div class="card-body">
                        <p>Total Approved: <?= $total_approved ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Rejected Requests</h3>
                    </div>
                    <div class="card-body">
                        <p>Total Rejected: <?= $total_rejected ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>