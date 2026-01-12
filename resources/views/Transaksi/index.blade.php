 @extends('Layout.navbar')

 @section('navbar')
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 <div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Transaksi</h3>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">+ Tambah Transaksi</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Diskon (%)</th>
                        <th>Total Harga</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transaksi as $index => $transaksi)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            {{-- Nama barang dari relasi --}}
                            <td>{{ $transaksi->barang->nama_barang ?? '-' }}</td>

                            <td>Rp {{ number_format($transaksi->harga, 0, ',', '.') }}</td>
                            <td>{{ $transaksi->diskon }}</td>
                            <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>

                           

                            <td>
                                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus transaksi ini?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">Belum ada data transaksi</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
@endsection