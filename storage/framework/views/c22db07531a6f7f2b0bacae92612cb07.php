
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
                    <h6>0</h6>
                    <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">increase</span>

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
                    <h6>0</h6>
                    <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">increase</span>

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
                    <h6>Rp. 0</h6>
                    <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">increase</span>

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
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">0813-3665-5681</a></td>
                      <td>1560</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">2</a></th>
                      <td>Bridie Kessler</td>
                      <td><a href="#" class="text-primary">0813-3665-5681</a></td>
                      <td>1450</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">3</a></th>
                      <td>Ashleigh Langosh</td>
                      <td><a href="#" class="text-primary">0813-3665-5681</a></td>
                      <td>958</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">4</a></th>
                      <td>Angus Grady</td>
                      <td><a href="#" class="text-primar">0813-3665-5681</a></td>
                      <td>670</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">5</a></th>
                      <td>Andi Syahputra</td>
                      <td><a href="#" class="text-primary">0813-3665-5681</a></td>
                      <td>165</td>
                    </tr>
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
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\SKRIPSI 2025\UPH\Melvin Wijaya\pelanggan\resources\views/home.blade.php ENDPATH**/ ?>