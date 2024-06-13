<!DOCTYPE html>
<html>

<head>
    <title>Report PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Report from <?= $start_date ?> to <?= $end_date ?></h2>
        <table>
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
                <?php foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= $request['id'] ?></td>
                        <td><?= $request['item_name'] ?></td>
                        <td><?= $request['quantity'] ?></td>
                        <td><?= $request['unit_price'] ?></td>
                        <td><?= $request['total_price'] ?></td>
                        <td><?= ucfirst($request['status']) ?></td>
                        <td><?= $request['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>