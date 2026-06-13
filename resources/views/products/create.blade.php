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
        <!-- Tambah Penjualan -->
            <div class="row">
            <div class="col-lg-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Produk</h5>

                    <!-- Tambah Penjualan Form Elements -->
                    <form class="row g-3" method="post" action="/products">
                        @csrf
                        <div class="col-12">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_produk" required>
                        </div>

                        <div class="col-12">
                            <label for="inputPembeli" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" required>
                        </div>

                        <div class="col-12">
                            <label for="inputDeposit" class="form-label">Qty</label>
                            <input type="number" class="form-control" name="qty" required>
                        </div>

                        <div class="col-12">
                            <label for="inpuStatus" class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" name="kategori" required>
                                <option value="">Pilih Kategori Produk</option>
                                <option value="minuman">Minuman</option>
                                <option value="biskuit">Biskuit</option>
                                <option value="snack">Snack</option>
                                <option value="bahan masakan">Bahan Masakan</option>
                                <option value="sabun">Sabun</option>
                                <option value="shampoo">Shampoo</option>
                                <option value="mie instan">Mie Instan</option>
                                <option value="odol">Odol</option>
                                <option value="pembersih pakaian">Pembersih Pakaian</option>
                                <option value="pembersih piring">Pembersih Piring</option>
                            </select>
                        </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/products"><button type="button" class="btn btn-secondary">Batal</button></a>
                    </div>
                    </form>
            </div>
            </div>
        </div>
        </div>
    </section>

</main><!-- End #main -->
    


@endsection