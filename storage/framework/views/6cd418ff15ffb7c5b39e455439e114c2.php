
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
              <h5 class="card-title">Daftar Customer</h5>
              <a href="/customers/create"><button type="button" class="btn btn-primary"><i class="icon ri-add-box-line"></i> Tambah Customer</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Point</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($customer->id); ?></td>
                      <td><?php echo e($customer->nama_customer); ?></td>
                      <td><?php echo e($customer->alamat); ?></td>
                      <td><?php echo e($customer->email); ?></td>
                      <td><?php echo e($customer->no_telp); ?></td>
                      <td><?php echo e($customer->jenis_kelamin); ?></td>
                      <td><?php echo e($customer->point); ?></td>
                      <td>
                      <form action="customer/<?php echo e($customer->id); ?>" method="post" class="d-inline">  
                          <?php echo method_field('delete'); ?>                              
                          <?php echo csrf_field(); ?>
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $customer->nama_customer ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                          ?>
                      </form>
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

<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\- Melvin Wijaya\pelanggan\resources\views/customers/index.blade.php ENDPATH**/ ?>