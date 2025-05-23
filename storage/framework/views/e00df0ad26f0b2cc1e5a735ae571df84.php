<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #ffffff;
            color: #000;
            max-width: 300px;
            margin: auto;
            padding: 10px;
            border: 1px dashed #000;
        }

        h1, h2, p {
            text-align: center;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: none;
            padding: 4px 0;
        }

        th {
            text-align: left;
            border-bottom: 1px dashed #000;
        }

        .right {
            text-align: right;
        }

        .total, .keuntungan {
            font-weight: bold;
            margin-top: 10px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }

        .keuntungan {
            color: #000;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <h2>TOKO ALFADURO</h2>
    <p><strong>Tanggal:</strong><br><?php echo e($transaksi->tanggal->format('d-m-Y H:i')); ?></p>

    <table>
        <thead>
            <tr>
                <th>Barang</th>
                <th class="right">Subtot.</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksi->detailTransaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $harga_total = $detail->harga_satuan * $detail->jumlah;
                    $diskon_rp = ($detail->diskon / 100) * $harga_total;
                    $subtotal = $harga_total - $diskon_rp;
                ?>
                <tr>
                    <td>
                        <?php echo e($detail->barang->nama); ?><br>
                        <?php echo e($detail->jumlah); ?> x Rp<?php echo e(number_format($detail->harga_satuan)); ?> 
                        <?php if($detail->diskon > 0): ?>
                            (-<?php echo e($detail->diskon); ?>%)
                        <?php endif; ?>
                    </td>
                    <td class="right">Rp<?php echo e(number_format($subtotal)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <p class="keuntungan">Total Diskon: Rp<?php echo e(number_format($transaksi->total_diskon)); ?></p>
    <p class="total">Total Bayar: Rp<?php echo e(number_format($transaksi->total)); ?></p>

    <div class="footer">
        <p>*** Terima Kasih ***</p>
        <p>Barang yang sudah dibeli<br>tidak dapat dikembalikan</p>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/transaksi/pdf.blade.php ENDPATH**/ ?>