<!DOCTYPE html>
<html>

<head>
    <title>Finance Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: #f7f7f7;
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
            color: green;
        }

        .status-rejected {
            color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Finance</a>
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
    <div class="container dashboard-container">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <h2>Approved Purchase Requests</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Unit Price(USD)</th>
                    <th>Total Price(USD)</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $request['item_name'] ?></td>
                        <td><?= $request['quantity'] ?></td>
                        <td><?= number_format($request['unit_price'], 2) ?></td>
                        <td><?= number_format($request['unit_price'] * $request['quantity'], 2) ?></td>
                        <td class="status-<?= strtolower($request['status']) ?>">
                            <?= ucfirst($request['status']) ?>
                            <?php if ($request['status'] != 'pending') : ?>
                                by <?= ucfirst($request['approved_by']) ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($request['status'] == 'pending') : ?>
                                <?php if ($request['approved_by'] == 'manager') : ?>
                                    <a href="<?= base_url('/finance/approve/' . $request['id']) ?>" class="btn btn-success">Approve</a>
                                    <a href="<?= base_url('/finance/reject/' . $request['id']) ?>" class="btn btn-danger">Reject</a>
                                <?php else : ?>
                                    <span class="text-muted">Waiting for Manager Approval</span>
                                <?php endif; ?>
                            <?php elseif ($request['status'] == 'approved' && $request['approved_by'] == 'manager') : ?>
                                <a href="<?= base_url('/finance/approve/' . $request['id']) ?>" class="btn btn-success">Approve</a>
                                <a href="<?= base_url('/finance/reject/' . $request['id']) ?>" class="btn btn-danger">Reject</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
