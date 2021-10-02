@extends('layouts.stud')

@section('content')

 <div class="container">
     <div class="card">
         <div class="card-header"><h1><i class="nav-icon fas fa-bullhorn mr-2"></i>Announcements..</h1></div>
         <div class="body">

           
                @foreach ($course as $crs )
                    @foreach ($announce as $anc )
                        @if ($crs->id == $anc->course_id)
                        <div class="alert alert-info alert-dismissible fade show m-2" role="alert">
                            <strong>{{ $anc->title }}</strong>
                            <br>
                            {{ $anc->body }}
                            <br>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    @endforeach
                @endforeach
               
         
            
         </div>
     </div>
 </div>

   
@endsection