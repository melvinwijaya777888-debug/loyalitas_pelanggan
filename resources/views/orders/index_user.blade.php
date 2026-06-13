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
                  @foreach ( $orders as $order )
                  <tr>
                      <td>{{$order->id}}</td>
                      <td>{{$order->tgl_order}}</td>
                      <td>Rp. <?php print number_format($order->total, 0, ",", "."); ?></td>
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
