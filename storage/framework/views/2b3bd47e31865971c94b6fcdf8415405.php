

<?php $__env->startSection('content'); ?>
<style>
    body {
        background-color: #f2f2f2; /* Warna abu-abu muda sebagai latar */
    }


    .table {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .table thead {
        background-color: #e6e6e6; /* Abu-abu muda untuk header */
    }

    .table th,
    .table td {
        padding: 16px;
        vertical-align: middle;
        color: #333;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Baris selang-seling abu-abu sangat muda */
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 8px;
        background-color: #fdfdfd;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #999;
        outline: none;
        box-shadow: 0 0 5px rgba(150, 150, 150, 0.2);
    }

    .btn-success {
        background-color: #7f8c8d;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
        color: white;
        border-radius: 10px;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .btn-success:hover {
        background-color: #95a5a6;
        transform: scale(1.03);
    }

    .mt-3 {
        margin-top: 1rem;
    }
</style>

<div class="container">
    <form action="<?php echo e(route('diskon.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Diskon (%)</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($barang->nama); ?></td>
                    <td>Rp<?php echo e(number_format($barang->harga, 0, ',', '.')); ?></td>
                    <td>
                        <input type="number" name="diskon[<?php echo e($barang->id); ?>]" class="form-control"
                            value="<?php echo e($barang->diskon); ?>" min="0" max="100" step="0.01">
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success mt-3">Simpan Diskon</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/diskon/index.blade.php ENDPATH**/ ?>