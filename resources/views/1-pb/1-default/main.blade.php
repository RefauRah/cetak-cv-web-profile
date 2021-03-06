<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('/1-pb/1-default/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="{{ url('/1-pb/1-default/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('/1-pb/1-default/css/resume.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Clarence Taylor</span>
        <span class="d-none d-lg-block">
            @if($profile->foto == "default.png")
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ url('/images/default.png') }}" alt="{{$profile->nama_profile}}">
            @else
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ Storage::url($profile->foto) }}" alt="{{$profile->nama_profile}}">
            @endif
        </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#education">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
            <h1 class="mb-0">{{ $profile->nama_profile }}
            </h1>
            <div class="subheading mb-5">{{$profile->tempat_lhr_profile}}, {{$profile->tgl_lhr_profile}} · {{$profile->work}} · {{$profile->tlp_profile}} ·
                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
            </div>
            <p class="lead mb-5"><br />{{$profile->alamat}}</p>
            {{--
            <div class="social-icons">
                <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
            --}}
        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
            <h2 class="mb-5">Experience</h2>

            @foreach($experience as $data)
            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">{{ $data->work }}</h3>
                    <div class="subheading mb-3">{{ $data->from_experience }}</div>
                    {{--<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>--}}
                </div>
                <div class="resume-date text-md-right">
                    <span class="text-primary">{{ $data->date_first_experience }} - {{ $data->date_last_experience }}</span>
                </div>
            </div>
            @endforeach

        </div>

    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
            <h2 class="mb-5">Education</h2>

            @foreach($education as $data)
            <div class="resume-item d-flex flex-column flex-md-row mb-5">
                <div class="resume-content mr-auto">
                    <h3 class="mb-0">{{ $data->from_education}}</h3>
                    <div class="subheading mb-3">{{ $data->education }}</div>
                    {{--<div>Computer Science - Web Development Track</div>--}}
                    {{--<p>GPA: 3.23</p>--}}
                </div>
                {{--
                <div class="resume-date text-md-right">
                    <span class="text-primary">August 2006 - May 2010</span>
                </div>
                --}}
            </div>
            @endforeach


        </div>
    </section>

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
            <h2 class="mb-5">Skills</h2>

            <div class="subheading mb-3">Programming Languages &amp; Tools</div>
            <ul class="list-inline dev-icons">
                @foreach($skill as $data)
                <li class="list-inline-item">
                    {{$data->skill}}
                </li>
                @endforeach
            </ul>

            {{--<div class="subheading mb-3">Workflow</div>
            <ul class="fa-ul mb-0">
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Mobile-First, Responsive Design</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Cross Browser Testing &amp; Debugging</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Cross Functional Teams</li>
                <li>
                    <i class="fa-li fa fa-check"></i>
                    Agile Development &amp; Scrum</li>
            </ul>--}}
        </div>
    </section>

    {{--<hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
            <h2 class="mb-5">Interests</h2>
            <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
            <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
        </div>
    </section>--}}

    <hr class="m-0">

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
            <h2 class="mb-5">Awards &amp; Certifications</h2>
            <ul class="fa-ul mb-0">
                @foreach($award as $data)
                <li>
                    <i class="fa-li fa fa-trophy text-warning"></i>
                    {{$data->award.' - '.$data->description_award}}</li>
                @endforeach
            </ul>
        </div>
    </section>

</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ url('/1-pb/1-default/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/1-pb/1-default/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="{{ url('/1-pb/1-default/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="{{ url('/1-pb/1-default/js/resume.min.js') }}"></script>

</body>

</html>
