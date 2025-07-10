@extends('layouts.header')

@section('content')
<div class="transaction-history-page">
  <div class="content-area-fix">
    <div class="page-header-nya">
      <button class="back-btn" onclick="history.back()">
        <i class="bi bi-arrow-left"></i>
      </button>
      <h1 class="page-title">Transaction History</h1>
    </div>

    <div class="pull-refresh" id="pull-refresh">
      <i class="bi bi-arrow-clockwise"></i> Pull to refresh
    </div>

    <div class="filter-section">
      <button class="filter-btn" onclick="toggleDateFilter()">
        <div class="filter-icon">
          <i class="bi bi-sliders"></i>
          <span>Filter Date & Time</span>
        </div>
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>

    <div class="loading-spinner" id="loading-state" style="display: none;">
      <div class="spinner"></div>
      Loading transactions...
    </div>

    <div id="transactions-container"></div>

    <div class="empty-state" id="empty-state" style="display: none;">
      <div class="empty-icon">
        <i class="bi bi-receipt"></i>
      </div>
      <div class="empty-title">No Transactions Found</div>
      <div class="empty-subtitle">Your transaction history will appear here</div>
    </div>
  </div>
</div>
@endsection

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
    color: #333;
    margin: 0;
  }

  .filter-section {
    background: #fff;
    margin-top: -9px;
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
  }

  .filter-btn:hover {
    background: #f8f9fa;
  }

  .filter-icon {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .transaction-group {
    background: #fff;
    margin: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
  }

  .group-header {
    padding: 15px 20px;
    background: #f8f9fa;
    border-bottom: 1px solid #e1e8ed;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .group-date {
    font-size: 14px;
    font-weight: 600;
    color: #666;
  }

  .group-total {
    font-size: 14px;
    font-weight: 700;
    color: #4A90E2;
  }

  .transaction-item {
    padding: 20px;
    border-bottom: 1px solid #f5f5f5;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.2s ease;
    cursor: pointer;
  }

  .transaction-item:last-child {
    border-bottom: none;
  }

  .transaction-item:hover {
    background: #f8f9fa;
  }

  .transaction-details {
    flex-grow: 1;
  }

  .transaction-amount {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 4px;
  }

  .transaction-info {
    font-size: 13px;
    color: #666;
  }

  .transaction-status {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 8px;
  }

  .status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
  }

  .status-paid {
    background: #e8f5e8;
    color: #28a745;
  }

  .status-pending {
    background: #fff3cd;
    color: #856404;
  }

  .status-failed {
    background: #f8d7da;
    color: #721c24;
  }

  .status-refunded {
    background: #e2e3e5;
    color: #6c757d;
  }

  .empty-state {
    background: #fff;
    margin: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    padding: 60px 20px;
    text-align: center;
  }

  .empty-icon {
    font-size: 48px;
    color: #ccc;
    margin-bottom: 16px;
  }

  .empty-title {
    font-size: 18px;
    font-weight: 600;
    color: #666;
    margin-bottom: 8px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .empty-subtitle {
    font-size: 14px;
    color: #999;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .loading-spinner {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    font-size: 16px;
    color: #666;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
  }

  .spinner {
    width: 24px;
    height: 24px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #4A90E2;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-right: 12px;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  @media (max-width: 480px) {
    .transaction-group {
      margin: 10px;
    }
    
    .transaction-item {
      padding: 16px;
    }
    
    .transaction-amount {
      font-size: 16px;
    }
    
    .transaction-info {
      font-size: 12px;
    }
    
    .group-header {
      padding: 12px 16px;
    }
    
    .page-header-nya {
      padding: 15px;
    }
    
    .page-title {
      font-size: 18px;
    }
  }

  .pull-refresh {
    padding: 20px;
    text-align: center;
    color: #4A90E2;
    font-size: 14px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background: #f8f9fa;
    margin: 15px;
    border-radius: 8px;
    display: none;
  }

  .pull-refresh.active {
    display: block;
  }
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let transactions = [];
    let filteredTransactions = [];
    
    // Initialize the page
    loadTransactions();
    
    // Load transactions from localStorage or generate sample data
    function loadTransactions() {
        showLoading();
        
        // Simulate API call delay
        setTimeout(() => {
            try {
                // Try to load from localStorage first
                const savedTransactions = localStorage.getItem('transactionHistory');
                if (savedTransactions) {
                    transactions = JSON.parse(savedTransactions);
                } else {
                    // Generate sample data if none exists
                    transactions = generateSampleTransactions();
                    localStorage.setItem('transactionHistory', JSON.stringify(transactions));
                }
                
                filteredTransactions = [...transactions];
                displayTransactions();
                hideLoading();
            } catch (error) {
                console.error('Error loading transactions:', error);
                showEmptyState();
                hideLoading();
            }
        }, 1000);
    }
    
    // Generate sample transaction data
    function generateSampleTransactions() {
        const sampleData = [
            {
                id: 'TRX010121113',
                amount: 320.99,
                time: '10:00 AM',
                date: '2024-08-02',
                status: 'paid',
                type: 'sale',
                customer: 'Walk-in Customer'
            },
            {
                id: 'TRX010121114',
                amount: 520.99,
                time: '05:00 PM',
                date: '2024-08-02',
                status: 'paid',
                type: 'sale',
                customer: 'Online Order'
            },
            {
                id: 'TRX010121115',
                amount: 420.99,
                time: '09:00 PM',
                date: '2024-08-02',
                status: 'paid',
                type: 'sale',
                customer: 'Walk-in Customer'
            },
            {
                id: 'TRX010121116',
                amount: 120.99,
                time: '11:00 AM',
                date: '2024-08-03',
                status: 'paid',
                type: 'sale',
                customer: 'Walk-in Customer'
            },
            {
                id: 'TRX010121117',
                amount: 520.99,
                time: '10:00 AM',
                date: '2024-08-03',
                status: 'paid',
                type: 'sale',
                customer: 'Online Order'
            },
            {
                id: 'TRX010121118',
                amount: 620.99,
                time: '08:00 AM',
                date: '2024-08-03',
                status: 'paid',
                type: 'sale',
                customer: 'Walk-in Customer'
            }
        ];
        
        return sampleData;
    }
    
    // Group transactions by date
    function groupTransactionsByDate(transactions) {
        const groups = {};
        
        transactions.forEach(transaction => {
            const date = transaction.date;
            if (!groups[date]) {
                groups[date] = [];
            }
            groups[date].push(transaction);
        });
        
        return groups;
    }
    
    // Format date for display
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        return date.toLocaleDateString('en-US', options);
    }
    
    // Calculate daily total
    function calculateDailyTotal(dayTransactions) {
        return dayTransactions.reduce((sum, transaction) => sum + transaction.amount, 0);
    }
    
    // Get status badge HTML
    function getStatusBadge(status) {
        const statusMap = {
            'paid': { class: 'status-paid', text: 'PAID' },
            'pending': { class: 'status-pending', text: 'PENDING' },
            'failed': { class: 'status-failed', text: 'FAILED' },
            'refunded': { class: 'status-refunded', text: 'REFUNDED' }
        };
        
        const statusInfo = statusMap[status] || statusMap['paid'];
        return `<span class="status-badge ${statusInfo.class}">${statusInfo.text}</span>`;
    }
    
    // Display transactions
    function displayTransactions() {
        const container = document.getElementById('transactions-container');
        
        if (filteredTransactions.length === 0) {
            showEmptyState();
            return;
        }
        
        hideEmptyState();
        
        const groupedTransactions = groupTransactionsByDate(filteredTransactions);
        let html = '';
        
        // Sort dates in descending order (newest first)
        const sortedDates = Object.keys(groupedTransactions).sort((a, b) => new Date(b) - new Date(a));
        
        sortedDates.forEach(date => {
            const dayTransactions = groupedTransactions[date];
            const dailyTotal = calculateDailyTotal(dayTransactions);
            
            html += `
                <div class="transaction-group">
                    <div class="group-header">
                        <span class="group-date">${formatDate(date)}</span>
                        <span class="group-total">₱${dailyTotal.toFixed(2)}</span>
                    </div>
            `;
            
            // Sort transactions by time (newest first)
            dayTransactions.sort((a, b) => {
                const timeA = convertTimeToMinutes(a.time);
                const timeB = convertTimeToMinutes(b.time);
                return timeB - timeA;
            });
            
            dayTransactions.forEach(transaction => {
                html += `
                    <div class="transaction-item" onclick="viewTransactionDetails('${transaction.id}')">
                        <div class="transaction-details">
                            <div class="transaction-amount">₱ ${transaction.amount.toFixed(2)}</div>
                            <div class="transaction-info">${transaction.time} - #${transaction.id}</div>
                        </div>
                        <div class="transaction-status">
                            ${getStatusBadge(transaction.status)}
                        </div>
                    </div>
                `;
            });
            
            html += '</div>';
        });
        
        container.innerHTML = html;
    }
    
    // Convert time string to minutes for sorting
    function convertTimeToMinutes(timeString) {
        const [time, period] = timeString.split(' ');
        const [hours, minutes] = time.split(':').map(Number);
        
        let totalMinutes = hours * 60 + minutes;
        if (period === 'PM' && hours !== 12) {
            totalMinutes += 12 * 60;
        } else if (period === 'AM' && hours === 12) {
            totalMinutes -= 12 * 60;
        }
        
        return totalMinutes;
    }
    
    // Show/hide loading state
    function showLoading() {
        document.getElementById('loading-state').style.display = 'flex';
        document.getElementById('transactions-container').style.display = 'none';
        document.getElementById('empty-state').style.display = 'none';
    }
    
    function hideLoading() {
        document.getElementById('loading-state').style.display = 'none';
        document.getElementById('transactions-container').style.display = 'block';
    }
    
    // Show/hide empty state
    function showEmptyState() {
        document.getElementById('empty-state').style.display = 'block';
        document.getElementById('transactions-container').style.display = 'none';
    }
    
    function hideEmptyState() {
        document.getElementById('empty-state').style.display = 'none';
    }
    
    // View transaction details
    window.viewTransactionDetails = function(transactionId) {
        const transaction = transactions.find(t => t.id === transactionId);
        if (transaction) {
            // Store transaction data for details page
            localStorage.setItem('selectedTransaction', JSON.stringify(transaction));
            
            // You can redirect to a transaction details page here
            // window.location.href = `/transaction-details/${transactionId}`;
            
            // For now, show an alert with transaction info
            alert(`Transaction Details:\n\nID: ${transaction.id}\nAmount: ₱${transaction.amount.toFixed(2)}\nDate: ${formatDate(transaction.date)}\nTime: ${transaction.time}\nStatus: ${transaction.status.toUpperCase()}\nCustomer: ${transaction.customer}`);
        }
    };
    
    // Filter functionality
    window.toggleDateFilter = function() {
        // For now, show a simple filter option
        const filterOptions = ['All Time', 'Today', 'This Week', 'This Month', 'Last 30 Days'];
        
        const selectedOption = prompt('Select filter option:\n' + filterOptions.map((option, index) => `${index + 1}. ${option}`).join('\n'));
        
        if (selectedOption && selectedOption >= 1 && selectedOption <= filterOptions.length) {
            applyDateFilter(filterOptions[selectedOption - 1]);
        }
    };
    
    // Apply date filter
    function applyDateFilter(filterType) {
        const now = new Date();
        let filteredData = [...transactions];
        
        switch (filterType) {
            case 'Today':
                const today = now.toISOString().split('T')[0];
                filteredData = transactions.filter(t => t.date === today);
                break;
            case 'This Week':
                const weekStart = new Date(now.setDate(now.getDate() - now.getDay()));
                filteredData = transactions.filter(t => new Date(t.date) >= weekStart);
                break;
            case 'This Month':
                const monthStart = new Date(now.getFullYear(), now.getMonth(), 1);
                filteredData = transactions.filter(t => new Date(t.date) >= monthStart);
                break;
            case 'Last 30 Days':
                const thirtyDaysAgo = new Date(now.getTime() - (30 * 24 * 60 * 60 * 1000));
                filteredData = transactions.filter(t => new Date(t.date) >= thirtyDaysAgo);
                break;
            default:
                filteredData = [...transactions];
        }
        
        filteredTransactions = filteredData;
        displayTransactions();
    }
    
    // Pull to refresh functionality
    let startY = 0;
    let isPulling = false;
    
    document.addEventListener('touchstart', function(e) {
        startY = e.touches[0].pageY;
    });
    
    document.addEventListener('touchmove', function(e) {
        const currentY = e.touches[0].pageY;
        const pullDistance = currentY - startY;
        
        if (pullDistance > 50 && window.scrollY === 0 && !isPulling) {
            isPulling = true;
            document.getElementById('pull-refresh').classList.add('active');
        }
    });
    
    document.addEventListener('touchend', function(e) {
        if (isPulling) {
            isPulling = false;
            document.getElementById('pull-refresh').classList.remove('active');
            
            // Refresh data
            loadTransactions();
        }
    });
    
    // Add some completed orders to transaction history if they exist
    const completedOrders = JSON.parse(localStorage.getItem('completedOrders') || '[]');
    if (completedOrders.length > 0) {
        // Convert completed orders to transaction format
        const orderTransactions = completedOrders.map(order => ({
            id: order.order_id.replace('#', '').replace('ORD-', 'TRX'),
            amount: order.total_amount,
            time: new Date(order.completed_at).toLocaleTimeString('en-US', { 
                hour: 'numeric', 
                minute: '2-digit',
                hour12: true 
            }),
            date: new Date(order.completed_at).toISOString().split('T')[0],
            status: 'paid',
            type: 'sale',
            customer: order.payment_method === 'gcash' ? 'GCash Payment' : 'Cash Payment'
        }));
        
        // Merge with existing transactions
        transactions = [...transactions, ...orderTransactions];
        localStorage.setItem('transactionHistory', JSON.stringify(transactions));
        filteredTransactions = [...transactions];
    }
});
</script>
@endsection