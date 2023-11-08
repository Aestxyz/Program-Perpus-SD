<div class="table-responsive">
    <table id="example" class="display table nowrap text-center" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>nama lengkap</th>
                <th>status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($waiting as $no => $item)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td><span class="badge bg-warning">{{ $item->status }}</span></td>
                    <td>{{ $item->borrow_date ?? '-' }}</td>
                    <td>{{ $item->return_date ?? '-' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <form action="{{ route('transactions.confirmation', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Berjalan">
                                <input type="hidden" name="borrow_date" value="{{ $borrow_date }}">
                                <input type="hidden" name="return_date" value="{{ $return_date }}">
                                <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                            </form>
                            <form action="{{ Route('transactions.reject', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                             <a class="btn btn-primary btn-sm" href="{{ route('transactions.show', $item->id) }}"
                                role="button">Lihat</a>

                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
