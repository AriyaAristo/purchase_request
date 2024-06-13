<!DOCTYPE html>
<html>

<head>
    <title>Purchase Request Details</title>
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

        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Purchase Request Details</h2>
        <a href="<?= base_url('manager/approved-requests') ?>" class="btn btn-secondary mb-3">Back to Approved Requests</a>
        <?php if (isset($request)) : ?>
            <div class="card">
                <div class="card-header">
                    Request #<?= $request['id'] ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $request['item_name'] ?></h5>
                    <p class="card-text"><strong>Quantity:</strong> <?= $request['quantity'] ?></p>
                    <p class="card-text"><strong>Unit Price:</strong> $<?= number_format($request['unit_price'], 2) ?></p>
                    <p class="card-text"><strong>Total Price:</strong> $<?= number_format($request['total_price'], 2) ?></p>
                    <p class="card-text"><strong>Status:</strong> <span class="status-<?= strtolower($request['status']) ?>"><?= ucfirst($request['status']) ?></span></p>
                    <p class="card-text"><strong>Approved By:</strong> <?= ucfirst($request['approved_by']) ?></p>
                    <?php if ($request['proof_of_payment']) : ?>
                        <?php $file_url = base_url('uploads/' . $request['proof_of_payment']); ?>
                        <p class="card-text"><strong>Proof of Payment:</strong></p>
                        <img src="<?= $file_url ?>" class="img-fluid" alt="Proof of Payment">
                        <br><br>
                        <a href="<?= base_url('purchase-request/download/' . $request['proof_of_payment']) ?>" class="btn btn-info" download>Download Proof</a>
                        <!-- Debug statement -->
                        <p>Debug: <?= $file_url ?></p>
                    <?php else : ?>
                        <p class="card-text"><strong>Proof of Payment:</strong> N/A</p>
                    <?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <p class="text-danger">Request not found.</p>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('back-button').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>

</html>