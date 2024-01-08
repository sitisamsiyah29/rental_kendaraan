

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('cabang.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label class="form-label">Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Cabang</label>
                <textarea name="alamat_cabang" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon Cabang</label>
                <input type="text" name="no_telepon_cabang" class="form-control">
            </div>
            <a href="<?php echo e(route('cabang.index')); ?>" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Tambah</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rendal-kendaraan\resources\views/admin/cabang/add.blade.php ENDPATH**/ ?>