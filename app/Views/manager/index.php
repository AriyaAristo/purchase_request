<!DOCTYPE html>
<html>

<head>
    <title>Manager Dashboard</title>
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Manager</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="/logout">Logout</a>
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
        <h2>Pending Purchase Requests</h2>
        <a href="<?= base_url('/manager/approved-requests') ?>" class="btn btn-primary mb-3">View Approved Requests</a>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $num = 1; ?>
                <?php foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= $num++ ?></td>
                        <td><?= $request['item_name'] ?></td>
                        <td><?= $request['quantity'] ?></td>
                        <td><?= ucfirst($request['status']) ?></td>
                        <td>
                            <a href="<?= base_url('/manager/approve/' . $request['id']) ?>" class="btn btn-success">Approve</a>
                            <a href="<?= base_url('/manager/reject/' . $request['id']) ?>" class="btn btn-danger">Reject</a>
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