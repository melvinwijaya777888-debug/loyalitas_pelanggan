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
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Transaction Amount</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <?php 
                      $orders = DB::table('orders')
                                  ->sum('total');
                    ?>
                    <h6>Rp. <?php print number_format($orders, 0, ",", "."); ?></h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Customer Count</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php 
                      $customers = DB::table('customers')
                                  ->count();
                    ?>
                    <h6>{{$customers}}</h6>
                    <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-4">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Active Loyalty Program</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <?php 
                      $loyaltys = DB::table('loyaltys')
                                  ->count();
                    ?>
                    <h6>{{$loyaltys}}</h6>
                    <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">Top Customers</h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">Rank</th>
                      <th scope="col">Name</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Total Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $customers = DB::table('customers')
                                      ->limit(5)
                                      ->orderBy('point', 'DESC')
                                      ->get();

                      $idx = 0;
                      foreach ($customers as $customer)
                      {
                          $idx += 1;
                          echo "<tr>
                                  <td>$idx</td>
                                  <td>$customer->nama_customer</td>
                                  <td>$customer->no_telp</td>
                                  <td>$customer->point</td>
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
