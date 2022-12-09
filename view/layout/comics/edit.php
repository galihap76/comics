<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Comics</h2>


            <form action="/comics/update/<?= $comics['id']; ?>" method="post">

                <?= csrf_field(); ?>

                <input type="hidden" name="slug" value="<?php echo $comics['slug']; ?>">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autocomplete="off" value="<?= (old('title')) ? old('title') : $comics['title']  ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="writer" class="col-sm-2 col-form-label">Writer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="writer" name="writer" autocomplete="off" value="<?= (old('writer')) ? old('writer') : $comics['writer']  ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="publisher" name="publisher" autocomplete="off" value="<?= (old('publisher')) ? old('publisher') : $comics['publisher']  ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cover" name="cover" autocomplete="off" value="<?= (old('cover')) ? old('cover') : $comics['cover']  ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>