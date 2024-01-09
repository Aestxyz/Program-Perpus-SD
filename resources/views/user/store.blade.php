<!-- Modal trigger button -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
    Tambah Baru
</button>

<!-- Modal Body -->

<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <h5 class="fw-bold mb-0">Tambahkan informasi Pengguna
                    </h5>
                    <p>Kata sandi akun diambil dari tanggal lahir pengguna, <span class="fw-bold text-primary">Ex:
                            '22072001'
                            atau
                            '01122018'</span></p>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" id="name"
                                    placeholder="Enter your name" autofocus />
                                <label for="name">Nama Lengkap</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                                <label for="email">Email</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                    name="telp" value="{{ old('telp') }}" id="telp"
                                    placeholder="Enter your telp" autofocus />
                                <label for="telp">Telp</label>
                                @error('telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="number" class="form-control @error('identify') is-invalid @enderror"
                                    name="identify" value="{{ old('identify') }}" id="identify"
                                    placeholder="Enter your identify" autofocus />
                                <label for="identify">NIS/etc.</label>
                                @error('identify')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="date" class="form-control @error('birthdate') is-invalid @enderror"
                                    name="birthdate" value="{{ old('birthdate') }}" id="birthdate"
                                    placeholder="Enter your birthdate" autofocus />
                                <label for="birthdate">Tanggal Lahir</label>
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <select class="form-select form-control @error('gender') is-invalid @enderror"
                                    name="gender" id="gender">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <label for="gender">Jenis Kelamin</label>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <select class="form-select form-control @error('role') is-invalid @enderror"
                                    name="role" id="role">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Anggota">Anggota</option>
                                    @if (Auth()->user()->role == 'Petugas')
                                        <option value="Petugas">Petugas</option>
                                    @endif
                                </select>
                                <label for="role">Status</label>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
