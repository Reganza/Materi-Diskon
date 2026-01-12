<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Edit Transaksi</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('transaksi.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                {{-- Pilih Barang --}}
                <div class="mb-3">
                    <label class="form-label">Pilih Barang</label>
                    <select name="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->id }}"
                                {{ old('barang_id', $edit->barang_id) == $barang->id ? 'selected' : '' }}>
                                {{ $barang->nama_barang }} (Rp {{ number_format($barang->harga, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Diskon --}}
                <div class="mb-3">
                    <label class="form-label">Diskon (%)</label>
                    <input type="number" name="diskon" step="0.01" class="form-control"
                        value="{{ old('diskon', $edit->diskon) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

