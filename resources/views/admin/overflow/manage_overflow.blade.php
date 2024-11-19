@extends('admin/layout')
@section('page_title','overflow Rate/Sqm')
@section('pools_select','active')
@section('container')

<<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">edit overflow rate</h5>
        <div class="card">
            <div class="card-body">
                <form id="productform" data-csrf-token="{{ csrf_token() }}">
                    @csrf
                    <input type="hidden" value="{{$id ?? '0'}}" name="id">
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="excavation" class="form-label">Excavation</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="excavation1" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="excavation1" id="excavation1" value="{{$excavation1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="leveling_compaction" class="form-label">Leveling and Compaction</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="leveling_compaction" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="leveling_compaction1" id="rate2"  value="{{$leveling_compaction1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="compaction_test" class="form-label">Compaction Test</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="compaction_test" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="compaction_test1" id="rate3" value="{{$compaction_test1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="polyethylene_sheet_1000_gauge" class="form-label">Polyethylene Sheet 1000 Gauge</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate4" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="polyethylene_sheet_1000_gauge1" id="rate4" value="{{$polyethylene_sheet_1000_gauge1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="rubble_soling_230_th" class="form-label">Rubble Soling 230 TH</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate5" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="rubble_soling_230_th1" id="rate5" value="{{$rubble_soling_230_th1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="msrc_pcc_150mm_thick" class="form-label">MSRC PCC 150mm Thick</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate6" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="msrc_pcc_150mm_thick1" id="rate6" value="{{$msrc_pcc_150mm_thick1 ?? ''}}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="modular_panels" class="form-label">Modular Panels 3mm Thick 6 Inch Structure</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate7" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="modular_panels1" id="rate7" value="{{$modular_panels1 ?? ''}}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="overflow_gutter" class="form-label">Overflow Gutter</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate8" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="overflow_gutter1" id="rate8"  value="{{$overflow_gutter1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="fiber_lining" class="form-label">Fiber Lining</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate9" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="fiber_lining1" id="rate9" value="{{$fiber_lining1 ?? ''}}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="paper_glass_tiling_1ft_x_1ft" class="form-label">1ft x 1ft Paper Glass Tiling</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate10" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="paper_glass_tiling_1ft_x_1ft1" id="rate11" value="{{$paper_glass_tiling_1ft_x_1ft1 ?? ''}}" >
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="granite_coping" class="form-label">Granite Coping</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate11" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="granite_coping1" id="rate11" value="{{$granite_coping1 ?? ''}}">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <div class="col-sm-3">
                            <label for="clamps" class="form-label">Clamps</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="rate12" class="form-label">Rate/Sqm</label>
                            <input type="number" class="form-control" name="clamps1" id="rate12" value="{{$clamps1 ?? ''}}">
                        </div>
                    </div>
                    
                    <button type="submit" id="Submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#productform').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var csrfToken = $(this).data('csrf-token'); // Access CSRF token
        var $submitButton = $('#Submit'); // Fixing the button ID capitalization
        $submitButton.html('Please Wait...').attr('disabled', true);

        var formData = new FormData($(this)[0]);

        // Perform AJAX request to submit the form data
        $.ajax({
            type: 'POST',
            url: '{{ route('admin.overflow.manage_process') }}',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include CSRF token
            },
            success: function(response) {
                console.log(response); // Log the response for debugging
                if (response.success) {
                    Swal.fire('Good job!', response.message, 'success');
                    window.location.href = "{{ route('admin.overflow.list') }}";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
                $submitButton.html('Submit').attr('disabled', false);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the full error response
                var errorMessage = xhr.responseJSON?.message || 'Error occurred during the AJAX request.';
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorMessage,
                });
                $submitButton.html('Submit').attr('disabled', false);
            }
        });
    });
});


</script>

@endsection


