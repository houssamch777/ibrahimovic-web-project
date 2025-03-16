<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إيصال التبرع</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Noto Kufi Arabic', Arial, sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; direction: rtl; text-align: right;">
    <div style="max-width: 600px; margin: 30px auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: right;">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="display: block; margin: 0 auto 20px;" width="100">
        <h2 style="font-size: 26px; color: #333; margin-bottom: 15px;">شكراً لتبرعك!</h2>
        <p style="font-size: 20px; color: #555; line-height: 1.8;">نحن نقدّر دعمك ومساهمتك. إليك تفاصيل عملية التبرع الخاصة بك:</p>
        <div style="background-color: #f1f1f1; padding: 15px; border-radius: 8px; margin: 20px 0; font-size: 18px;">
            <p style="margin: 0; color: #333;"><strong>رقم الطلب:</strong> {{ $orderNumber }}</p>
            <p style="margin: 0; color: #333;"><strong>المبلغ:</strong> {{ $amount }} دج</p>
            <p style="margin: 0; color: #333;"><strong>المبلغ بالحروف:</strong> {{ $words }}</p>
            <p style="margin: 0; color: #333;"><strong>تاريخ العملية:</strong> {{ \Carbon\Carbon::parse($donationDate)->translatedFormat('l d F Y \الساعة h:i A') }}</p>
        </div>
        <p style="font-size: 20px; color: #555; line-height: 1.8;">يرجى العثور على الإيصال المرفق أدناه.</p>
        <a href="elbaraka.org" style="display: inline-block; margin: 20px 0; padding: 14px 28px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px; font-size: 18px; font-weight: bold; text-align: center;">زوروا موقعنا الإلكتروني</a>
        <div style="margin-top: 30px; font-size: 16px; color: #6c757d; text-align: center;">
            <p>أرسل بـ ❤ من فريق البركة.</p>
            <p>تعاونية الصومام 2 مكرر-لكوت<br>بئر مراد رايس، الجزائر العاصمة، الجزائر</p>
        </div>
    </div>
</body>
</html>
    <!-- The email template is written in HTML and styled with inline CSS. The template includes the logo of the organization, a thank you message, the donation details, and a link to the organization’s website. -->
