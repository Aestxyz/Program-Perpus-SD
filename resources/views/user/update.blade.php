<!-- Modal trigger button -->
<button type="button" class="btn  btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $user->slug }}">
    Edit
</button>

<!-- Modal Body -->

<div class="modal fade" id="{{ $user->slug }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl text-start" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAuthentication" class="mb-3" action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <h5 class="fw-bold mb-0">Perubahan informasi Pengguna
                    </h5>
                    <p>Kosongkan saja password jika tidak menggubah password</p>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" id="name"
                                    placeholder="Enter your name" />
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
                                    name="email" value="{{ $user->email }}" placeholder="Enter your email" />
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
                                    name="telp" value="{{ $user->telp }}" id="telp"
                                    placeholder="Enter your telp" />
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
                                    name="identify" value="{{ $user->identify }}" id="identify"
                                    placeholder="Enter your identify" />
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
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Enter your password" />
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating form-floating-outline mb-3">
                                <input type="date" class="form-control @error('birthdate') is-invalid @enderror"
                                    name="birthdate" value="{{ $user->birthdate }}" id="birthdate"
                                    placeholder="Enter your birthdate" />
                                <label for="birthdate">Tanggal Lahir</label>
                                @error('birthdate')
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
                                <select class="form-select form-control @error('gender') is-invalid @enderror"
                                    name="gender" id="gender">
                                    <option selected disabled>Pilih satu</option>
                                    <option {{ $user->gender == 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">
                                        Laki-laki</option>
                                    <option {{ $user->gender == 'Perempuan' ? 'selected' : '' }} value="Perempuan">
                                        Perempuan</option>
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
                                    <option {{ $user->role == 'Anggota' ? 'selected' : '' }} value="Anggota">Anggota
                                    </option>
                                    <option {{ $user->role == 'Petugas' ? 'selected' : '' }} value="Petugas">Petugas
                                    </option>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
