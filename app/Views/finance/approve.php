<!DOCTYPE html>
<html>

<head>
    <title>Approve Purchase Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #28a745;
            color: white;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Approve Purchase Request</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/finance/storeApproval/' . $request['id']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="proof_of_payment">Proof of Payment</label>
                                <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Approve</button>
                                <a href="<?= base_url('/finance') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>