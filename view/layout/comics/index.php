<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comics/create" class="btn btn-primary mt-3">Insert Data Comics</a>
            <h1 class="mt-2">List Comics</h1>
            <?php if (session()->getFlashdata('message')) : ?>

                <div class="alert alert-success">
                    <?= session()->getFlashdata('message'); ?>
                </div>

            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($comics as $c) : ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><img src="/img/<?php echo $c['cover']; ?>" alt="" class="cover"></td>
                            <td><?php echo $c['title']; ?></td>
                            <td>
                                <a href="/comics/<?php echo $c['slug']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>