@extends('layouts.main')

@section('title', 'Inicio')

@section('head')
    <link rel="stylesheet" href="/css/index/index.css">
@endsection

@section('content')
    <div class="container">
        <div class="changelog">
        <h2>CHANGELOG</h2>
            <ul>
                <li>[17/05/2023] Alterado modelo da tabela de vendas.</li>
                <li>[17/05/2023] Novo design de tabelas em desenvolvimento.</li>
                <li>[17/05/2023] Changelog adicionado.</li>
                <li>[17/05/2023] Página inicial reformulada.</li>
            </ul>
        </div>
        <div class="charts-container">
            <h2>DASHBOARD</h2>
            <div class="chart-block">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection
@section('script-area')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/index/chart.js"></script>
@endsection
