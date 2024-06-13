<!DOCTYPE html>
<html>

<head>
    <title>Edit Purchase Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            margin-bottom: 0;
        }

        .btn-back {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Purchase Request</h2>
        <form action="<?= base_url('officer/update/' . $request['id']) ?>" method="post">
            <div class="form-group">
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $request['item_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $request['quantity'] ?>" required>
            </div>
            <div class="form-group">
                <label for="unit_price">Unit Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="number" class="form-control" id="unit_price" name="unit_price" value="<?= $request['unit_price'] ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/officer" class="btn btn-secondary btn-back">Back</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>