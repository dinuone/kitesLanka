@extends('layouts.stud')

@section('content')
<style>
    #reg{padding-top: 10px;}
    #crs{margin-bottom: -10px;}
</style>

<section id="reg">
<div class="container">
<div class="card shadow">
    <div class="card-header bg-secondary text-white">Student Registration </div>
    <div class="card-body">
        <form action="{{ route('student.course-save') }}" method="POST">
            @csrf
            @foreach ($student as $std)
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control"  value="{{ $std->FullName }}" readonly>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Whatsapp Number</label>
                        <input type="text" name="contact1" class="form-control"  value="{{ $std->contact_whatsapp }}" readonly>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact2" class="form-control" value="{{ $std->contact }}" readonly>
                        @error('contact2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    @foreach ($course as $crs)
                    <div class="form-group">
                        <label for="">Selected Course</label>
                        <input type="hidden" value="{{ $crs->id }}" name="course">
                        <input type="text" name="email" class="form-control"  value="{{ $crs->Name }}" readonly>
                    </div> 
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="text" name="email" class="form-control"  value="{{ $std->email }}" readonly>
                    </div> 
                </div>
            
            </div>
            @endforeach        
              <div class="form-group">
                <button type="submit" class="btn btn-success">Register</button>
              </div>
        </form> 
    </div>
  </div>
</div>


</section>
@endsection