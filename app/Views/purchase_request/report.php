<!DOCTYPE html>
<html>

<head>
    <title>Purchase Request Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Purchase Request Report</h2>
        <form method="get" action="<?= base_url('purchase-request/report') ?>" class="form-inline mb-3">
            <div class="form-group mr-2">
                <label for="start_date" class="mr-2">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group mr-2">
                <label for="end_date" class="mr-2">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <?php if (isset($requests) && !empty($requests)) : ?>
            <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Approved By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request) : ?>
                        <tr>
                            <td><?= $request['id'] ?></td>
                            <td><?= $request['item_name'] ?></td>
                            <td><?= $request['quantity'] ?></td>
                            <td>$<?= number_format($request['unit_price'], 2) ?></td>
                            <td>$<?= number_format($request['total_price'], 2) ?></td>
                            <td class="status-<?= strtolower($request['status']) ?>"><?= ucfirst($request['status']) ?></td>
                            <td><?= ucfirst($request['approved_by']) ?></td>
                            <td><?= date('Y-m-d', strtotime($request['created_at'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links() ?>
        <?php else : ?>
            <p class="text-danger">No requests found for the selected date range.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>