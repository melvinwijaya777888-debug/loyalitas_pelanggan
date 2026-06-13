
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
                    <h5 class="card-title">Tambah Data Customer</h5>

                    <!-- Tambah Penjualan Form Elements -->
                    <form class="row g-3" method="post" action="/customers">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <label for="inputNama" class="form-label">Nama Customer</label>
                            <input type="text" class="form-control" name="nama_customer" required>
                        </div>

                        <div class="col-12">
                            <label for="inputPembeli" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="col-12">
                            <label for="inputPembeli" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control" name="kata_sandi" required>
                        </div>

                        <div class="col-12">
                            <label for="inputDeposit" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" required></textarea>
                        </div>
                        
                        <div class="col-12">
                            <label for="inputPembeli" class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="no_telp" required>
                        </div>

                        <div class="col-12">
                            <label for="inpuStatus" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/customers"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                    </form>
            </div>
            </div>
        </div>
        </div>
    </section>

</main><!-- End #main -->
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/customers/create.blade.php ENDPATH**/ ?>