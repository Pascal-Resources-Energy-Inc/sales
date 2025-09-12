@extends('layouts.header')
@section('css')
  <style>

    .back-btn {
      background: none;
      border: none;
      color: #666;
      font-size: 18px;
      cursor: pointer;
      padding: 5px;
      transition: color 0.2s ease;
    }

    .back-btn:hover {
      color: #4A90E2;
    }

    .filter-section {
      background: #fff;
      padding: 15px 20px;
      border-bottom: 1px solid #eee;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
    }

    .filter-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .filter-icon {
      color: #4A90E2;
      font-size: 16px;
    }

    .filter-text {
      font-size: 16px;
      font-weight: 500;
      color: #333;
    }

    .filter-arrow {
      color: #666;
      font-size: 14px;
      transition: transform 0.2s ease;
    }

    .filter-section.active .filter-arrow {
      transform: rotate(90deg);
    }

    .date-display {
      background: #fff;
      padding: 15px 20px;
      border-bottom: 8px solid #f0f0f0;
      font-size: 14px;
      color: #666;
    }

    .reports-list {
    background: transparent; /* remove solid bg */
    padding: 15px;
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  .report-item {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .report-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.12);
  }

  .report-info {
    flex-grow: 1;
  }

  .report-title {
    font-size: 16px;
    font-weight: 700;
    color: #2d2d2d;
    margin-bottom: 4px;
  }

  .report-subtitle {
    font-size: 14px;
    color: #666;
  }

  .report-actions {
    display: flex;
    gap: 8px;
  }

  .report-btn {
    padding: 6px 14px;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .report-btn.pdf {
    background: #4A90E2;
    color: #fff;
  }

  .report-btn.excel {
    background: #28a745;
    color: #fff;
  }

  @media (max-width: 480px) {
    .report-item {
      flex-direction: column;
      align-items: flex-start;
      gap: 12px;
    }
    .report-actions {
      align-self: flex-end;
    }
  }
  </style>
@endsection

@section('content')
<div class="reports-page">
  <div class="content-area-fix">
    <!-- Header -->
    <div class="page-header">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Reports</h1>
    </div>

    <!-- Filter Section -->
    <div class="filter-section" onclick="toggleFilterModal()">
      <div class="filter-left">
        <i class="bi bi-funnel filter-icon"></i>
        <span class="filter-text">Filter Date & Time</span>
      </div>
      <i class="bi bi-chevron-right filter-arrow"></i>
    </div>

    <!-- Current Date Display -->
    <div class="date-display" id="current-date">
      Sunday, August 2, 2020
    </div>

    <!-- Reports List -->
    <div class="reports-list">
      <div class="report-item">
        <div class="report-info">
          <div class="report-title">DCC</div>
          <div class="report-subtitle">Daily Closing Checklist</div>
        </div>
        <div class="report-actions">
          <a href="#" class="report-btn pdf">Generate</a>
          <a href="#" class="report-btn excel">Excel</a>
        </div>
      </div>

      <div class="report-item">
        <div class="report-info">
          <div class="report-title">DSRR</div>
          <div class="report-subtitle">Daily Sales Remittance Report</div>
        </div>
        <div class="report-actions">
          <a href="#" class="report-btn pdf">PDF</a>
          <a href="#" class="report-btn excel">Excel</a>
        </div>
      </div>

      <div class="report-item">
        <div class="report-info">
          <div class="report-title">PCV</div>
          <div class="report-subtitle">Petty Cash Voucher</div>
        </div>
        <div class="report-actions">
          <a href="#" class="report-btn excel">Manual</a>
        </div>
      </div>

      <div class="report-item">
        <div class="report-info">
          <div class="report-title">PCFRR</div>
          <div class="report-subtitle">Petty Cash Fund Replenishment Report</div>
        </div>
        <div class="report-actions">
          <a href="#" class="report-btn pdf">PDF</a>
          <a href="#" class="report-btn excel">Excel</a>
        </div>
      </div>
      <div class="report-item">
        <div class="report-info">
          <div class="report-title">ALR</div>
          <div class="report-subtitle">Accomplishment Log Report</div>
        </div>
        <div class="report-actions">
          <a href="#" class="report-btn pdf">PDF</a>
          <a href="#" class="report-btn excel">Excel</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script>
  function toggleFilterModal() {
    document.getElementById('filter-modal').classList.toggle('active');
  }
  function closeFilterModal() {
    document.getElementById('filter-modal').classList.remove('active');
  }
  function applyFilter() {
    closeFilterModal();
    alert("Filter applied!");
  }
</script>
@endsection
