<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Insert Data Comics</h2>


            <form action="/comics/save" method="post" enctype="multipart/form-data">

                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autocomplete="off" value="<?php echo old('title'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="writer" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="writer" name="writer" autocomplete="off" value="<?php echo old('writer'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="publisher" name="publisher" autocomplete="off" value="<?php echo old('publisher'); ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input class="form-control  <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" type="file" id="cover" name="cover">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Insert Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
