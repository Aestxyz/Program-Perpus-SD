<x-auth.layout>
    <x-slot name="title">Laporan Peminjaman Buku Umum</x-slot>
    @include('layouts.report')
    <div class="card">
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $no => $transaction)
                        <tr>
                            <td>{{ $transaction->user->name }}</td>
                            <td class="text-start">
                                <ul>
                                    @foreach ($transaction->books as $book)
                                        <li>{{ $book->title }}, </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ $transaction->borrow_date }}</td>
                            <td>{{ $transaction->return_date }}</td>
                            <td class="text-primary fw-bold">
                                {{ $transaction->return_date < now() && $transaction->status == 'Berjalan' ? 'Terlambat' : $transaction->status }}
                            </td>
                            <td>
                                @forelse  ($transaction->penalties as $penalty)
                                    {{ 'Rp. ' . $penalty->amount }}
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
