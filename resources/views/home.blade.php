<x-auth.layout>
    <x-slot name="title">Beranda</x-slot>
    <div class="card">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Hallo {{ Auth()->user()->name }}!🎉</h4>
                    <p class="mb-0">Selamat menjalankan tugas dan semoga harimu menyenangkan.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center">
                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/man-with-laptop-light.png"
                    class="card-img-position bottom-0 w-50 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>

</x-auth.layout>
