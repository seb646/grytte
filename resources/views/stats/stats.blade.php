@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

<div class="bg-gray-50 py-15">
    <div class="container mx-auto px-5 sm:px-40">
        <div class="bg-white shadow rounded-lg mb-5">
            <div class="px-4 py-5 sm:p-6">
              <h2 class="text-2xl leading-6 font-medium text-gray-900">
                Statistics
              </h2>
              <div class="mt-3 max-w-2xl text-sm leading-5 text-gray-500">
                <p>
                  The trends attributed to the overall financial health of The Browning School. View how the organization's revenue, expenses, and employee compensation have changed over time.
                </p>
              </div>
              <div class="mt-5 text-sm leading-5">
                <div>
                    <div class="block">
                      <nav class="smLflex">
                        <a href="/stats" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-700 bg-gray-200  hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Overview
                        </a>
                        <a href="/stats/revenue" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Revenue
                        </a>
                        <a href="/stats/expenses" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 focus:outline-none focus:bg-gray-200" aria-current="page">
                            Expenses
                        </a>
                        <a href="/stats/employees" class="block sm:inline-block px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Employee Compensation
                        </a>
                      </nav>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div id="revenue" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#revenue" class="text-lg leading-6 font-medium text-white">
                        Revenue
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_revenue"></canvas>
                </div>
            </div>
        </div>
        <div id="expenses" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#expenses" class="text-lg leading-6 font-medium text-white">
                        Expenses
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_expenses"></canvas>
                </div>
            </div>
        </div>
        <div id="income" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#income" class="text-lg leading-6 font-medium text-white">
                        Net Income
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_income"></canvas>
                </div>
            </div>
        </div>
        <div id="assets" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#assets" class="text-lg leading-6 font-medium text-white">
                        Assets
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_assets"></canvas>
                </div>
            </div>
        </div>
        <div id="liabilities" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#liabilities" class="text-lg leading-6 font-medium text-white">
                        Liabilities
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_liabilities"></canvas>
                </div>
            </div>
        </div>
        <div id="net_assets" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#net_assets" class="text-lg leading-6 font-medium text-white">
                        Net Assets
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_net_assets"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
var ctx = document.getElementById('s_revenue');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($revenue as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($revenue as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(104, 211, 145, .2)',
            ],
            borderColor: [
                'rgba(104, 211, 145, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});

var ctx = document.getElementById('s_expenses');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($expenses as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($expenses as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});

var ctx = document.getElementById('s_income');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($income as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($income as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(104, 211, 145, .2)',
            ],
            borderColor: [
                'rgba(104, 211, 145, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});

var ctx = document.getElementById('s_assets');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($assets as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($assets as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(104, 211, 145, .2)',
            ],
            borderColor: [
                'rgba(104, 211, 145, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});

var ctx = document.getElementById('s_liabilities');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($liabilities as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($liabilities as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});

var ctx = document.getElementById('s_net_assets');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($net_assets as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($net_assets as $key => $value){ echo $value.',';}?>],
            backgroundColor: [
                'rgba(104, 211, 145, .2)',
            ],
            borderColor: [
                'rgba(104, 211, 145, 1)',
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(value, index, values) {
                        value = value.toString();
                        value = value.split(/(?=(?:...)*$)/);
                        value = value.join(',');
                        return '$' + value;
                    }
                }
            }]
        },
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            callbacks: {
                label: function(tooltipItem, data) {
                    return '$' + tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }
        }
    }
});
</script>
@endsection