
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
              <a href="/orders/create"><button type="button" class="btn btn-primary"><i class="icon ri-add-box-line"></i> Tambah Order</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Pemesanan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($order->id); ?></td>
                      <td><?php echo e($order->tgl_order); ?></td>
                      <td>Rp. <?php print number_format($order->total, 0, ",", "."); ?></td>
                      </td>

                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>


          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.menu_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2026\UPH\- Melvin Wijaya\pelanggan\resources\views/orders/index_user.blade.php ENDPATH**/ ?>