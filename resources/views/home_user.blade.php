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

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-12">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Total Point</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <?php 
                      $user_id = Session::get('email');
                      $customers = DB::table('customers')
                                  ->where('email', $user_id)
                                  ->first();
                    ?>
                    <h6>{{$customers->point}}</h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">5 Last Order</h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Total Pemesanan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $orders = DB::table('orders')                      
                                      ->limit(5)
                                      ->where('customer_id', $user_id)
                                      ->orderBy('id', 'DESC')
                                      ->get();

                      $idx = 0;
                      foreach ($orders as $order)
                      {
                          $idx += 1;
                          echo "<tr>
                                  <td>$idx</td>
                                  <td>$order->tgl_order</td>
                                  <td>Rp. " . number_format($order->total, 0, ",", ".") . "</td>
                                </tr>";                        
                      }
                    ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->    
    
@endsection
