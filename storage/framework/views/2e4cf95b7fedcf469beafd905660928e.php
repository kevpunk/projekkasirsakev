

<?php $__env->startSection('content'); ?>
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Detail Transaksi</h3>
        <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-outline-earth btn-rounded">← Kembali</a>
    </div>

    <p><strong>Tanggal:</strong> <?php echo e($transaksi->tanggal->format('d-m-Y H:i')); ?></p>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Diskon (%)</th>
                <th>Diskon (Rp)</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksi->detailTransaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $harga_total = $item->harga_satuan * $item->jumlah;
                    $diskon_rp = ($item->diskon / 100) * $harga_total;
                    $subtotal = $harga_total - $diskon_rp;
                ?>
                <tr>
                    <td><?php echo e($item->barang->nama); ?></td>
                    <td>Rp <?php echo e(number_format($item->harga_satuan)); ?></td>
                    <td><?php echo e($item->jumlah); ?></td>
                    <td><?php echo e($item->diskon); ?>%</td>
                    <td>Rp <?php echo e(number_format($diskon_rp)); ?></td>
                    <td>Rp <?php echo e(number_format($subtotal)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-3">
        <p><strong>Total Diskon:</strong> Rp <?php echo e(number_format($transaksi->total_diskon)); ?></p>
        <p><strong>Total Bayar:</strong> Rp <?php echo e(number_format($transaksi->total)); ?></p>
    </div>

    <a href="<?php echo e(route('transaksi.cetak', $transaksi->id)); ?>" class="btn btn-earth btn-rounded mt-2" target="_blank">Cetak Nota (PDF)</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/transaksi/show.blade.php ENDPATH**/ ?>