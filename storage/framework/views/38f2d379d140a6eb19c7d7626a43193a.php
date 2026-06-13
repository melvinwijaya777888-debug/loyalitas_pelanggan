
<?php $__env->startSection('container'); ?>
    <?php if(\Session::has('alert')): ?>
        <?php
        $alert = Session::get('alert');
		echo "
		<script type='text/javascript'>
			alert('$alert !');
		</script>
		";
        ?>
    <?php endif; ?>


<main id="main" class="main">

    <section class="section">
        <div class="row">
        <div class="col-lg-12">
        <!-- Tambah Penjualan -->
            <div class="row">
            <div class="col-lg-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Program Loyalty</h5>

                    <!-- Tambah Penjualan Form Elements -->
                    <form class="row g-3" method="post" action="/loyaltys">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <label for="inputNama" class="form-label">Nama Program</label>
                            <input type="text" class="form-control" name="nama_program" required>
                        </div>

                        <div class="col-12">
                            <label for="inputPembeli" class="form-label">Tanggal Expired</label>
                            <input type="date" class="form-control" name="expired" required>
                        </div>

                        <div class="col-12">
                            <label for="inpuStatus" class="form-label">Produk</label>
                            <select class="form-select" aria-label="Default select example" name="produk_id" required>
                                <option value="">Pilih Produk</option>
                                <?php
                                $product = DB::table('products')->pluck('nama_produk','id');
                                foreach ($product as $id => $nama_produk) {
                                    echo "
                                    <option value='$id'>$nama_produk</option>
                                        ";
                                }            
                                ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="inputDeposit" class="form-label">Qty</label>
                            <input type="number" class="form-control" name="qty" required>
                        </div>

                        <div class="col-12">
                            <label for="inputDeposit" class="form-label">Diskon (Rp)</label>
                            <input type="number" class="form-control" name="diskon" required>
                        </div>

                        <div class="col-12">
                            <label for="inputDeposit" class="form-label">Point</label>
                            <input type="number" class="form-control" name="point" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/loyaltys"><button type="button" class="btn btn-secondary">Batal</button></a>
                        </div>
                    </form>
            </div>
            </div>
        </div>
        </div>
    </section>

</main><!-- End #main -->
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/loyaltys/create.blade.php ENDPATH**/ ?>