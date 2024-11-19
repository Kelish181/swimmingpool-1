@extends('admin/layout')
@section('page_title','Water Volume')
@section('watervolume_select','active')
@section('container')

<div class="container-fluid">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Water Volume</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="productform" >
                            @csrf
                            <input type="hidden" value="{{$id ?? '0'}}" name="id">
                            <div class="mb-3">
                            <div class="pool_name">
                                    <label class="form-label">Pool Name</label>
                                    <select name="p_id"  data-control="select2"
                                        class="form-select form-select-solid form-select-lg mt-1" required>
                                        @foreach($pools as $list)
                                        <option value="{{$list->id}}" @if ($p_id == $list->id) selected @endif>{{$list->modelname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="modelname"
                                    aria-describedby="emailHelp" name="name" value="{{$name ?? ''}}" placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">
                                     <div class="pool_name">
                                    <label class="form-label">Turn Over Time</label>
                                    <select name="turnover_time"  data-control="select2"
                                        class="form-select form-select-solid form-select-lg mt-1" required>
                                        <option value="" selected disabled>Select TurnOver Time</option>
                                        <option value="4" @if($turnover_time==4) selected @endif>4</option>
                                        <option value="6" @if($turnover_time==6) selected @endif>6</option>
                                    </select>
                                </div>
                                </div>
                                    
                                    <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Water Volume From</label>
                                <input type="number" class="form-control" name="volume_from" value="{{$volume_from ?? ''}}">
                                </div>
                                
                                <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Water Volume To</label>
                                <input type="text" class="form-control"  name="volume_to" value="{{$volume_to ?? ''}}">
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
        $('#productform').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var csrfToken = $(this).data('csrf-token'); // Access the CSRF token from the data attribute
            var $submitButton = $('#submit');
            $submitButton.html('Please Wait...').attr('disabled', true);

            var formData = new FormData($(this)[0]);

            // Perform AJAX request to submit the form data
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.watervolume.store') }}',
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
                        window.location.href = "{{ route('admin.watervolume.list') }}";
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