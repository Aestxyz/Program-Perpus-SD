{{-- slot --}}
<div class="card">
    <div class="card-body">
        <form class="form-repeater">
            <div data-repeater-list="group-a">
                <div data-repeater-item>
                    <div class="row">
                        <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                            <label class="form-label" for="form-repeater-1-1">Username</label>
                            <input type="text" id="form-repeater-1-1" class="form-control" placeholder="john.doe" />
                        </div>
                        <div class="mb-3 col-lg-6 col-xl-3 col-12 mb-0">
                            <label class="form-label" for="form-repeater-1-2">Password</label>
                            <input type="password" id="form-repeater-1-2" class="form-control"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        </div>
                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label" for="form-repeater-1-3">Gender</label>
                            <select id="form-repeater-1-3" class="form-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-xl-2 col-12 mb-0">
                            <label class="form-label" for="form-repeater-1-4">Profession</label>
                            <select id="form-repeater-1-4" class="form-select">
                                <option value="Designer">Designer</option>
                                <option value="Developer">Developer</option>
                                <option value="Tester">Tester</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                            <button class="btn btn-danger mt-4" data-repeater-delete>
                                <i class="bx bx-x me-1"></i>
                                <span class="align-middle">Delete</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="mb-0">
                <button class="btn btn-primary" data-repeater-create>
                    <i class="bx bx-plus me-1"></i>
                    <span class="align-middle">Add</span>
                </button>
            </div>
        </form>
    </div>
</div>
{{-- /slot --}}

@section('js')
    <script src="/assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

    <script>
        // Form Repeater
        // ! Using jQuery each loop to add dynamic id and class for inputs. You may need to improve it based on form fields.
        // -----------------------------------------------------------------------------------------------------------------
        var formRepeater = $(".form-repeater");

        var row = 2;
        var col = 1;
        formRepeater.on('submit', function(e) {
            e.preventDefault();
        });
        formRepeater.repeater({
            show: function() {
                var fromControl = $(this).find('.form-control, .form-select');
                var formLabel = $(this).find('.form-label');

                fromControl.each(function(i) {
                    var id = 'form-repeater-' + row + '-' + col;
                    $(fromControl[i]).attr('id', id);
                    $(formLabel[i]).attr('for', id);
                    col++;
                });

                row++;

                $(this).slideDown();
            },
            hide: function(e) {
                confirm('Are you sure you want to delete this element?') && $(this).slideUp(e);
            }
        });
    </script>
@endsection
