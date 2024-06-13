<?= $this->extend('layouts/officer_layout') ?>

<?= $this->section('content') ?>
<div class="dashboard-container">
    <?php
    // Ambil session
    $session = session();

    // Tampilkan pesan notifikasi jika ada
    if ($session->getFlashdata('success')) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $session->getFlashdata('success') . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }
    ?>
    <h2>Purchase Requests</h2>
    <a href="/officer/create" class="btn btn-primary mb-3">Create New Request</a>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>By Manager/Finance</th>
                <th>Rejection Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($requests) : ?>
                <?php $i = 1;
                foreach ($requests as $request) : ?> <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $request['item_name'] ?></td>
                        <td><?= $request['quantity'] ?></td>
                        <td><?= $request['unit_price'] ?></td>
                        <td><?= $request['total_price'] ?></td>
                        <td>
                            <?php if ($request['status'] == 'approved') : ?>
                                <span class="status-approved">Approved</span>
                            <?php elseif ($request['status'] == 'pending') : ?>
                                <span class="status-pending">Pending</span>
                            <?php elseif ($request['status'] == 'rejected') : ?>
                                <span class="status-rejected">Rejected</span>
                            <?php endif; ?>
                        </td>
                        <td><?= ucfirst($request['approved_by']) ?></td>
                        <td><?= $request['rejection_reason'] ?></td>
                        <td>
                            <?php if ($request['status'] == 'pending') : ?>
                                <a href="/officer/edit/<?= $request['id'] ?>" class="btn btn-warning mr-2">Edit</a>
                            <?php endif; ?>
                            <a href="/officer/delete/<?= $request['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="9" class="text-center">No Requests Found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>