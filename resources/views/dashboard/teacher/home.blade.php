@extends('layouts.teacher')

@section('content')
    <div class="content">
        <div class="row">
            @foreach ($courses as $crs)
                <div class="col">
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3>{{ $crs->students->count() }}</h3>
                            <p>{{ $crs->Name }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('teacher.teacher-payment', $crs->id) }}" class="small-box-footer">Payment Details
                            <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
