@extends('layouts.header')

@section('content')
<div class="transaction-history-page">
  <div class="content-area-fix">
    <!-- Page Header -->
    <div class="page-header-nya">
      <button class="back-btn btn btn-link p-0" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title mb-0">Transaction History</h1>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
      <button class="filter-btn btn w-100 d-flex align-items-center justify-content-between" onclick="openFilterModal()">
        <div class="filter-icon d-flex align-items-center">
          <i class="bi bi-sliders me-2"></i>
          <span>Filter Date & Time</span>
        </div>
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>

    <!-- Transactions Container -->
    <div id="transactions-container">
      <!-- Sunday, August 2, 2020 -->
      <div class="transaction-group">
        <div class="group-header d-flex justify-content-between align-items-center">
          <span class="group-date">Sunday, August 2, 2020</span>
          <span class="group-total">₱2390.99</span>
        </div>
        
        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>

        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>

        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>
      </div>

      <!-- Saturday, August 3, 2020 -->
      <div class="transaction-group">
        <div class="group-header d-flex justify-content-between align-items-center">
          <span class="group-date">Saturday, August 3, 2020</span>
          <span class="group-total">₱1190.99</span>
        </div>
        
        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>

        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>

        <div class="transaction-card d-flex justify-content-between align-items-start">
          <div class="transaction-details flex-grow-1">
            <div class="transaction-name">Andrea Austero</div>
            <div class="transaction-info">10:00 AM - Sales Invoice</div>
          </div>
          <div class="transaction-actions d-flex gap-2 align-items-center">
            <button class="transaction__badge transaction__badge--cash btn">Cash</button>
            <button class="transaction__badge transaction__badge--paid btn">PAID</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Modal -->
    <div id="filterModal" class="filter-modal">
      <div class="filter-modal__dialog">
        <div class="filter-modal__header d-flex justify-content-between align-items-center border-bottom">
          <h2 class="filter-modal__title mb-0">Reset</h2>
          <button class="filter-modal__close btn btn-link p-0" onclick="closeFilterModal()">
            <i class="bi bi-x"></i>
          </button>
        </div>

        <div class="filter-modal__body">
          <div class="filter-modal__option mb-3">
            <label class="filter-modal__radio d-flex align-items-center position-relative">
              <input type="radio" name="dateFilter" value="90days" checked class="position-absolute opacity-0">
              <span class="filter-modal__radio-text flex-grow-1">in the last 90 days</span>
              <span class="filter-modal__radio-indicator"></span>
            </label>
          </div>

          <div class="filter-modal__option mb-3">
            <label class="filter-modal__radio d-flex align-items-center position-relative">
              <input type="radio" name="dateFilter" value="custom" class="position-absolute opacity-0">
              <span class="filter-modal__radio-text flex-grow-1">Choose the date</span>
              <span class="filter-modal__radio-indicator"></span>
            </label>
          </div>

          <div class="filter-modal__date-range" id="dateRangeSection">
            <div class="row g-3">
              <div class="col-6">
                <div class="filter-modal__input-group d-flex flex-column">
                  <label class="filter-modal__label">Starting from</label>
                  <input type="date" class="filter-modal__input form-control" id="startDate">
                </div>
              </div>

              <div class="col-6">
                <div class="filter-modal__input-group d-flex flex-column">
                  <label class="filter-modal__label">Until</label>
                  <input type="date" class="filter-modal__input form-control" id="endDate">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="filter-modal__footer">
          <button class="filter-modal__submit btn w-100" onclick="applyFilter()">Filter</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<style>
  .transaction-history-page {
    background: #F7F8FA;
    min-height: 100vh;
  }

  .back-btn {
    background: none;
    border: none;
    color: #666;
    font-size: 18px;
    cursor: pointer;
    padding: 5px;
    transition: color 0.2s ease;
    text-decoration: none;
  }

  .back-btn:hover {
    color: #4A90E2;
  }

  .page-header-nya {
    background: #fff;
    padding: 20px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px !important;
    position: relative;
    outline: 0.2px solid #e1e1e1ff;
  }

  .page-title {
    font-size: 20px;
    font-weight: 600;
    color: #4A90E2;
    margin: 0;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }

  .filter-section {
    background: #fff;
    margin-top: -9px;
    margin-bottom: 15px;
  }

  .filter-btn {
    width: 100%;
    background: none;
    border: none;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 500;
    transition: background-color 0.2s ease;
    text-align: left;
  }

  .filter-btn:hover {
    background: #f8f9fa;
  }

  .filter-icon {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  /* Filter Modal Styles */
  .filter-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999 !important;
    align-items: flex-end;
    justify-content: center;
  }

  .filter-modal.active {
    display: flex;
  }

  .filter-modal__dialog {
    background: #fff;
    border-radius: 20px 20px 0 0;
    width: 100%;
    max-width: 500px;
    animation: slideUP 0.3s ease-out;
  }

  @keyframes slideUP {
    from {
      transform: translateY(100%);
    }
    to {
      transform: translateY(0);
    }
  }

  .filter-modal__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #e8e8e8;
  }

  .filter-modal__title {
    font-size: 20px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
  }

  .filter-modal__close {
    background: none;
    border: none;
    font-size: 28px;
    color: #2c3e50;
    cursor: pointer;
    padding: 0;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s ease;
    text-decoration: none;
  }

  .filter-modal__close:hover {
    color: #7f8c8d;
  }

  .filter-modal__body {
    padding: 24px;
  }

  .filter-modal__option {
    margin-bottom: 20px;
  }

  .filter-modal__radio {
    display: flex;
    align-items: center;
    cursor: pointer;
    position: relative;
    font-size: 16px;
    color: #2c3e50;
    padding: 4px 0;
  }

  .filter-modal__radio input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  .filter-modal__radio-text {
    flex: 1;
    font-weight: 400;
  }

  .filter-modal__radio-indicator {
    width: 24px;
    height: 24px;
    border: 2px solid #d1d5db;
    border-radius: 50%;
    position: relative;
    transition: all 0.2s ease;
  }

  .filter-modal__radio input[type="radio"]:checked ~ .filter-modal__radio-indicator {
    border-color: #5dade2;
    background: #fff;
  }

  .filter-modal__radio input[type="radio"]:checked ~ .filter-modal__radio-indicator::after {
    content: '';
    position: absolute;
    width: 12px;
    height: 12px;
    background: #5dade2;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .filter-modal__date-range {
    margin-top: 20px;
    opacity: 0.5;
    pointer-events: none;
    transition: opacity 0.2s ease;
  }

  .filter-modal__date-range.active {
    opacity: 1;
    pointer-events: auto;
  }

  .filter-modal__input {
    background: #f8f9fa;
    border: none;
    border-radius: 8px;
    padding: 12px 14px;
    font-size: 14px;
    color: #2c3e50;
    font-weight: 500;
    cursor: pointer;
    width: 100%;
  }

  .filter-modal__input:focus {
    outline: 2px solid #5dade2;
    outline-offset: 0;
    box-shadow: none;
    background: #f8f9fa;
  }

  .filter-modal__input-group {
    display: flex;
    flex-direction: column;
  }

  .filter-modal__label {
    font-size: 13px;
    color: #95a5a6;
    margin-bottom: 8px;
    font-weight: 400;
  }

  .filter-modal__footer {
    padding: 16px 24px 24px;
  }

  .filter-modal__submit {
    width: 100%;
    background: #5dade2;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 16px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .filter-modal__submit:hover {
    background: #3498db;
  }

  @media (max-width: 480px) {
    .filter-modal__dialog {
      max-width: 100%;
    }
  }

  .transaction-group {
    margin-bottom: 25px;
    padding: 0 20px;
  }

  .group-header {
    padding: 15px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0px;
  }

  .group-date {
    font-size: 15px;
    font-weight: 600;
    color: #2c3e50;
  }

  .group-total {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
  }

  .transaction-card {
    background: #fff;
    padding: 24px 20px;
    border-radius: 12px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
    transition: all 0.2s ease;
  }

  .transaction-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
  }

  .transaction-details {
    flex-grow: 1;
  }

  .transaction-name {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 6px;
  }

  .transaction-info {
    font-size: 14px;
    color: #7f8c8d;
    font-weight: 400;
  }

  .transaction-actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  /* Transaction Badge Styles */
  .transaction__badge {
    padding: 10px 24px;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-transform: capitalize;
    min-width: 80px;
  }

  .transaction__badge--cash {
    background: #5dade2;
    color: #fff;
  }

  .transaction__badge--cash:hover {
    background: #3498db !important;
  }

  .transaction__badge--paid {
    background: #e74c3c;
    color: #fff;
    text-transform: uppercase;
  }

  .transaction__badge--paid:hover {
    background: #c0392b !important;
  }

  @media (max-width: 480px) {
    .transaction-group {
      padding: 0 15px;
    }

    .transaction-card {
      padding: 18px 16px;
      position: relative;
    }
    
    .transaction-details {
      width: calc(100% - 180px);
      padding-right: 10px;
    }

    .transaction-actions {
      position: absolute;
      top: 18px;
      right: 16px;
    }

    .transaction__badge {
      padding: 8px 20px;
      font-size: 13px;
      min-width: 70px;
    }
    
    .transaction-name {
      font-size: 16px;
    }
    
    .transaction-info {
      font-size: 13px;
    }
    
    .group-header {
      padding: 12px 0;
    }
    
    .page-header-nya {
      padding: 15px;
    }
    
    .page-title {
      font-size: 18px;
    }

    .group-date {
      font-size: 14px;
    }

    .group-total {
      font-size: 16px;
    }
  }
</style>

<script>
  function openFilterModal() {
    document.getElementById('filterModal').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeFilterModal() {
    document.getElementById('filterModal').classList.remove('active');
    document.body.style.overflow = '';
  }

  function applyFilter() {
    console.log('Filter applied');
    closeFilterModal();
  }

  // Handle radio button changes
  document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('input[name="dateFilter"]');
    const dateRangeSection = document.getElementById('dateRangeSection');

    radioButtons.forEach(radio => {
      radio.addEventListener('change', function() {
        if (this.value === 'custom') {
          dateRangeSection.classList.add('active');
        } else {
          dateRangeSection.classList.remove('active');
        }
      });
    });

    // Close modal when clicking outside
    document.getElementById('filterModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeFilterModal();
      }
    });
  });
</script>
@endsection