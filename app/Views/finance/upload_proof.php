<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Proof</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Upload Proof</h1>
        <form method="post" action="/finance/storeProof/<?= $id; ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="proof">Proof of Transfer</label>
                <input type="file" class="form-control" name="proof" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>