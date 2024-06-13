<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Request History</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Manager Request History</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($requests as $request) : ?>
                    <tr>
                        <td><?= $request['item_name']; ?></td>
                        <td><?= $request['quantity']; ?></td>
                        <td><?= $request['status']; ?></td>
                        <td><?= $request['reason']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>