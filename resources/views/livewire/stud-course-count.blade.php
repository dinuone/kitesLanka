<div>
    <div class="row">
        @foreach ($courses as $course )
        <div class="col-3">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="far fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">{{ $course->Name }}</span>
                <h2 class="info-box-number">{{ $course->students->count(); }}</h2>
            </div>
            <!-- /.info-box-content -->
        </div>
        </div>
        @endforeach 
    </div>
</div>
