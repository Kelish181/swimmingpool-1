@extends('admin/layout')
@section('page_title','Heater pump')
@section('heaterpump_select','active')
@section('container')

<div class="container-fluid">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Heater Pump</h5>
                <div class="card">
                    <div class="card-body">
                        <form id="productform" >
                            @csrf
                            <input type="hidden" value="{{$id ?? '0'}}" name="id">
                            
                             <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Sacrificial Pool</label>
                                <select class="form-control" id="sacrificialpool_id" name="sacrificialpool_id">
                                <option disabled selected value="">Select Sacrificial Pool</option>
                                    @foreach($sacrificialpool as $list)
                                        <option value="{{ $list->id ?? '' }}" @if($sacrificialpool_id == $list->id) selected @endif>{{ $list->modelname ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Water Volune</label>
                                <select class="form-control" id="watervolume_id" name="watervolume_id">
                                <option disabled selected value="">Select water volume</option>
                                    @foreach($watervolume as $list)
                                        <option value="{{ $list->id ?? '' }}" @if($watervolume_id == $list->id) selected @endif>{{ $list->name ?? '' }}({{ $list->turnover_time}})</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name"
                                    aria-describedby="emailHelp" name="name" value="{{$name ?? ''}}" placeholder="Enter Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price"
                                    aria-describedby="emailHelp" name="price" value="{{$price ?? ''}}" placeholder="Enter price">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sacrificialpool_id').change(function() {
            var sacrificialPoolId = $(this).val();
            $.ajax({
                url: '/admin/filter/getWaterVolumeId',
                type: 'POST',
                data: {
                    sacrificialPoolId: sacrificialPoolId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#watervolume_id').empty(); 
                    $.each(response.waterVolumeId, function(key, value) {
                        $('#watervolume_id').append('<option value="' + value.id + '">' + value.name + (value.turnover_time ? ' (' + value.turnover_time + ')' : '') + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

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
                url: '{{ route('admin.heaterpump.store') }}',
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
                        window.location.href = "{{ route('admin.heaterpump.list') }}";
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