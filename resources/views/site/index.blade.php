@extends('layouts.site')

@section('title')
    الرئيسية
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">

                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                     data-aos="fade-up" data-aos-delay="200">
                    <h1><span>Frame Car</span> - إصلاح زجاج السيارات</h1>
                    <h2>شركة <span>Frame Car</span> - الحل النهائي لإصلاح زجاج سيارتك بكفاءة ووضوح.</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{asset('site/')}}#about" class="btn-get-started scrollto">ابدأ الان</a>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <!-- <div></div> -->
                    <img src="{{asset('site/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
                </div>

            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-1.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{asset('site/assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>من نحن</h2>
                </div>

                <div class="row content d-flex justify-content-between">
                    <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="100">
                        <p>
                            إصلاح زجاج السيارات هو مجالنا الخاص. نحن نفهم مدى أهمية زجاج سيارتك لسلامتك وراحتك. لذلك، نقدم خدماتنا
                            بأعلى مستوى من الجودة.
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> خبراء متخصصون في إصلاح زجاج السيارات</li>
                            <li><i class="ri-check-double-line"></i> نستخدم تقنيات متقدمة لضمان الجودة</li>
                            <li><i class="ri-check-double-line"></i> خدمة سريعة وفعالة للعملاء</li>
                        </ul>
                    </div>
                    <div class="col-lg-5 pt-4 pt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <p>
                            نحن نلتزم بتقديم أفضل الخدمات لعملائنا. نعمل بجد لضمان استعادة شفافية زجاج سيارتك بأعلى مستوى من الجودة.
                            باستخدام تكنولوجيا متقدمة وخبراء محترفين، نضمن لك سيارة آمنة وجاهزة للطريق.
                        </p>
                        <a href="{{asset('site/')}}#" class="btn-learn-more">تعرف أكثر</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>خدماتنا</h2>
                    <p>نقدم مجموعة شاملة من خدمات إصلاح زجاج السيارات لضمان سلامتك وراحتك على الطريق. فريقنا المتخصص يقدم الخدمات
                        التالية:</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bi-tools"></i></div>
                            <h4><a href="{{asset('site/')}}">إصلاح زجاج السيارات</a></h4>
                            <p>نقدم خدمة إصلاح زجاج السيارات بجودة عالية وتقنيات متقدمة لضمان سلامة وجودة زجاج سيارتك.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                         data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-car"></i></div>
                            <h4><a href="{{asset('site/')}}">تغيير زجاج السيارة</a></h4>
                            <p>نقوم بتوفير خدمة تغيير زجاج السيارة بسرعة ودقة، مع توفير أحدث أنواع الزجاج لتلبية احتياجات سيارتك.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                         data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-shield"></i></div>
                            <h4><a href="{{asset('site/')}}">زجاج مقاوم للتكسير</a></h4>
                            <p>نقدم زجاج مقاوم للتكسير لزيادة الأمان والحماية، مصمم خصيصًا لتحمل الظروف القاسية على الطريق.</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                         data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-headphone"></i></div>
                            <h4><a href="{{asset('site/')}}">خدمة العملاء الممتازة</a></h4>
                            <p>نهتم بخدمة العملاء وضمان رضاهم بكل تفاصيل خدماتنا، ونقدم دعمًا ممتازًا لجميع استفساراتك واحتياجاتك.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>لماذا تختارنا؟</h3>
                            <p>
                                نحن خيارك الأفضل لأننا نقدم خدمات إصلاح وتغيير زجاج السيارات بأعلى مستوى من الجودة والدقة. فريقنا ذو
                                الخبرة الواسعة يعمل بجد لضمان سلامتك وسرعة عودتك إلى الطريق. اخترنا من قبل العديد من العملاء بسبب
                                اعتمادنا على التقنيات المتقدمة والزجاج المقاوم للتكسير لضمان راحتك وأمانك.
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> هل
                                        تحتاج إلى خدمات إصلاح أو تغيير زجاج السيارة؟ <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>
                                            نعم، نحن هنا لخدمتك. نقدم خدمات إصلاح زجاج السيارات بأعلى جودة ممكنة. سواء كنت بحاجة إلى إصلاح
                                            زجاج متضرر أو تغييره بسبب تلفه، فإن فريقنا المتخصص سيقوم بالمهمة بسرعة ودقة.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> ما
                                        هي مزايا الزجاج المقاوم للتكسير؟ <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            الزجاج المقاوم للتكسير يوفر مستوى عالٍ من الأمان والحماية. إنه مصمم خصيصًا للتحمل الشديد ويمكنه
                                            تحمل الظروف القاسية على الطريق. اختيار هذا النوع من الزجاج يعني أنك تستثمر في سلامتك وسلامة
                                            سيارتك.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> كيف
                                        يمكنني الاستفادة من خدماتكم؟ <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            إن الاستفادة من خدماتنا سهلة وبسيطة. كل ما عليك فعله هو الاتصال بنا وسنقوم بتقديم الخدمة التي
                                            تحتاجها. نحن هنا لإصلاح زجاج سيارتك بسرعة وجودة عالية، ونوفر لك زجاجًا مقاومًا للتكسير إذا كنت
                                            بحاجة إلى تغييره.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                         style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Skills Section ======= -->
        <!-- <section id="skills" class="skills">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
        <img src="{{asset('site/')}}assets/img/skills.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
        <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
        <p class="fst-italic">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>

        <div class="skills-content">

          <div class="progress">
            <span class="skill">HTML <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">CSS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">JavaScript <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Photoshop <i class="val">55%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>
    </div>

  </div>
</section> -->
        <!-- End Skills Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>اتصل بنا الآن</h3>
                        <p>تسعى شركتنا دائمًا إلى تقديم أفضل خدمات إصلاح وتغيير زجاج السيارات. نحن هنا لتلبية احتياجاتك بأعلى جودة
                            ودقة. اتصل بنا الآن للحصول على خدمة فورية ومميزة.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="{{asset('site/')}}#">اتصل بنا الآن</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>مراحل الصيانة</h2>
                    <p>نقدم لكم خدمات الصيانة بخبرة ودقة عالية. تعرف على مراحل الصيانة التي نقدمها لضمان سلامة وأداء سيارتك بأفضل
                        حال.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><i class="bx bi-person"></i></div>
                            <div class="member-info">
                                <h4>التقييم والتشخيص</h4>
                                <p>نقوم بتقييم حالة زجاج السيارة وتشخيص أي تلفيات أو كسور. يتم فحص الزجاج بعناية لتحديد نوع الإصلاح أو
                                    التغيير المطلوب.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><i class="bx bi-tools"></i></div>
                            <div class="member-info">
                                <h4>إصلاح الزجاج</h4>
                                <p>باستخدام أحدث التقنيات والمعدات، نقوم بإصلاح الزجاج المتضرر بدقة عالية لضمان استعادة سلامته ومتانته.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><i class="bx bx-refresh"></i></div>
                            <div class="member-info">
                                <h4>استبدال الزجاج</h4>
                                <p>إذا كان الزجاج تالفًا بشكل لا يمكن إصلاحه، نقوم بتوفير خدمة استبدال الزجاج بزجاج جديد ومقاوم للتكسير.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
                        <div class="member d-flex align-items-start">
                            <div class="pic"><i class="bx bx-check-circle"></i></div>
                            <div class="member-info">
                                <h4>فحص نهائي وتسليم</h4>
                                <p>بعد الإصلاح أو الاستبدال، نقوم بإجراء فحص نهائي لضمان جودة العمل وسلامة الزجاج، ثم نقوم بتسليم
                                    السيارة إليك.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>آخر أعمالنا</h2>
                    <p>نتشرف بعرض بعض من أحدث أعمالنا وإنجازاتنا في مجال إصلاح وتغيير زجاج السيارات. يمكنك مشاهدة نماذج من أعمالنا
                        المميزة هنا.</p>
                </div>

                <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">الكل</li>
                    <li data-filter=".filter-app">تصليح</li>
                    <li data-filter=".filter-card">استبدال</li>
                    <!-- <li data-filter=".filter-web">Web</li> -->
                </ul>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>تصليح</h4>
                            <p>تصليح زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>تصليح</h4>
                            <p>تصليح زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 2"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>استبدال</h4>
                            <p>استبدال زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 2"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 2</h4>
                            <p>Web</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 2"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>تصليح</h4>
                            <p>تصليح زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="App 3"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>استبدال</h4>
                            <p>استبدال زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 1"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>استبدال</h4>
                            <p>استبدال زجاج السيارة</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Card 3"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-img"><img src="{{asset('site/')}}assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt=""></div>
                        <div class="portfolio-info">
                            <h4>Web 3</h4>
                            <p>Web</p>
                            <a href="{{asset('site/')}}assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery"
                               class="portfolio-lightbox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
                            <a href="{{asset('site/')}}#" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>اتصل بنا</h2>
                    <p>نحن دائمًا في خدمتكم. إذا كان لديكم أي استفسار أو تحتاجون إلى مساعدة، فلا تترددوا في التواصل معنا. سنكون
                        سعداء بالإجابة على أسئلتكم وتقديم المساعدة في أي وقت.</p>
                </div>

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>الموقع:</h4>
                                <p>شارع الملك فهد، الرياض، المملكة العربية السعودية</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>البريد الإلكتروني:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>الاتصال:</h4>
                                <p dir="ltr">+99-4565-5578-788</p>
                            </div>

                            <iframe
                                src="{{asset('site/')}}https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">اسمك</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name">بريدك الالكتروني</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name">الموضوع</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="name">الرسالة</label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">إرسال</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <!--
<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Arsha</h3>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Graphic Design</a></li>
        </ul>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>اتصل بنا</h2>
          <p>نحن دائمًا في خدمتكم. إذا كان لديكم أي استفسار أو تحتاجون إلى مساعدة، فلا تترددوا في التواصل معنا. سنكون
            سعداء بالإجابة على أسئلتكم وتقديم المساعدة في أي وقت.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>الموقع:</h4>
                <p>شارع الملك فهد، الرياض، المملكة العربية السعودية</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>البريد الإلكتروني:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>الاتصال:</h4>
                <p dir="ltr">+99-4565-5578-788</p>
              </div>

              <iframe
                src="{{asset('site/')}}https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{route('contact.store')}}" method="post" role="form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">اسمك</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">بريدك الالكتروني</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">الموضوع</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">الرسالة</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              
              <div class="text-center"><button type="submit">إرسال</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
        <div class="social-links mt-3">
          <a href="{{asset('site/')}}#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="{{asset('site/')}}#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="{{asset('site/')}}#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="{{asset('site/')}}#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="{{asset('site/')}}#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div> -->

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                Copyright &copy; <strong><span style="font-weight: bold; color: cyan;">Frame Car</span></strong>. All Rights
                Reserved
            </div>
            <div class="credits">
                Designed by <span style="font-weight: bold; color: cyan;">Muhammed Saber</span>
            </div>
        </div>
    </footer><!-- End Footer -->

@endsection
