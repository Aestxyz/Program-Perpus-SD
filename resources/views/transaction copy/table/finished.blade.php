<div class="table-responsive">
    <table id="example" class="display table nowrap text-center" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($finished as $no => $item)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $item->user->name ?? '-' }}</td>
                    <td><span class="badge bg-primary">{{ $item->status }}</span></td>
                    <td>{{ $item->borrow_date ?? '-' }}</td>
                    <td>{{ $item->return_date ?? '-' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            @include('transaction.show')
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
