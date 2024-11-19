@extends('admin/layout')
@section('page_title','discount offers')
@section('pools_select','active')
@section('container')

<div class="container-fluid">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">edit discount offers</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="productform" data-csrf-token="{{ csrf_token() }}">
                            @csrf
                            <input type="hidden" value="{{$id ?? '0'}}" name="id">
                           
                            
                            <div class="mb-3 row">
                                <div class="col-sm-3">
                                    <label for="discount" class="form-label">Discount(All type pool)</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="discount" id="rate1" value="{{ old('discount', $discount ?? '') }}" >
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
            url: '{{ route('admin.discount.manage_process') }}',
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
                    window.location.href = "{{route('admin.discount.list') }}";
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


