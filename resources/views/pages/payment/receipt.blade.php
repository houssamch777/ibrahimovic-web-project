<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وصل الدفع</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            direction: rtl;
            text-align: right;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .receipt {
            width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            position: relative;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .details span {
            font-weight: bold;
        }
        .stamp {
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0.3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <img src="{{asset('assets/images/logo.png')}}" alt="شعار الجمعية">
            <h1>وصل الدفع</h1>
            <h3>تشهد جمعية البــــركة الجــــزائرية للعمل الخيــــري والإنســـــــــــاني باستلام </h2>
        </div>
        <div class="details">
            
            <p><span> مبلغ الأرقام: </span> {{$amount}} دج  <span> بالحروف: </span> {{$words}} دينار جزائري</p>
            <p><span>رقم الوصل:</span> {{$orderNumber}}</p>
            <p><span>التاريخ:</span> {{ Carbon\Carbon::parse($donation->updated_at)->translatedFormat('Y-m-d الساعة h:i A') }}</p>
        </div>
        <div class="footer">
            <p>شكراً لكم على مساهمتكم الكريمة</p>
            <p>للمزيد من المعلومات، يمكنكم الاتصال على الرقم 123456789</p>
        </div>
        
    </div>
</body>
</html>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="receipt" class="card shadow-lg border-0">
                <div class="card-body">
                    <div class="receipt text-center">
                        <!-- Header Section -->
                        <div class="header mb-3">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="شعار الجمعية" class="mb-3">
                            <h5 class="text-success"><strong> وصل تبرع</strong></h5>
                            <p class="mt-2">تشهد جمعية البــــركة الجــــزائرية للعمل الخيــــري والإنســـــــــــاني باستلام</p>
                        </div>
                        <!-- Details Section -->
                        <div class="details  mb-4">
                            <p><strong>مبلغ بالأرقام:</strong> <span class="text-secondary">{{$amount}} دج</span></p>
                            <p><strong>بالحروف:</strong> <span class="text-secondary">{{$words}} دينار جزائري</span></p>
                            <p><strong>رقم الوصل:</strong> <span class="text-secondary">{{$orderNumber}}</span></p>
                            <p><strong>التاريخ:</strong> <span class="text-secondary">{{ Carbon\Carbon::parse($donation->updated_at)->translatedFormat('Y-m-d الساعة h:i A') }}</span></p>
                        </div>
                        <!-- Footer Section -->
                        <div class="mt-4">
                            <p class="text-success font-weight-bold">شكراً لكم على مساهمتكم الكريمة</p>
                            <p class="text-muted">للمزيد من المعلومات، يمكنكم الاتصال على الرقم <span class="text-primary">123456789</span></p>
                        </div>
                    </div>
                                                <!-- Button to Download Receipt -->
                    
                </div>
            </div>
            <div class="text-center mt-3">
                <button id="downloadReceipt" class="btn btn-primary">تحميل الوصل كصورة</button>
            </div>
        </div>
    </div>
</div>      