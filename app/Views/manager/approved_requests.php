<!DOCTYPE html>
<html>

<head>
    <title>Approved Purchase Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .status-approved {
            color: green;
        }

        .status-rejected {
            color: red;
        }

        .status-pending {
            color: orange;
        }

        .table-wrapper {
            margin-top: 20px;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Approved Purchase Requests</h2>
            <a href="<?= base_url('/manager') ?>" class="btn btn-secondary mt-3">Back to Manager Dashboard</a>
        </div>
        <div class="table-wrapper">
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Approved By</th>
                        <th>Proof of Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request) : ?>
                        <tr>
                            <td><?= $request['id'] ?></td>
                            <td><?= $request['item_name'] ?></td>
                            <td><?= $request['quantity'] ?></td>
                            <td class="status-<?= strtolower($request['status']) ?>">
                                <?= ucfirst($request['status']) ?>
                            </td>
                            <td><?= ucfirst($request['approved_by']) ?></td>
                            <td>
                                <?php if ($request['proof_of_payment']) : ?>
                                    <a href="<?= base_url('view_request/' . $request['id']) ?>" class="btn btn-info">View Proof</a>
                                <?php else : ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>