@extends('admin/layout')
@section('page_title', 'Product')
@section('product_select', 'active')
@section('container')

<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Product</h5>
        <div class="card">
            <div class="card-body">
                <form id="productForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $id ?? '0' }}" name="id">
                   
                    <div class="mb-3">
                        <label for="heading" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $name ?? '' }}"
                            placeholder="Enter Name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Enter Description">{{ old('description', $description ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter price"{{ old('price', $price ?? '') }}>
                    </div>
                    
                    
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>

<script>
    $(document).ready(function () {
        $('#productForm').on('submit', function (event) {
            event.preventDefault();

            var $submitButton = $('#submit');
            $submitButton.html('Please Wait...').attr('disabled', true);

            var formData = new FormData($(this)[0]);

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.product.manage_process') }}',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire(
                            'Good job!',
                            response.message,
                            'success'
                        );
                        window.location.href = "{{ route('admin.product.list') }}";
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                    $submitButton.html('Submit').attr('disabled', false);
                },
                error: function (xhr) {
                    alert('Error occurred during the AJAX request.');
                    $submitButton.html('Submit').attr('disabled', false);
                }
            });
        });
    });

    ClassicEditor
            .create( document.querySelector( '#discription' ),{
                ckfinder: {
                    uploadUrl: '{{route('admin.ckeditor.upload').'?_token='.csrf_token()}}',
        }
            })
            .catch( error => {
                console.error( error );
            } );
</script>

@endsection

@section('script')
<!-- Additional scripts if needed -->
@endsection
