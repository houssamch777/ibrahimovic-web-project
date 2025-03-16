@extends('layouts.rtl.app')

@section('pageTitle', 'تبرع لجمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('pageDescription', 'تبرع الآن لجمعية البركة الجزائرية وساهم في دعم الشعوب المظلومة من خلال المساعدات الإنسانية،
المشاريع الخيرية، والإغاثة العاجلة.')
@section('pageKeywords', 'تبرع, جمعية البركة الجزائرية, دعم الشعوب, المشاريع الخيرية, التبرعات, العمل الإنساني,
الإغاثة')
@section('ogTitle', 'تبرع الآن | جمعية البركة الجزائرية لدعم الشعوب المظلومة')
@section('ogDescription', 'ساهم في دعم الشعوب المظلومة من خلال التبرع لجمعية البركة الجزائرية. تبرعاتكم تساهم في تقديم
المساعدات الإنسانية وتنفيذ المشاريع الخيرية.')
@section('ogImage', asset('images/10-years-logo.jpg'))
<!-- استبدل 'donation-banner.jpg' بمسار صورة صفحة التبرع -->
@section('ogUrl', route('donation.index'))
<!-- استبدل 'donation' بمسار صفحة التبرع -->
@section('ogType', 'article')
@section('twitterTitle', 'تبرع لجمعية البركة الجزائرية | دعم الشعوب المظلومة')
@section('twitterDescription', 'تبرع الآن وساهم في تحقيق العدالة الإنسانية ودعم الشعوب المظلومة من خلال جمعية البركة
الجزائرية.')
@section('twitterImage', asset('assets/10-years-logo.jpg'))
<!-- استبدل 'donation-banner.jpg' بمسار صورة صفحة التبرع -->
@section('css')

@endsection

@section('content')


    <section class="mt-4">
        <div class="mt-4">
            <!-- ==== donate us section start ==== -->
            <div class="cm-details donate-us community checkout faq">
                <div class="container">
                    <div class="row gutter-60">
                        <div class="container py-5">
                            <div class="text-center">
                                <div id="charityAnimation" style="width: 100px; margin: 0 auto;"></div>
                                <h4 class="text-success"><strong>تهانينا! تم قبول عملية الدفع الخاصة بك بنجاح</strong></h4>
                                <p class="mt-2">
                                    شكراً لتبرعك الكريم! إليك تفاصيل العملية:
                                </p>
                            </div>
                        
                            <div class="card my-4">
                                <div class="card-body">
                                    <h4 class="card-title text-center">تفاصيل العملية</h4>
                                    <div class="text-center">
                                    <p><strong>رقم الطلب:</strong> {{ $orderNumber }}</p>
                                    <p><strong>المبلغ:</strong> {{ number_format($amount, 2) }} دج</p>
                                    <p><strong>المبلغ بالحروف:</strong> {{ $words }} دينار  جزائري</p>
                                </div>
                                </div>
                            </div>
                        
                            <div class="text-center mt-4">
                            
                                <button class="btn btn-outline-success btn-lg mb-4" data-bs-toggle="modal" data-bs-target="#nameModal">
                                    <strong>عرض الإيصال</strong>
                                </button>
                                <div class="form-cta">
                                    <a href="{{route('home')}}" aria-label="submit message" title="submit message"
                                       class="btn--primary">العود للصفحة الرئسية <i
                                          class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        <!-- ==== / donate us section end ==== -->
        </div>
    </section>
<!-- Modal to Ask for the Name -->
<div class="modal fade" id="nameModal" tabindex="-1" aria-labelledby="nameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nameModalLabel">إضافة اسم للإيصال</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="receiptForm">
                    <div class="mb-3">
                        <label for="donorName" class="form-label">اسم المتبرع</label>
                        <input type="text" class="form-control" id="donorName" placeholder="أدخل اسمك (اختياري)">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                
                <button onclick="openReceiptModal('{{$orderNumber}}', '{{$amount}}', '{{$words}}', '{{$donation->updated_at}}')">عرض الإيصال</button>

            </div>
        </div>
    </div>
</div>
<!-- Modal to Display Receipt -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">إيصال التبرع</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Canvas لإظهار الصورة -->
                <canvas id="receiptCanvas" width="2550" height="1200" style="border: 1px solid black; width: 100%;"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="saveReceiptButton">تنزيل الإيصال</button>
                <button type="button" class="btn btn-primary" id="printReceiptButton">طباعة الإيصال</button>
                <button type="button" class="btn btn-primary" id="emailReceiptButton">إرسال الإيصال عبر البريد الإلكتروني</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    const receiptImage = "{{ asset('assets/images/reciept.png') }}";
</script>
<script>
      function formatDonationDate(dateString) {
        const days = [
        "الأحد", "الإثنين", "الثلاثاء", "الأربعاء",
        "الخميس", "الجمعة", "السبت"
    ];

    const months = [
        "جانفي", "فيفري", "مارس", "أفريل", "ماي", "جوان",
        "جويلية", "أوت", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
    ];

    const date = new Date(dateString);

    const dayName = days[date.getDay()]; // اسم اليوم
    const day = date.getDate(); // اليوم (رقم)
    const month = months[date.getMonth()]; // الشهر
    const year = date.getFullYear(); // السنة

    return `${dayName} ${day} ${month} ${year}`;
    }
    function openReceiptModal(orderNumber, amount, words, donationDate) {
    // جلب القيم من المدخلات أو من متغيرات الخادم
    const formattedDate = formatDonationDate(donationDate);
console.log(formattedDate);
    const canvas = document.getElementById('receiptCanvas');
    const ctx = canvas.getContext('2d');
    const image = new Image();
    let donorName = document.getElementById('donorName').value; // استخدام let بدل const
    if (!donorName) { // إذا لم يتم إدخال اسم المتبرع
        donorName = 'محسن (ة)'; // قم بتعيين القيمة الافتراضية
    }

    // تحميل الصورة الأساسية
    image.src = receiptImage; // استبدل المسار بالصحيح

    image.onload = function () {
        // رسم الصورة في الـ canvas
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);

        // إعداد النصوص
        ctx.font = '48px "Noto Kufi Arabic"';
        ctx.fillStyle = '#000';
        

        // إضافة النصوص داخل الصورة
        ctx.fillText(amount + ' دج', 1600, 580); // المبلغ بالأرقام
        ctx.fillText(words, 1600, 700);         // المبلغ بالحروف
        ctx.fillText(donorName, 1600, 800);     // اسم المتبرع
        ctx.fillText(formattedDate, 800, 980); // التاريخ
        ctx.fillText(orderNumber, 880, 1070);   // رقم الطلب

        // عرض المودال
        const modal = new bootstrap.Modal(document.getElementById('receiptModal'));
        modal.show();
    };

    // تفعيل زر الحفظ لتنزيل الصورة
    document.getElementById('saveReceiptButton').onclick = function () {
        const link = document.createElement('a');
        link.download = 'receipt.png';
        link.href = canvas.toDataURL();
        link.click();
    };
}

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.1/lottie.min.js"></script>
<script>
    lottie.loadAnimation({
    container: document.getElementById('charityAnimation'),
    renderer: 'svg',
    loop: true,
    autoplay: true,
    path: '{{asset("assets/images/animated/charity-animation.json")}}'
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


<script>
document.getElementById('printReceiptButton').onclick = function () {
    // الحصول على الـ canvas
    const canvas = document.getElementById('receiptCanvas');

    // تحويل الـ canvas إلى صورة
    const imageData = canvas.toDataURL('image/png');
    const { jsPDF } = window.jspdf; // Import jsPDF

    // إنشاء كائن PDF بحجم A4
    const pdf = new jsPDF('portrait', 'pt', 'a4');
    const pageWidth = 595.28; // عرض صفحة A4 بالنقاط
    const pageHeight = 841.89; // ارتفاع صفحة A4 بالنقاط

    // تعديل حجم الصورة لتتناسب مع عرض الصفحة
    const imageWidth = pageWidth; // عرض الصورة يساوي عرض الصفحة
    const aspectRatio = canvas.height / canvas.width; // نسبة العرض إلى الارتفاع
    const imageHeight = imageWidth * aspectRatio; // حساب ارتفاع الصورة بناءً على النسبة

    // إضافة الصورة إلى أعلى الصفحة
    pdf.addImage(imageData, 'PNG', 0, 0, imageWidth, imageHeight);

    // فتح نافذة الطباعة
    const pdfURL = pdf.output('bloburl');
    window.open(pdfURL, '_blank'); // فتح PDF في نافذة جديدة
};
</script>


<script>
    //ارسال الايصال عبر البريد الالكتروني
    document.getElementById('emailReceiptButton').onclick = function () {
        const email = prompt("أدخل البريد الإلكتروني الذي ترغب في إرسال الإيصال إليه:");
        if (email) {
            // الحصول على بيانات الإيصال
            const canvas = document.getElementById('receiptCanvas');
            const imageData = canvas.toDataURL('image/png'); // تحويل الصورة إلى بيانات Base64

            // إرسال الطلب إلى الخادم
            fetch('{{ route("send.receipt.email") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    email: email,
                    orderNumber: '{{ $orderNumber }}',
                    amount: '{{ $amount }}',
                    words: '{{ $words }}',
                    donationDate: '{{ $donation->updated_at }}',
                    receiptImage: imageData
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم إرسال الإيصال بنجاح إلى البريد الإلكتروني!');
                } else {
                    alert('حدث خطأ أثناء إرسال الإيصال.');
                }
            });
        }
    };
</script>

@endsection