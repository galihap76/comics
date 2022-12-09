<?php echo $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Comics</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?php echo $comics['cover']; ?>" class="img-fluid rounded-start" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comics['title']; ?></h5>
                            <p class="card-text"><b>Writer : </b><?= $comics['writer']; ?></p>
                            <p class="card-text"><small class="text-muted"><b>Publisher : </b><?= $comics['publisher']; ?></small></p>

                            <a href="/comics/edit/<?php echo $comics['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/comics/<?php echo $comics['id']; ?>" method="post" class="d-inline">

                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this?');">Delete</button>

                            </form>

                            <br><br>
                            <a href="/comics">Back to list comics</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>