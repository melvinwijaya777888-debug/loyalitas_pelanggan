
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
              <h5 class="card-title">Daftar Program Loyalty</h5>
              <a href="/loyaltys/create"><button type="button" class="btn btn-primary"><i class="icon ri-add-box-line"></i> Tambah Program Loyalty</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Program</th>
                    <th scope="col">Tgl Expired</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Point</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $loyaltys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loyalty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($loyalty->id); ?></td>
                      <td><?php echo e($loyalty->nama_program); ?></td>
                      <td><?php echo e($loyalty->expired); ?></td>
                      <td><?php echo e($loyalty->nama_produk); ?></td>
                      <td><?php echo e($loyalty->qty); ?></td>
                      <td><?php echo e($loyalty->diskon); ?></td>
                      <td><?php echo e($loyalty->point); ?></td>
                      <td>
                      <form action="loyalty/<?php echo e($loyalty->id); ?>" method="post" class="d-inline">  
                          <?php echo method_field('delete'); ?>                              
                          <?php echo csrf_field(); ?>
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $loyalty->nama_program ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                          ?>
                      </form>
                      </td>

                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>

            <br>
            <?php echo e($loyaltys->links()); ?>


          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->    


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/loyaltys/index.blade.php ENDPATH**/ ?>