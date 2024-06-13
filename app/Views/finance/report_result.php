<!DOCTYPE html>
<html>

<head>
    <title>Purchase Request Report</title>
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

        .table thead {
            background-color: #007bff;
            color: white;
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Purchase Request Report</h3>
            </div>
            <div class="card-body">
                <form action="<?= site_url('finance/downloadPDF') ?>" method="post">
                    <input type="hidden" name="start_date" value="<?= $start_date ?>">
                    <input type="hidden" name="end_date" value="<?= $end_date ?>">
                    <button type="submit" class="btn btn-danger mb-3">Download PDF</button>
                </form>
                <a href="<?= base_url('finance/report') ?>" class="btn btn-secondary mb-3">Back</a>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($requests)) : ?>
                            <?php foreach ($requests as $request) : ?>
                                <tr>
                                    <td><?= $request['id'] ?></td>
                                    <td><?= $request['item_name'] ?></td>
                                    <td><?= $request['quantity'] ?></td>
                                    <td><?= $request['unit_price'] ?></td>
                                    <td><?= $request['total_price'] ?></td>
                                    <td><?= $request['status'] ?></td>
                                    <td><?= $request['created_at'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7" class="text-center">No requests found for the selected date range.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>