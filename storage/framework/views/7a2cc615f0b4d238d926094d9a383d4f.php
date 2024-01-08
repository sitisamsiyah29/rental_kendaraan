;

<?php $__env->startSection('content'); ?>
<div class="container mx-auto" style="padding-top: 110px;">
    <h2 class="text-center">Kendaraan Yang Saya Sewa</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <th>No</th>
                <th>Nama Cabang</th>
                <th>Alamat Cabang</th>
                <th>No Telepon Cabang</th>
                <th>Merek Kendaraan</th>
                <th>Model Kendaraan</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                ?>
                <?php $__currentLoopData = $penyewaan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no++); ?></td>
                    <td><?php echo e($data->kendaraan->cabang->nama_cabang); ?></td>
                    <td><?php echo e($data->kendaraan->cabang->alamat_cabang); ?></td>
                    <td><?php echo e($data->kendaraan->cabang->no_telepon_cabang); ?></td>
                    <td><?php echo e($data->kendaraan->merek); ?></td>
                    <td><?php echo e($data->kendaraan->model); ?></td>
                    <td>
                        <?php if($data->status == 0): ?>
                        <span class="badge text-bg-warning">Menunggu Persetujuan Admin</span>
                        <?php elseif($data->status == 1): ?>
                        <span class="badge text-bg-primary">Sedang Anda Sewa</span>
                        <?php elseif($data->status == 2): ?>
                        <span class="badge text-bg-danger">Permintaan Anda Ditolak</span>
                        <?php else: ?>
                        <span class="badge text-bg-success">Sudah Selesai</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rendal-kendaraan\resources\views/page/sewaan-saya.blade.php ENDPATH**/ ?>