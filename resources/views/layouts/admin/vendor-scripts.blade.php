<!-- JAVASCRIPT -->
<!-- Layout config Js -->
<script src="{{ asset('build/js/layout.js')}}"></script>
<script src="{{ asset('build/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('build/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ asset('build/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('build/libs/node-waves/waves.min.js')}}"></script>

<!-- Include Cropper.js JS -->
<script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
                        let cropper;
                        const fileUpload = document.getElementById('file-upload');
                        const imagePreview = document.getElementById('image-preview');
                        const cropperModal = new bootstrap.Modal(document.getElementById('cropperModal'));
                        const croppedImageInput = document.getElementById('cropped-image');
                        const cropAndSubmitBtn = document.getElementById('crop-and-submit');
        
                        // Trigger file input when clicking a button
                        document.getElementById('choose-file-button').addEventListener('click', function() {
                            fileUpload.click();
                        });
        
                        // When user selects a file
                        fileUpload.addEventListener('change', function(event) {
                            const file = event.target.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    imagePreview.src = e.target.result;
        
                                    // Open modal for cropping
                                    cropperModal.show();
        
                                    // Initialize Cropper.js
                                    if (cropper) {
                                        cropper.destroy();
                                    }
                                    cropper = new Cropper(imagePreview, {
                                        aspectRatio: 1, // You can change this based on the desired aspect ratio
                                        viewMode: 1,
                                        minContainerWidth: 300,
                                        minContainerHeight: 300,
                                        responsive: true,
                                    });
                                };
                                reader.readAsDataURL(file);
                            }
                        });
        
                        // When the user clicks "Crop & Submit"
                        cropAndSubmitBtn.addEventListener('click', function(event) {
                            event.preventDefault();
        
                            if (cropper) {
                                const canvas = cropper.getCroppedCanvas({
                                    width: 300,
                                    height: 300, // You can set this to your desired image size
                                });
        
                                // Convert the canvas to a Base64-encoded image and set it as the value of the hidden input
                                canvas.toBlob(function(blob) {
                                    const reader = new FileReader();
                                    reader.onloadend = function() {
                                        croppedImageInput.value = reader
                                            .result; // Set the cropped image as a base64 string
        
                                        // Submit the form
                                        document.getElementById('profile-image-form').submit();
                                    };
                                    reader.readAsDataURL(blob);
                                });
                            }
                        });
                    });
</script>
<!-- Icon -->
<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
@yield('scripts')