<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Tambah Transaksi</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                {{-- Pilih Barang --}}
                <div class="mb-3">
                    <label class="form-label">Pilih Barang</label>
                    <select name="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}">
                                {{ $barang->nama_barang }} ({{ $barang->harga }})
                            </option>
                        @endforeach
                    </select>
                </div>

                
                

                {{-- Diskon --}}
                <div class="mb-3">
                    <label class="form-label">Diskon (%)</label>
                    <input type="number" name="diskon" step="0.01" class="form-control" required>
                </div>

                

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>