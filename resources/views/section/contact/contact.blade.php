<!-- ==== contact section start ==== -->
<section class="contact-main volunteer">
    <div class="container">
        <div class="row gutter-40">
            <div class="col-12 col-xl-6">
                <div class="contact__content">
                    <div class="section__content" data-aos="fade-up" data-aos-duration="1000">
                        <span class="sub-title"><i class="icon-donation"></i> تواصل معنا</span>
                        <h2 class="title-animation">اتصل بنا</h2>
                        <p>جمعية البركة للعمل الخيري والإنساني ترحب بجميع استفساراتكم واقتراحاتكم. نسعى دائمًا لتقديم
                            الأفضل لدعم المحتاجين.</p>
                    </div>
                    <div class="contact-main__inner cta">
                        <div class="contact-main__single">
                            <div class="thumb">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="content">
                                <h6>الموقع</h6>
                                <p><a href="{{$contact->google_map}}" target="_blank">
                                        {{$contact->address}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-main__single">
                            <div class="thumb">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="content">
                                <h6>الهاتف</h6>
                                <p><a href="tel:{{$contact->phone}}" style="direction: ltr">{{$contact->phone}}</a></p>
                                <p><a href="tel:{{$contact->alt_phone}}" style="direction: ltr">{{$contact->alt_phone}}</a></p>
                            </div>
                        </div>
                        <div class="contact-main__single">
                            <div class="thumb">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h6>البريد الإلكتروني</h6>
                                <p><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></p>
                            </div>
                        </div>
                        <div class="contact-main__single">
                            <div class="thumb">
                                <i class="fa-solid fa-share-nodes"></i>
                            </div>
                            <div class="content">
                                <h6>الشبكات الاجتماعية</h6>
                                <div class="social">
                                    @php
                                                                        $socialLinks = [
                                                                        'facebook' => ['url' => $contact->facebook, 'icon' => 'fa-facebook-f', 'label' =>
                                                                        'facebook'],
                                                                        'instagram' => ['url' => $contact->instagram, 'icon' => 'fa-instagram', 'label' =>
                                                                        'instagram'],
                                                                        'twitter' => ['url' => $contact->twitter, 'icon' => 'fa-twitter', 'label' =>
                                                                        'twitter'],
                                                                        'telegram' => ['url' => $contact->telegram, 'icon' => 'fa-telegram', 'label' =>
                                                                        'telegram'],
                                                                        'youtube' => ['url' => $contact->youtube, 'icon' => 'fa-youtube', 'label' =>
                                                                        'youtube'],
                                                                        'tiktok' => ['url' => $contact->tiktok, 'icon' => 'fa-tiktok', 'label' => 'tiktok'],
                                                                        ];
                                                                        @endphp
                                                                        
                                    @foreach ($socialLinks as $key => $social)
                                    @if (!empty($social['url']))
                                    <a href="{{ $social['url'] }}" target="_blank" aria-label="share us on {{ $social['label'] }}"
                                        title="{{ $social['label'] }}">
                                        <i class="fa-brands {{ $social['icon'] }}"></i>
                                    </a>
                                    @endif
                                    @endforeach                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-main__thumb cta">
                        <img src="assets/images/contact-thumb.png" alt="صورة">
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="contact__form volunteer__form checkout__form" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="100">
                    <div class="volunteer__form-content">
                        <h4 class="title-animation">املأ النموذج</h4>
                        <p>لن يتم نشر عنوان بريدك الإلكتروني. الحقول المطلوبة مشار إليها بعلامة *</p>
                    </div>
                    <form action="#" method="post" class="cta">
                        <div class="input-single">
                            <input type="text" name="full-name" id="fullName" placeholder="الاسم الكامل" required>
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="input-single">
                            <input type="email" name="c-email" id="cEmail" placeholder="البريد الإلكتروني" required>
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="input-single">
                            <input type="text" name="phone-number" id="phoneNumber" placeholder="رقم الهاتف" required>
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="input-single alter-input">
                            <textarea name="contact-message" id="contactMessage" placeholder="رسالتك..."></textarea>
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div class="form-cta">
                            <button type="submit" aria-label="إرسال الرسالة" title="إرسال الرسالة"
                                class="btn--primary">إرسال <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==== / contact section end ==== -->