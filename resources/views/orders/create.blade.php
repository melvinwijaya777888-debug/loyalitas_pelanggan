@extends('layout.menu_user')
@section('container')
    @if(\Session::has('alert'))
        <?php
        $alert = Session::get('alert');
		echo "
		<script type='text/javascript'>
			alert('$alert !');
		</script>
		";
        ?>
    @endif

    <script>
      $(document).ready(function() {
        $('select').selectize({
          sortField: 'text'
        });
      });
    </script>

    <!-- The Modal -->
    <div class="modal fade" id="addnewproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
            <form action="/products_add" method="post">
                @csrf
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
                    <?php
                        $user_id = Session::get('email');
                        $orders_detail_temps = DB::table('orders_detail_temp')
                                                    ->join('products', 'products.id', 'orders_detail_temp.id_produk')
                                                    ->select('orders_detail_temp.*', 'products.nama_produk')
                                                    ->where('customer_id', $user_id)
                                                    ->get();
                        
                        $total = 0;
                        foreach ($orders_detail_temps as $orders_detail_temp)
                        {
                            echo "<tr>
                                    <td>$orders_detail_temp->nama_produk</td>
                                    <td>$orders_detail_temp->qty</td>
                                    <td>Rp. " . number_format($orders_detail_temp->harga, 0, ",", ".") . "</td>
                                    <td>Rp. $orders_detail_temp->diskon</td>
                                    <td>$orders_detail_temp->point</td>
                                    <td>Rp. " . number_format($orders_detail_temp->qty * $orders_detail_temp->harga, 0, ",", ".") . "</td>";
                                ?>
                                <td>
                                    <form action="/orders_delete" method="post" class="d-inline">  
                                        @csrf
                                        <input type="hidden" name="id" value="{{$orders_detail_temp->id}}" />
                                        <?php
                                        echo "
                                        <button name='hapus' class='btn btn-danger btn-sm' OnClick=\"return confirm('Yakin ingin menghapus data order produk = $orders_detail_temp->nama_produk ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                                        ?>
                                    </form>
                                </td>

                                <?php
                                echo "
                                  </tr>";
                            $total += $orders_detail_temp->qty * $orders_detail_temp->harga;
                        }
                    ?>
                    <tr>
                        <td colspan="5" align="right">Total</td>
                        <td>Rp. <?php print number_format($total, 0, ",", ".") ?></td>
                    </tr>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <a href="/orders_store"><button type="button" class="btn btn-success"><i class="bi bi-cart"></i> Checkout</button></a>
              <br><br>

            </div>


          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
