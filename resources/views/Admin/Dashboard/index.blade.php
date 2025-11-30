@extends('layout.dashboard')

@section('content')

<div class="container mt-4">

    <h2 class="mb-4">Dashboard Overview</h2>

    <!-- Stats Cards -->
    <div class="row">

        <!-- Classifications -->
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 border-0 bg-primary text-white">
                <h4>Classifications</h4>
                <h2>{{ $classifications }}</h2>
                <i class="fa fa-list fa-2x mt-2"></i>
            </div>
        </div>

        <!-- Types -->
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 border-0 bg-success text-white">
                <h4>Types</h4>
                <h2>{{ $type }}</h2>
                <i class="fa fa-tags fa-2x mt-2"></i>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3 border-0 bg-warning text-white">
                <h4>Categories</h4>
                <h2>{{ $categories }}</h2>
                <i class="fa fa-folder-open fa-2x mt-2"></i>
            </div>
        </div>

    </div>

    <!-- Chart Section -->
    <div class="card mt-5 shadow-sm">
        <div class="card-body">
            <h4 class="mb-3">Categories per Classification</h4>
            <canvas id="myChart" height="110"></canvas>
        </div>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartlabels) !!},
            datasets: [{
                label: 'Categories Count',
                data: {!! json_encode($chartValuuse) !!},
                borderWidth: 1,
                backgroundColor: '#0d6efd',
                borderColor: '#0b5ed7',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>

@endsection
