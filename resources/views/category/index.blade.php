<x-auth.layout>
    @include('layouts.table')
    <x-slot name="title">Kategori Buku</x-slot>
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <p class="mb-0">Anda sedang mengakses halaman kategori buku. Mohon pastikan bahwa tindakan yang
                        Anda lakukan sesuai dengan
                        aturan dan kebijakan perpustakaan.</p>
                    <div class="row mt-3 mb-0">
                        <div class="col">
                            <h6 class="m-0 fw-bold">Total Kategori</h6>
                            <p class="m-0">{{ $categories->count() }}</p>
                        </div>
                        <div class="col">
                            <h6 class="m-0 fw-bold">Buku</h6>
                            <p class="m-0">{{ $count }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/man-with-laptop-light.png"
                    class="card-img-position bottom-0 w-50 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @include('category.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Buku</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $no => $category)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->books->count() }} Buku</td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center justify-content-center">
                                        @include('category.update')
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn  btn-danger btn-sm" type="submit">
                                                Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth.layout>
