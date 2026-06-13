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
                  @foreach ( $loyaltys as $loyalty )
                  <tr>
                      <td>{{$loyalty->id}}</td>
                      <td>{{$loyalty->nama_program}}</td>
                      <td>{{$loyalty->expired}}</td>
                      <td>{{$loyalty->nama_produk}}</td>
                      <td>{{$loyalty->qty}}</td>
                      <td>{{$loyalty->diskon}}</td>
                      <td>{{$loyalty->point}}</td>
                      <td>
                      <form action="loyalty/{{ $loyalty->id }}" method="post" class="d-inline">  
                          @method('delete')                              
                          @csrf
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $loyalty->nama_program ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
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
