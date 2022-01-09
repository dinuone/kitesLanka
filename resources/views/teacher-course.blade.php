@extends('layouts.app')

@section('content')

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Courses</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($thcourse as $course)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-3">
                            <div class="course-item">
                                <img src="{{ asset('storage/' . $course->image_path) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="price">Rs.1500</p>
                                    </div>

                                    <h3><a
                                            href="{{ route('student-select-course', $course->id) }}">{{ $course->Name }}</a>
                                    </h3>
                                    <p>{{ $course->description }}</p>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                            <span>{{ $course->teacher->fullname }}</span>
                                        </div>
                                        <div class="trainer-rank d-flex align-items-center">
                                            <i class="bx bx-user"></i>&nbsp;50
                                            &nbsp;&nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>

            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->
    @include('layouts.footer')


@endsection
