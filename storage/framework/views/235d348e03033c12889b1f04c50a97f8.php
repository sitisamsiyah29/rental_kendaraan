

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('pengguna.update', $pengguna->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo e(old('nama', $pengguna->nama)); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control"><?php echo e(old('alamat', $pengguna->alamat)); ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control"
                    value="<?php echo e(old('no_telepon', $pengguna->no_telepon)); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $pengguna->email)); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="0" <?php echo e(old('role', $pengguna->role == 0 ? 'selected' : '')); ?>>User</option>
                    <option value="1" <?php echo e(old('role', $pengguna->role == 1 ? 'selected' : '')); ?>>Admin</option>
                </select>
            </div>
            <a href="<?php echo e(route('pengguna.index')); ?>" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Simpan</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rendal-kendaraan\resources\views/admin/pengguna/edit.blade.php ENDPATH**/ ?>