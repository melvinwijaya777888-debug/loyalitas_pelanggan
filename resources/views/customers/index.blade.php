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
                  @foreach ( $customers as $customer )
                  <tr>
                      <td>{{$customer->id}}</td>
                      <td>{{$customer->nama_customer}}</td>
                      <td>{{$customer->alamat}}</td>
                      <td>{{$customer->email}}</td>
                      <td>{{$customer->no_telp}}</td>
                      <td>{{$customer->jenis_kelamin}}</td>
                      <td>{{$customer->point}}</td>
                      <td>
                      <form action="customer/{{ $customer->id }}" method="post" class="d-inline">  
                          @method('delete')                              
                          @csrf
                          <!--<button type="submit" class="btn btn-danger">Hapus</button>-->
                          <?php
                          echo "
                          <button name='hapus' class='btn btn-danger' OnClick=\"return confirm('Yakin ingin menghapus data produk $customer->nama_customer ?');\" ><i class='fa fa-trash' aria-hidden='true'></i></button>";
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
