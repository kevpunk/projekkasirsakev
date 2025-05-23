

<?php $__env->startSection('content'); ?>
<style>
    body {
        background-color: #f2f2f2; /* abu-abu muda untuk latar */
    }

    .card {
        background: #f9f9f9; /* abu-abu sangat muda */
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* efek timbul */
        padding: 24px;
        margin: 20px auto;
        max-width: 1000px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.15);
    }

    h3 {
        font-weight: 600;
        color: #444;
    }

    .btn-earth {
        background: linear-gradient(to right, #7f8c8d, #95a5a6); /* gradasi abu-abu */
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: background 0.3s ease, transform 0.2s;
    }

    .btn-earth:hover {
        background: linear-gradient(to right, #95a5a6, #bdc3c7);
        transform: scale(1.05);
    }

    .btn-outline-earth {
        color: #7f8c8d;
        border: 2px solid #7f8c8d;
        padding: 6px 12px;
        border-radius: 10px;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-earth:hover {
        background: #7f8c8d;
        color: white;
    }

    .btn-danger {
        background: #e74c3c;
        border: none;
        color: white;
        padding: 6px 12px;
        border-radius: 10px;
        transition: background 0.3s ease;
    }

    .btn-danger:hover {
        background: #c0392b;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* efek timbul ringan */
    }

    .table th,
    .table td {
        padding: 16px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        background: #ffffff;
    }

    .table th {
        background: #ececec;
        font-weight: 600;
        color: #333;
    }

    .table-hover tbody tr:hover {
        background-color: #f4f4f4;
        cursor: pointer;
    }

    .btn-sm {
        font-size: 0.875rem;
        padding: 4px 10px;
    }

    .btn-rounded {
        border-radius: 10px;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }
</style>

<div class="card">
    <div class="d-flex mb-3">
        <h3>Daftar Barang</h3>
        <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-earth btn-rounded">+ Tambah Barang</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($b->nama); ?></td>
                <td>Rp <?php echo e(number_format($b->harga)); ?></td>
                <td><?php echo e($b->stok); ?></td>
                <td>
                    <a href="<?php echo e(route('barang.edit', $b->id)); ?>" class="btn btn-outline-earth btn-sm btn-rounded">Edit</a>
                    <form action="<?php echo e(route('barang.destroy', $b->id)); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" onclick="return confirm('Yakin hapus barang ini?')" class="btn btn-danger btn-sm btn-rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/barang/index.blade.php ENDPATH**/ ?>