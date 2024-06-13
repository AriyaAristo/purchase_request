<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Purchase Request</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
        }

        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: none;
            text-align: center;
        }

        .form-control {
            border-radius: 30px;
        }

        .btn-primary {
            border-radius: 30px;
            width: 100%;
            background-color: #007bff;
            border: none;
            padding: 10px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-group i {
            position: absolute;
            right: 15px;
            top: 35px;
            color: #aaa;
        }

        .form-group {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1><i class="fas fa-shopping-cart"></i> Create Purchase Request</h1>
            </div>
            <div class="card-body">
                <form method="post" action="/officer/store">
                    <div class="form-group">
                        <label for="item_name">Item Name</label>
                        <input type="text" class="form-control" name="item_name" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="unit_price">Unit Price</label>
                        <input type="number" step="0.01" class="form-control" id="unit_price" name="unit_price" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>