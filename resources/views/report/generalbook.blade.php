<x-auth.layout>
    <x-slot name="title">Laporan Peminjaman Buku Umum</x-slot>
    @include('layouts.report')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                        <th>Jumlah Hari</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $no => $transaction)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $transaction->code }}</td>
                            <td>{{ $transaction->user->name }}</td>
                            <td>
                                <ul>
                                    @foreach ($transaction->books as $book)
                                        <li>{{ $book->title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $transaction->borrow_date }}</td>
                            <td>{{ $transaction->return_date }}</td>
                            <td>{{ $transaction->status }}</td>
                            <td>
                                @forelse  ($transaction->penalties as $penalty)
                                    {{ 'Rp. ' . $penalty->amount }}
                                @empty
                                    -
                                @endforelse
                            </td>
                            <td>
                                @forelse  ($transaction->penalties as $penalty)
                                    {{ $penalty->lates_day . ' Hari' }}
                                @empty
                                    -
                                @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth.layout>
