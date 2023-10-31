<x-auth.layout>
    <x-slot name="title">Penalties</x-slot>
    @include('layouts.table')

    <div class="row mb-3 gy-3">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Total Rp. {{ $all_amount }}</p>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @forelse ($penalties->take(5) as $item)
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar pull-up" aria-label="{{ $item->transaction->user->name }}"
                                    data-bs-original-title="{{ $item->transaction->user->name }}">
                                    <img class="rounded-circle" src="/assets/img/avatars/6.png" alt="Avatar">
                                </li>
                            @empty
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar pull-up" aria-label="0" data-bs-original-title="0">
                                    <img class="rounded-circle"
                                        src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE4wB6L?ver=72af"
                                        alt="Avatar">
                                </li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="role-heading">
                            <h5 class="mb-1">Total Denda Masuk</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Total {{ $dont_payment->count() }} users</p>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @forelse ($dont_payment->take(5) as $item)
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar pull-up" aria-label="{{ $item->user->name }}"
                                    data-bs-original-title="{{ $item->user->name }}">
                                    <img class="rounded-circle" src="/assets/img/avatars/1.png" alt="Avatar">
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="role-heading">
                            <h5 class="mb-1">Total Terlambat</h5>
                        </div>
                        @if ($dont_payment)
                            <a href="{{ route('transactions.index') }}">Lihat</a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Jumlah Denda</th>
                            <th>Jumlah Hari</th>
                            <th>Tanggal Pembayaran</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penalties as $no => $penalty)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $penalty->transaction->user->name }}</td>
                                <td>Rp. {{ $penalty->amount }}</td>
                                <td>{{ $penalty->lates_day }} Hari</td>
                                <td>{{ $penalty->payment_date }}</td>
                                <td>@include('penalty.detail')</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth.layout>
