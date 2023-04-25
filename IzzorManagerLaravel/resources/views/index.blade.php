@extends('layouts.main')

@section('title', 'Inicio')

@section('head')
    <link rel="stylesheet" href="/css/index/index.css">
@endsection

@section('content')
    <div class="charts-container">
        <div class="chart-block">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection
@section('script-area')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/index/chart.js"></script>
@endsection
