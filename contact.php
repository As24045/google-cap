<?php

require_once("./inc/header.php");

$select = $action->db->sql("SELECT * FROM tbl_settings");

$contact = $select[0];

?>

    <style>
        .contact-info-list li {
            font-size: 1.1rem;
            color: #444;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            list-style: none;
        }

        .contact-info-icon {
            background-color: #ff914c21;
            color: #FF914C;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            font-size: 1.3rem;
        }

        .contact-section .benefits-kicker {
            color: #000 !important;
        }

        #contact-section {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .form-control-lg {
            font-size: 1rem;
            border-radius: 10px;
        }
    </style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- MAIN CONTACT SECTION -->
    <main class="main-content contact-section" id="contact-section">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT COLUMN -->
                <div class="col-lg-5 col-md-12 mb-5 mb-lg-0 pr-lg-5">
                    <div class="benefits-kicker">Get In Touch</div>
                    <h2 class="benefits-main-title">
                        Connect with <span class="text-high">Tutel Team</span>
                    </h2>
                    <p class="text-muted mb-5" style="font-size: 1.1rem; line-height: 1.8;">
                        Have questions about live classes, online tests, study materials, or managing your coaching
                        institute with Tutel? Our team is here to help you get started and grow faster.
                    </p>

                    <ul class="contact-info-list p-0">
                        <li>
                            <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <strong>Our Office</strong><br>
                                <span class="text-muted"><?=@$contact["address"]; ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <strong>Email Us</strong><br>
                                <span class="text-muted"><?=@$contact["email_id"]; ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="contact-info-icon"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <strong>Call Us</strong><br>
                                <span class="text-muted">+91-<?=@$contact["phone"]; ?></span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="col-lg-7 col-md-12">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body p-4 p-md-5" style=" border: 1px solid #e3e3e3; border-radius: 8px; ">

                            <form id="contact_form" method="POST">

                                <div class="row">
                                    <div class="col-md-6 form-group mb-4">
                                        <label class="font-weight-bold text-dark small text-uppercase">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control form-control-lg bg-light border-0"
                                            placeholder="Enter your full name" required>
                                    </div>

                                    <div class="col-md-6 form-group mb-4">
                                        <label class="font-weight-bold text-dark small text-uppercase">Phone no. <span
                                                class="text-danger">*</span></label>
                                        <input type="number" name="phone"
                                            class="form-control form-control-lg bg-light border-0"
                                            placeholder="Enter your phone number" required>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold text-dark small text-uppercase">Email</label>
                                    <input type="email" name="email"
                                        class="form-control form-control-lg bg-light border-0"
                                        placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold text-dark small text-uppercase">Subject</label>
                                    <select name="subject" class="form-control">
                                        <option value="General Enquiry">General Enquiry</option>
                                        <option value="Technical Issues">Technical Issues</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="font-weight-bold text-dark small text-uppercase">Message <span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control form-control-lg bg-light border-0"
                                        rows="5" placeholder="Write your query or requirement..." required></textarea>
                                </div>
                              
                                  <div class="g-recaptcha mb-3" data-sitekey="6LceLSMsAAAAAIxC0ptWy6tKqwtFiluSmIcXXeMt"></div>


                                <div class="mt-4">
                                    <button type="submit" class="btn btn-hero-black btn-block"
                                        style="font-size: 1.1rem; padding: 15px; background-color: #FF914C; border-color: #FF914C;">
                                        Send Message <i class="fas fa-paper-plane ml-2"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER (BLACK) -->
  <?php require_once('./inc/footer.php'); ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

  
    <!-- ALL SCRIPTS SAME (NOT TOUCHED) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
            speed: 3000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: { slidesPerView: 1.5, spaceBetween: 15 },
                768: { slidesPerView: 3, spaceBetween: 25 },
                1024: { slidesPerView: 5, spaceBetween: 20 }
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');

                    if (href === "index.php" || href === "index.html") {
                        return;
                    }

                    if (href.includes('#')) {
                        const parts = href.split('#');
                        const targetId = parts[1];
                        const targetSection = document.getElementById(targetId);

                        if (targetSection) {
                            e.preventDefault();
                            targetSection.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    }

                    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                        navbarCollapse.classList.remove('show');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const accordionItems = document.querySelectorAll(".accordion-item");
            const activeItemOnLoad = document.querySelector(".accordion-item.active");

            if (activeItemOnLoad) {
                const body = activeItemOnLoad.querySelector(".accordion-body");
                body.style.maxHeight = body.scrollHeight + "px";
            }

            accordionItems.forEach((item) => {
                const header = item.querySelector(".accordion-header");
                header.addEventListener("click", () => {
                    const icon = header.querySelector(".icon");
                    const body = item.querySelector(".accordion-body");
                    const currentlyActive = document.querySelector(".accordion-item.active");

                    if (currentlyActive && currentlyActive !== item) {
                        currentlyActive.classList.remove("active");
                        currentlyActive.querySelector(".accordion-body").style.maxHeight = null;
                        const oldIcon = currentlyActive.querySelector(".icon");
                        if (oldIcon) {
                            oldIcon.classList.remove("fa-minus");
                            oldIcon.classList.add("fa-plus");
                        }
                    }

                    item.classList.toggle("active");

                    if (item.classList.contains("active")) {
                        if (icon) { icon.classList.remove("fa-plus"); icon.classList.add("fa-minus"); }
                        body.style.maxHeight = body.scrollHeight + "px";
                    } else {
                        if (icon) { icon.classList.remove("fa-minus"); icon.classList.add("fa-plus"); }
                        body.style.maxHeight = null;
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>




    <script>


        function swaMsg(icon, message, bg) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: icon,
                title: message,
                color: bg,
                customClass: {
                    title: "font-size-13",
                },
                background: "#fff",
            });
        }

        $(document).on('submit', '#contact_form', function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "../admin/inc/config/add-contact-form.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {

                    let json7 = JSON.parse(data);
                    if (json7.status == 100) {
                        swaMsg('success', json7.msg, "#0F843F");

                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                    else {
                        swaMsg('error', json7.msg, "#a90228");
                    }
                }
            });

        });

    </script>

