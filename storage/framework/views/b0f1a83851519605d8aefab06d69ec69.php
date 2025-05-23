<style>
    body {
        background-color: #f2f2f2; /* latar belakang abu-abu muda */
    }

    form {
        background-color: #fafafa; /* warna dasar form */
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); /* efek timbul */
        max-width: 600px;
        margin: 40px auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    input[type="text"],
    input[type="number"] {
        padding: 10px 14px;
        border-radius: 10px;
        border: 1px solid #ccc;
        background-color: #fdfdfd;
        font-size: 1rem;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    input[type="text"]:focus,
    input[type="number"]:focus {
        border-color: #999;
        outline: none;
        box-shadow: 0 0 5px rgba(150, 150, 150, 0.2);
    }

    label {
        font-weight: 500;
        color: #333;
        margin-bottom: 4px;
    }

    .form-input {
        width: 100%;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    button[type="submit"] {
        background-color: #7f8c8d;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    button[type="submit"]:hover {
        background-color: #95a5a6;
        transform: scale(1.03);
    }
</style>

<form method="POST" action="<?php echo e(isset($barang) ? route('barang.update', $barang->id) : route('barang.store')); ?>">
    <?php echo csrf_field(); ?>
    <?php if(isset($barang)): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <input type="text" name="nama" value="<?php echo e(old('nama', $barang->nama ?? '')); ?>" placeholder="Nama Barang">
    <input type="number" name="harga" value="<?php echo e(old('harga', $barang->harga ?? '')); ?>" placeholder="Harga">
    <input type="number" name="stok" value="<?php echo e(old('stok', $barang->stok ?? '')); ?>" placeholder="Stok">

    <div class="mb-4">
        <label for="diskon">Diskon (%)</label>
        <input type="number" name="diskon" id="diskon" class="form-input" value="<?php echo e(old('diskon', $barang->diskon ?? 0)); ?>" min="0" max="100">
    </div>

    <button type="submit"><?php echo e(isset($barang) ? 'Update' : 'Tambah'); ?></button>
</form>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/barang/edit.blade.php ENDPATH**/ ?>