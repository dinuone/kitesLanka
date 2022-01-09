@extends('layouts.app')

@section('content')

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h1>Courses</h1>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($teachers as $teacher)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-3">
                            <div class="course-item">
                                <img src="{{ asset('storage/' . $teacher->image_path) }}" class="img-fluid" alt="...">
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="price">English</p>
                                    </div>

                                    <h3><a
                                            href="{{ route('student-select-teacher', $teacher->id) }}">{{ $teacher->fullname }}</a>
                                    </h3>

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
