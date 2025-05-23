

<?php $__env->startSection('content'); ?>
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Riwayat Transaksi</h3>
        <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-earth btn-rounded">+ Transaksi Baru</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Jumlah Item</th>
                <th>Total</th>
                <th>Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($i + 1); ?></td>
                <td><?php echo e($t->tanggal->format('d-m-Y H:i')); ?></td>
                <td><?php echo e($t->detail_transaksi_count); ?> item</td>
                <td>Rp <?php echo e(number_format($t->total)); ?></td>
                <td>Rp <?php echo e(number_format($t->total_diskon)); ?></td>
                <td>
                    <a href="<?php echo e(route('transaksi.show', $t->id)); ?>" class="btn btn-outline-earth btn-sm">Detail</a>
                    <a href="<?php echo e(route('transaksi.cetak', $t->id)); ?>" class="btn btn-earth btn-sm" target="_blank">Cetak</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada transaksi.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/transaksi/index.blade.php ENDPATH**/ ?>