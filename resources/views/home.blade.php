@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<!-- Content Row -->
<div class="row">

    <!-- Earnings Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">$40,000</div>
            </div>
        </div>
    </div>

    <!-- Earnings Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-success text-uppercase mb-1">Earnings (Annual)</div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">$215,000</div>
            </div>
        </div>
    </div>

    <!-- Task Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-info text-uppercase mb-1">Tasks</div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">50</div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-warning text-uppercase mb-1">Pending Requests</div>
                <div class="h3 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg-8">
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
            </div>
            <div class="card-body">
                <p>Selamat datang di dashboard SBAdmin2 Anda!</p>
                <p class="mb-0">Anda berhasil login dan terhubung dengan SBAdmin2. Template ini siap digunakan untuk membangun admin panel yang profesional.</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <!-- Pie Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="https://undadvisors.com/corporate/templates/sbadmin/img/undraw_pie_chart.svg" alt="...">
                </div>
                <p class="text-center mb-0">Grafik revenue sources akan ditampilkan di sini.</p>
            </div>
        </div>
    </div>

</div>
@endsection
