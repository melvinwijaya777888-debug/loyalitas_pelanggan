@extends('layout.menu')
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
                  @foreach ( $products as $product )
                  <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->nama_produk}}</td>
                      <td>Rp. <?php print number_format($product->harga, 0, ",", "."); ?></td>
                      <td>{{$product->qty}}</td>
                      <td>{{$product->kategori}}</td>
                      <td>
                      <form action="product/{{ $product->id }}" method="post" class="d-inline">  
                          @method('delete')                              
                          @csrf
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $product->nama_produk ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
                          ?>
                      </form>
                      </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>

          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->



@endsection
