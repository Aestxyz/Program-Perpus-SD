{{-- <div class="table-responsive">
    <table id="example" class="display table nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>email</th>
                <th>telp</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $no => $item)
                <tr>
                    <td>{{ ++$no }}.</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telp }}</td>
                    <td><img src="{{ $item->image ?? 'https://source.unsplash.com/random/?karate' }}"
                            class="rounded-circle avatar avatar-sm" style="object-fit: cover;" alt="user image"></td>
                    <td>
                        <div class="d-flex gap-3 justify-content-center">
                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $item->id) }}"
                                role="button">Detail</a>
                            <form action="{{ route('users.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}


@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <style>
        table.dataTable thead tr,
        table.dataTable thead th,
        table.dataTable tbody th,
        table.dataTable tbody td {
            text-align: center;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
@endpush

@push('js')
    $('table.display').DataTable();
@endpush
