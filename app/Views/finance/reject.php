<!DOCTYPE html>
<html>

<head>
    <title>Reject Purchase Request</title>
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
            background-color: #dc3545;
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
                        <h2>Reject Purchase Request</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/finance/storeRejection/' . $request['id']) ?>" method="post">
                            <div class="form-group">
                                <label for="reason">Rejection Reason</label>
                                <textarea class="form-control" id="reason" name="reason" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger">Reject</button>
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