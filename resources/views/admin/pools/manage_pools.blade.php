@extends('admin/layout')
@section('page_title','Pools Volume')
@section('pools_select','active')
@section('container')

<div class="container-fluid">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Water Volume</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="poolsform" >
                            @csrf
                            <input type="hidden" value="{{$id ?? '0'}}" name="id">
                            <div class="mb-3">
                               
                                <label for="exampleInputEmail1" class="form-label">pool_name</label>
                                <input type="text" class="form-control" name="pool_name" value="{{$pool_name ?? ''}}">
                               
                            </div>
                            <button  value="submit" id="submit" class="btn btn-primary">Submit</button>
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
        // Event handler for form submission
        $('#poolsform').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var csrfToken = $(this).data('csrf-token'); // Access the CSRF token from the data attribute
            var $submitButton = $('#submit');
            $submitButton.html('Please Wait...').attr('disabled', true);

            var formData = new FormData($(this)[0]);

            // Perform AJAX request to submit the form data
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.pools.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token from the data attribute
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire(
                            'Good job!',
                            response.message,
                            'success'
                        );
                        window.location.href = "{{ route('admin.pools.list') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                    $submitButton.html('Submit').attr('disabled', false);
                },
                error: function(xhr) {
                    alert('Error occurred during the AJAX request.');
                    $submitButton.html('Submit').attr('disabled', false);
                }
            });
        });
    });
</script>

@endsection

@section('script')

@endsection