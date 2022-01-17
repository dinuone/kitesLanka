@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-dark"><i class="far fa-chart-bar mr-2"></i>Junior Spoken English</div>
                    <div class="card-body">
                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
@endsection
