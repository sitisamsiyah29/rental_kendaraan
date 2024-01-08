

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('cabang.update', $cabang->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label class="form-label">Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control"
                    value="<?php echo e(old('nama_cabang', $cabang->nama_cabang)); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Cabang</label>
                <textarea name="alamat_cabang"
                    class="form-control"><?php echo e(old('alamat_cabang', $cabang->alamat_cabang)); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon Cabang</label>
                <input type="text" name="no_telepon_cabang" class="form-control"
                    value="<?php echo e(old('no_telepon_cabang', $cabang->no_telepon_cabang)); ?>">
            </div>
            <a href="<?php echo e(route('cabang.index')); ?>" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Simpan</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rendal-kendaraan\resources\views/admin/cabang/edit.blade.php ENDPATH**/ ?>