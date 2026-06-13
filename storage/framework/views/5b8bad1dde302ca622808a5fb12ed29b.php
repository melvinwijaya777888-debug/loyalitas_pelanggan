
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

    <!-- The Modal -->
    <div class="modal fade" id="addnewproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
            <form action="/products_add" method="post">
                <?php echo csrf_field(); ?>
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Produk</h4>                
                </div>


                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            Produk:<br/>
                            <select class="form-control" name="produk" required>
                                <option value="">Pilih Produk</option>
                                <?php
                                    $products = DB::table('products')->pluck('nama_produk','id');
                                    foreach ($products as $id => $nama_produk) {
                                        echo "
                                        <option value='$id'>$nama_produk</option>
                                            ";

                                    }            
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            Qty:<br/>
                            <input type="number" class="form-control" name="qty" value="1" min="1" max="100" step="1" required> 
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">     
                    <input value="Tambah" type="submit" class="btn btn-primary" name="tombol">               
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            
            </form>

            </div>
        </div>
    </div>    

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Order</h5>
              <a href="#"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addnewproduct"><i class="icon ri-add-box-line"></i> Tambah Produk</button></a>
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

<?php echo $__env->make('layout.menu_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\- Melvin Wijaya\pelanggan\resources\views/orders/create.blade.php ENDPATH**/ ?>