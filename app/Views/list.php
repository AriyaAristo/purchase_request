<!DOCTYPE html>
<html>

<head>
    <title>Purchase Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-5">
                    <div class="card-header">Purchase Requests</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Manager Comment</th>
                                    <th>Finance Comment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($requests as $request) : ?>
                                    <tr>
                                        <td><?= $request['id'] ?></td>
                                        <td><?= $request['item_name'] ?></td>
                                        <td><?= $request['quantity'] ?></td>
                                        <td><?= $request['status'] ?></td>
                                        <td><?= $request['manager_comment'] ?></td>
                                        <td><?= $request['finance_comment'] ?></td>
                                        <td>
                                            <a href="/purchase-requests/edit/<?= $request['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/purchase-requests/delete/<?= $request['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="/purchase-requests/create" class="btn btn-primary">Create New Request</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>