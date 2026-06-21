<!-- admin/dashboard/index.blade.php -->
@extends('layout.dashboard')

@section('content')
<div class="container-fluid">
    <div class="top-bar-royal mb-4">
        <div>
            <h1 class="page-title-royal mb-2">Dashboard Overview</h1>
            <div class="breadcrumb-royal">
                <a href="{{ route('dashboard.index') }}">Home</a>
                <span class="separator">/</span>
                <span>Dashboard</span>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stat-royal">
                <div class="stat-icon-royal primary mb-3">
                    <i class="fas fa-list-ol"></i>
                </div>
                <h6 class="text-muted mb-1">Classifications</h6>
                <h2 class="fw-bold mb-0">{{ $classifications }}</h2>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="stat-royal">
                <div class="stat-icon-royal mb-3" style="background: linear-gradient(135deg, var(--purple-400), #A78BFA);">
                    <i class="fas fa-tags"></i>
                </div>
                <h6 class="text-muted mb-1">Types</h6>
                <h2 class="fw-bold mb-0">{{ $type }}</h2>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="stat-royal">
                <div class="stat-icon-royal mb-3" style="background: linear-gradient(135deg, #D946EF, #C026D3);">
                    <i class="fas fa-folder"></i>
                </div>
                <h6 class="text-muted mb-1">Categories</h6>
                <h2 class="fw-bold mb-0">{{ $categories }}</h2>
            </div>
        </div>
    </div>

    <div class="royal-card">
        <h5 class="fw-bold mb-4">Categories per Classification</h5>
        <div style="height: 300px;">
            <canvas id="classificationChart"></canvas>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('classificationChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartlabels),
                datasets: [{
                    label: 'Categories Count',
                    data: @json($chartValuuse),
                    backgroundColor: 'rgba(115, 193, 108, 0.7)',
                    borderColor: 'rgba(115, 193, 108, 0.7)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
@endsection