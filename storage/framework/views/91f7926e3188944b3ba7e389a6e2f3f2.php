
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
              <h5 class="card-title">Daftar Produk</h5>
              <a href="/products/create"><button type="button" class="btn btn-primary"><i class="icon ri-add-box-line"></i> Tambah Produk</button></a>
              <br><br>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($product->id); ?></td>
                      <td><?php echo e($product->nama_produk); ?></td>
                      <td>Rp. <?php print number_format($product->harga, 0, ",", "."); ?></td>
                      <td><?php echo e($product->qty); ?></td>
                      <td><?php echo e($product->kategori); ?></td>
                      <td>
                      <form action="product/<?php echo e($product->id); ?>" method="post" class="d-inline">  
                          <?php echo method_field('delete'); ?>                              
                          <?php echo csrf_field(); ?>
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $product->nama_produk ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
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
            <?php echo e($products->links()); ?>


          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/products/index.blade.php ENDPATH**/ ?>