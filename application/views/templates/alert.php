<?php $alert = $this->session->flashdata('alert'); ?>

<?php if ($alert) : ?>
    <div class="alert alert-<?= $alert['color'] ?> alert-dismissible fade show" role="alert">
        <?= $alert['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif ?>