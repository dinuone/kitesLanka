<div>
   <div class="content">
    <div class="row">
        @foreach ($courses as $crs )
        <div class="col-md-4 col-sm-6"> 
            <div class="card">
                <div class="card-header">{{ $crs->Name }}</div>
                <div class="card-body">
                    <img class="card-img-top center" src="{{ asset('assets/img/about.jpg') }}" alt="Card image cap"> 
                    <hr>
                    <button class="btn btn-primary" wire:click="OpenClassLinkModal({{ $crs->id}})">Class Link</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   </div>
   @include('modals.stud-classLink')
</div>
