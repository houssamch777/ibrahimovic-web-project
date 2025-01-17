@extends('layouts.rtl.app')
@section('pageTitle', 'ميثاق العائلة الجزائرية | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('pageDescription', 'تعرف على ميثاق العائلة الجزائرية، المبادرة الإنسانية التي تهدف إلى دعم العائلات الفلسطينية
وتأكيد الوقوف مع الشعوب المظلومة من خلال الالتزام الشهري.')
@section('pageKeywords', 'ميثاق العائلة الجزائرية, جمعية البركة الجزائرية, دعم فلسطين, التبرعات, المشاريع الخيرية, العمل
الإنساني, الجزائر')
@section('ogTitle', 'ميثاق العائلة الجزائرية | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'ميثاق العائلة الجزائرية هو تعبير عن التضامن والدعم من العائلات الجزائرية للعائلات الفلسطينية
من خلال التبرع الشهري والمشاركة في تحقيق العدالة الإنسانية.')
@section('ogImage', asset('assets/images/charter-banner.jpg'))
<!-- استبدل 'charter-banner.jpg' بالمسار الفعلي لصورة الميثاق -->
@section('ogUrl', route('family.pledge'))
<!-- استبدل 'family.charter' بالاسم المناسب للمسار -->
@section('ogType', 'article')
@section('twitterTitle', 'ميثاق العائلة الجزائرية | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('twitterDescription', 'انضم إلى ميثاق العائلة الجزائرية لدعم العائلات الفلسطينية من خلال التبرع الشهري ومساندة
الشعوب المظلومة.')
@section('twitterImage', asset('assets/images/charter-banner.jpg'))
<!-- استبدل 'charter-banner.jpg' بالمسار الفعلي لصورة الميثاق -->
@section('css')

@endsection

@section('content')

<!-- ==== banner section start ==== -->
<section class="common-banner">
    <div class="container">
        <div class="row">
            <div class="common-banner__content text-center">
                <span class="sub-title"><i class="icon-donation"></i>تعرف على إدارة الجمعية</span>
                <h2 class="title-animation">ميثاق العائلة الجزائرية</h2>
            </div>
        </div>
    </div>
    <div class="banner-bg">
        <img src="assets/images/banner/banner-bg.png" alt="Image">
    </div>
    <div class="shape">
        <img src="assets/images/shape.png" alt="Image">
    </div>
    <div class="sprade" data-aos="zoom-in" data-aos-duration="1000">
        <img src="assets/images/sprade-base.png" alt="Image" class="base-img">
    </div>
</section>
<!-- ==== / banner section end ==== -->


<section class="volunteer">
    <div class="container">
        <div class="row mb-5">
            <iframe width="560" height="720" src="https://www.youtube.com/embed/HfzqlT5P5Go?si=MFfVrM6PuG1XoCdS"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        <div class="row gutter-40">
            <!-- Preview Contract Section -->
            <div class="col-12 col-xl-6">
                <div class="volunteer__content">
                    <div class="volunteer__form-content mb-4">
                        <h4 class="title-animation">ميثاق العائلة</h4>
                    </div>

                    <!-- Responsive Canvas Wrapper -->
                    <div style="position: relative; width: 100%; height: auto;">
                        <canvas id="contractCanvas" style="width: 100%; height: auto;"></canvas>
                    </div>
                    <p>يرجى ملء النموذج لإتمام الميثاق والتوقيع عليه.</p>
                </div>
            </div>
            <!-- Form Section -->
            <div class="col-12 col-xl-6">
                <div class="volunteer__form checkout__form">
                    <div class="volunteer__form-content mb-4">
                        <h4 class="title-animation">املأ النموذج</h4>
                    </div>
                    <form id="contractForm" method="post" enctype="multipart/form-data">
                        <div class="input-single">
                            <input type="text" name="family_name" id="familyName" placeholder="اسم العائلة" required>
                        </div>
                        <div class="input-single">
                            <input type="text" name="state" id="state" placeholder="الولاية" required>
                        </div>
                        <div class="input-single">
                            <textarea name="message" id="message" placeholder="رسالتك"></textarea>
                        </div>
                        <div class="input-single">
                            <input type="email" name="email" id="email" placeholder="البريد الإلكتروني" required>
                        </div>
                        <div class="input-single">
                            <input type="tel" name="phone" id="phone" placeholder="رقم الهاتف" required pattern="[0-9]{10}">
                        </div>
                        <div class="form-cta">
                            <button type="button" id="previewBtn" class="btn--primary">معاينة الميثاق</button>
                            <button type="submit" id="submitBtn" class="btn--primary">إرسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('js')

<script>
    const canvas = document.getElementById('contractCanvas');
    const ctx = canvas.getContext('2d');
    const contractImage = new Image();

    // Define the original width and height of the canvas (image dimensions)
    const originalWidth = 1086;
    const originalHeight = 768;

    // Adjust canvas size dynamically based on the screen size
    function resizeCanvas() {
        const containerWidth = canvas.parentElement.offsetWidth; // Get parent width
        canvas.width = containerWidth; // Set canvas width to match parent
        canvas.height = (originalHeight / originalWidth) * containerWidth; // Maintain aspect ratio

        // Redraw the image and text after resizing
        drawContract();
    }

    // Load the contract background image
    contractImage.src = '{{asset('assets/pledge.png')}}'; // Replace with your image path
    contractImage.onload = () => {
        resizeCanvas(); // Resize and draw when the image loads
    };

    // Draw the contract with text
function drawContract() {
// Clear canvas
ctx.clearRect(0, 0, canvas.width, canvas.height);

// Draw the background image
ctx.drawImage(contractImage, 0, 0, canvas.width, canvas.height);

// Add dynamic text
const familyName = document.getElementById('familyName').value || 'اسم العائلة';
const state = document.getElementById('state').value || 'الولاية';
const message = document.getElementById('message').value || '';

// Define font size relative to canvas width
const fontSize = Math.floor(canvas.width / 48);
ctx.font = `${fontSize}px 'Noto Kufi Arabic'`;
ctx.fillStyle = '#fff'; // Text color

// Set family name position
const familyNameX = canvas.width * 0.748; // Adjust X position
const familyNameY = canvas.height * 0.84; // Adjust Y position
ctx.fillText(`${familyName}`, familyNameX, familyNameY);

// Set state position
const stateX = canvas.width * 0.36; // Adjust X position
const stateY = canvas.height * 0.84; // Adjust Y position
ctx.fillText(`${state}`, stateX, stateY);
}

    // Handle preview button click
    document.getElementById('previewBtn').addEventListener('click', drawContract);

    // Resize canvas on window resize
    window.addEventListener('resize', resizeCanvas);
</script>
@endsection