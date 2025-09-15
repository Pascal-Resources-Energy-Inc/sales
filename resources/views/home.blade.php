@extends('layouts.header')
@section('header')
<link rel="stylesheet" href="{{asset('design/assets/libs/jvectormap/jquery-jvectormap.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.40.0/tabler-icons.min.css" rel="stylesheet">
@endsection

<style>
.stats-card {
    background: white;
    border: none;
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    padding: 28px 24px;
    position: relative;
    margin-bottom: -27px;
    height: 160px;
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.04);
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.12);
}

.icon-circle {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    border: 2px solid #17a2b8 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    box-shadow: 0 4px 12px rgba(23, 162, 184, 0.15);
    transition: transform 0.3s ease;
}

.stats-card:hover .icon-circle {
    transform: scale(1.05);
}

.stats-number {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
    line-height: 1.2;
}

.stats-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
    margin-bottom: 12px;
    letter-spacing: 0.3px;
}

.trend-indicator {
    position: absolute;
    top: 20px;
    right: 20px;
    color: #28a745;
    font-size: 0.8rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 4px 8px;
    border-radius: 12px;
    background: rgba(40, 167, 69, 0.1);
}

.trend-indicator.text-success { 
    color: #28a745 !important; 
    background: rgba(40, 167, 69, 0.1);
}

.trend-indicator.text-danger { 
    color: #dc3545 !important; 
    background: rgba(220, 53, 69, 0.1);
}

.trend-indicator.text-muted { 
    color: #6c757d !important; 
    background: rgba(108, 117, 125, 0.1);
}

.welcome {
    padding: 20px 0;
}

.welcome .row {
    gap: 20px 0;
}

.welcome .col-6,
.welcome .col-md-4,
.welcome .col-lg-2 {
    padding: 0 10px;
    margin-bottom: 20px;
}

.best-seller {
    margin-top: 20px !important;
}

.best-seller .card {
    border-radius: 20px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    padding: 32px;
    background: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid rgba(0,0,0,0.04);
    padding: 20px;
    width: 90%;
    margin: 0 auto;
}

}

.best-seller .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}

.best-seller .card-body {
    padding: 0;
}

.best-seller h6 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 24px !important;
}

.best-seller .mb-3 {
    margin-bottom: 2rem !important;
}

.best-seller .progress {
    border-radius: 12px;
    overflow: hidden;
    background: #f8f9fa;
    height: 12px;
    box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
}

.best-seller .progress-bar {
    border-radius: 12px;
    transition: width 0.6s ease;
}

.best-seller .fw-semibold {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.95rem;
}

.best-seller .text-muted.small {
    font-size: 0.85rem;
    color: #6c757d;
}

.best-seller .form-select {
    border-radius: 12px;
    border: 1px solid #e9ecef;
    padding: 8px 16px;
    font-size: 0.875rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04);
    transition: all 0.3s ease;
}

.best-seller .form-select:focus {
    border-color: #17a2b8;
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.15);
}
.fas { color: #17a2b8; }

@media (max-width: 768px) {
    .stats-card {
        height: 140px;
        padding: 20px 16px;
    }
    
    .stats-number {
        font-size: 1.5rem;
    }
    
    .welcome .col-6 {
        padding: 0 8px;
        margin-bottom: 16px;
    }
    
    .best-seller .card {
        transform: translateY(-5x);
        padding: 20px 20px;
        width: 90%;
    }
}

@media (max-width: 576px) {
    .stats-card {
        height: 130px;
        padding: 18px 14px;
    }
    
    .icon-circle {
        width: 44px;
        height: 44px;
        margin-bottom: 12px;
    }
    
    .stats-number {
        font-size: 1.3rem;
    }
    
    .stats-label {
        font-size: 0.8rem;
    }
}
</style>


@section('content')
<!-- Wrap the entire content in content-area class for proper bottom padding -->
<div class="content-area mt-3">
    <section class="welcome">
        <div class="container-fluid" style="max-width: 1400px; margin: 0 auto;">
        <div class="row g-1">
            <div class="col-6 col-md-5 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stats-number">8:00 AM</div>
                    <div class="stats-label">Time in</div>
                </div>
            </div>

            <!-- Card 2: Total Sales -->
            <div class="col-6 col-md-4 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="stats-number">₱{{ number_format(125000, 2) }}</div>
                    <div class="stats-label">Total sales</div>
                    <div class="trend-indicator text-success">
                        12.5% <i class="fas fa-arrow-trend-up"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3: Transactions -->
            <div class="col-6 col-md-4 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stats-number">{{ number_format(2450, 0) }}</div>
                    <div class="stats-label">Transactions</div>
                    <div class="trend-indicator text-success">
                        8.2% <i class="fas fa-arrow-trend-up"></i>
                    </div>
                </div>
            </div>

            <!-- Card 4: Cash on Hand -->
            <div class="col-6 col-md-4 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="stats-number">₱{{ number_format(15000, 2) }}</div>
                    <div class="stats-label">Cash on hand</div>
                </div>
            </div>

            <!-- Card 5: Remit -->
            <div class="col-6 col-md-4 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div class="stats-number">₱{{ number_format(8500, 2) }}</div>
                    <div class="stats-label">Remit</div>
                </div>
            </div>

            <!-- Card 6: Petty Cash -->
            <div class="col-6 col-md-4 col-lg-2 d-flex">
                <div class="card stats-card w-100 border-0">
                    <div class="icon-circle">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div class="stats-number">₱{{ number_format(2500, 2) }}</div>
                    <div class="stats-label">Petty cash</div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-seller mt-2">
        <div class="card border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Most Type of Order</h6>
                    <select class="form-select form-select-sm w-auto">
                        <option selected>Today</option>
                        <option>This Week</option>
                        <option>This Month</option>
                    </select>
                </div>

                <!-- Item 1 -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold">Gaz Lite Stove</span>
                        <span class="text-muted small">200 customers</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-red" style="width: 80%;"></div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold">Grill</span>
                        <span class="text-muted small">90 customers</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-blue" style="width: 45%;"></div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold">Torch</span>
                        <span class="text-muted small">160 customers</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-red" style="width: 65%;"></div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="fw-semibold">Other</span>
                        <span class="text-muted small">40 customers</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar progress-bar-blue" style="width: 20%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection