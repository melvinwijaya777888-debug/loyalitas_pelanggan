
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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Order</h5>
              <a href="/orders_product"><button type="button" class="btn btn-primary"><i class="icon ri-add-box-line"></i> Tambah Order</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Point</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <a href="/checkout"><button type="button" class="btn btn-success"><i class="bi bi-cart"></i> Checkout</button></a>
              <br><br>

            </div>


          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.menu_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/orders/create.blade.php ENDPATH**/ ?>