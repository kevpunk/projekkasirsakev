<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Aplikasi Kasir - Toko ALFADURO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <style>
        body {
        background-color: #f4f1ee;
        color: #3e3e3e;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
        background-color:  #7f8c8d; /* Brownish earth tone */
        }
        .navbar-brand,
        .nav-link,
        h1, h2, h3 {
        color: #ffffff !important;
        }
        .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .btn-earth {
        background-color: #a1887f;
        border-color: #a1887f;
        color: #fff;
        transition: 0.3s;
        }

        .btn-earth:hover {
        background-color: #8d6e63;
        border-color: #8d6e63;
        color: #fff;
        }

        .btn-outline-earth {
        background-color: transparent;
        border: 2px solid #a1887f;
        color: #a1887f;
        transition: 0.3s;
        }

        .btn-outline-earth:hover {
        background-color: #a1887f;
        color: #fff;
        }

        .btn-danger {
        background-color: #d32f2f;
        border-color: #d32f2f;
        color: white;
        }

        .btn-danger:hover {
        background-color: #b71c1c;
        border-color: #b71c1c;
        }

        .btn-sm {
        padding: 5px 10px;
        font-size: 0.9rem;
        border-radius: 8px;
        }

        .btn-rounded {
        border-radius: 30px;
        }
        .table th {
        background-color: #d7ccc8;
        }
        </style>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">TOKO MADAS</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="<?php echo e(route('barang.index')); ?>" class="nav-link">Barang</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('diskon.index')); ?>" class="nav-link">Diskon</a></li>
                    <li class="nav-item"><a href="<?php echo e(route('transaksi.index')); ?>" class="nav-link">Transaksi</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container mt-4">
        
        <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\kasir\resources\views/layouts/app.blade.php ENDPATH**/ ?>