<?= $this->extend('layouts/officer_layout') ?>

<?= $this->section('content') ?>
<div class="dashboard-container">
    <h2>Dashboard</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-success">Approved Requests</h5>
                            <p class="card-text mb-2">Approved by Finance: <?= $approvedByFinance ?></p>
                            <p class="card-text mb-0">Approved by Manager: <?= $approvedByManager ?></p>
                        </div>
                        <i class="fas fa-check-circle fa-3x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-warning">Rejected Requests</h5>
                            <p class="card-text mb-1"><strong>Rejected by Finance:</strong> <?= $rejectedByFinance ?></p>
                            <p class="card-text mb-0"><strong>Rejected by Manager:</strong> <?= $rejectedByManager ?></p>
                        </div>
                        <i class="fas fa-times-circle fa-3x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>