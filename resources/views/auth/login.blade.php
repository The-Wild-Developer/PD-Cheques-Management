<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PD CHEQUES MANAGEMENT - Sign In</title>
    <meta name="description" content="PD CHEQUES MANAGEMENT">
    <meta name="author" content="Tineth Pathirage">

    <link rel="shortcut icon" href="assets/images/zynolo-small.png">

    <script src="assets/js/hyper-config.js"></script>


    <link href="assets/css/app-saas.min.css" rel="stylesheet" type="text/css" id="app-style" />


    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <style>
        .auth-fluid-right {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
        }

        .auth-user-testimonial {
            border-radius: 15px;
        }
    </style>

</head>

<body class="authentication-bg pb-0">

    <div class="auth-fluid">

        <div class="auth-fluid-form-box">
            <div class="card-body d-flex flex-column h-100 gap-4">

                <div class="auth-brand text-center text-lg-start">
                    <a href="/" class="logo-dark">
                        <span><img src="/assets/images/zynolo-white.png" alt="logo" width="250"></span>
                    </a>
                    <a href="/" class="logo-light">
                        <span><img src="/assets/images/zynolo-white.png" alt="logo" width="20"></span>
                    </a>
                </div>

                <div class="my-auto">
                    <h4 class="mt-0">Sign In</h4>
                    <p class="text-muted mb-4">Enter your email address and password to access account.</p>


                    @if (session('success'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 text-sm font-medium text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" :value="__('Email')" class="form-label">Email address</label>
                            <input class="form-control mb-1" value="{{ old('email') }}" type="email" id="email"
                                name="email" required autofocus autocomplete="username" required=""
                                placeholder="Enter your email">
                            <span class="font-12 text-danger">These credentials do not match our records.</span>
                        </div>
                        <div class="mb-3">
                            @if (Route::has('forgot.password'))
                                <a href="{{ route('forgot.password') }}" class="text-muted float-end"><small>Forgot your
                                        password?</small></a>
                            @endif
                            <label for="password" class="form-label" :value="__('Password')">Password</label>
                            <input class="form-control mb-1" type="password" name="password" id="password" required
                                autocomplete="current-password" placeholder="Enter your password">
                            <span class="font-12 text-danger">These credentials do not match our records.</span>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="d-grid mb-0 text-center">
                            <a href="/dashboard" class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i>
                                {{ __('Log In') }}</a>
                        </div>



                        <div class="text-center mt-3">
                            <p class="text-muted">Welcome! Your account is just a login away.</p>
                        </div>
                    </form>

                </div>


                <footer class="footer footer-alt">
                    <div class="d-flex justify-content-center align-items-center mt-0">
                        <div class="d-flex align-items-center text-center">
                            <p class="font-16 mb-0 fw-bold">Powerd By</p>
                            <img src="/assets/images/footer-logo.png" alt="Footer Logo" class="img-fluid footer-logo"
                                style="max-width: 100px;">
                        </div>
                    </div>
                </footer>

            </div>
        </div>
        <div class="auth-fluid-right text-center" id="slideshow-container">
            <div
                class="auth-user-testimonial bg-dark bg-opacity-50 text-white w-75 p-3 d-inline-block w-[80%] w-sm-75 w-md-50 w-lg-40">
                <h2 class="mb-3 fs-2 fs-sm-4 fs-md-5 fs-lg-6" id="typing-text"></h2>
                <p class="lead fs-5 fs-sm-7 fs-md-8 fs-lg-9" id="typing-subtext"></p>
                <p class="fs-5 fs-sm-7 fs-md-8 fs-lg-9" id="typing-company"></p>
            </div>
        </div>

    </div>

    <script>
        const slides = [{
                backgroundImage: 'assets/images/documents.jpg',
                text: 'ZYNOLO DOCUMENTS',
                subtext: 'Revolutionize your document management with ZYNOLO DOCUMENTS. Securely organize, store, and share files with ease while maintaining full control and compliance. Streamline workflows and enhance productivity with our user-friendly system.',
                company: 'D Tech (Pvt) Ltd'
            },
            {
                backgroundImage: 'assets/images/auth-bg.jpg',
                text: 'ZYNOLO PEOPLE',
                subtext: 'Streamline your workforce with our all-in-one HRM system designed to simplify every aspect of employee management. From onboarding to performance tracking, ZYNOLO PEOPLE creates a connected and efficient workplace where teams thrive.',
                company: 'D Tech (Pvt) Ltd'
            },
            {
                backgroundImage: 'assets/images/learn.jpg',
                text: 'ZYNOLO LMS',
                subtext: 'Empower your organization’s growth with a seamless Learning Management System built to inspire development. Deliver engaging training, track progress and foster a culture of continuous learning for your team.',
                company: 'D Tech (Pvt) Ltd'
            },
            {
                backgroundImage: 'assets/images/meating.jpg',
                text: 'ZYNOLO MEETUP',
                subtext: 'Simplify collaboration with smarter scheduling and meeting management tools. Plan, organize and run productive meetings effortlessly while keeping your team aligned and focused.',
                company: 'D Tech (Pvt) Ltd'
            }
        ];

        let currentSlide = 0;

        function updateSlide() {
            const slideshowContainer = document.getElementById('slideshow-container');
            const typingText = document.getElementById('typing-text');
            const typingSubtext = document.getElementById('typing-subtext');
            const typingCompany = document.getElementById('typing-company');

            const slide = slides[currentSlide];

            slideshowContainer.style.backgroundImage = `url('${slide.backgroundImage}')`;

            typingText.textContent = slide.text;
            typingSubtext.textContent = slide.subtext;
            typingCompany.textContent = slide.company;

            currentSlide = (currentSlide + 1) % slides.length;
        }

        updateSlide();
        setInterval(updateSlide, 3000);
    </script>


    <script src="assets/js/vendor.min.js"></script>

    <script src="assets/js/app.min.js"></script>

</body>

</html>
