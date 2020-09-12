@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

<div class="bg-gray-50 py-15">
    <div class="container mx-auto px-5 sm:px-40">
        <div class="bg-white shadow sm:rounded-lg mb-5">
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
                        <a href="/stats" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Overview
                        </a>
                        <a href="/stats/revenue" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Revenue
                        </a>
                        <a href="/stats/expenses" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-700 bg-gray-200 focus:outline-none focus:bg-gray-200" aria-current="page">
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
        <div id="employees" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#employees" class="text-lg leading-6 font-medium text-white">
                        Employee Compensation
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_employees"></canvas>
                </div>
            </div>
        </div>
        <div id="food" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#food" class="text-lg leading-6 font-medium text-white">
                        Catering Expense
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_food"></canvas>
                </div>
            </div>
        </div>
        <div id="textbooks" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#texbooks" class="text-lg leading-6 font-medium text-white">
                        Textbooks
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_textbooks"></canvas>
                </div>
            </div>
        </div>
        <div id="scholarships" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#scholarships" class="text-lg leading-6 font-medium text-white">
                        Scholarships
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_scholarships"></canvas>
                </div>
            </div>
        </div>
        <div id="technology" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#technology" class="text-lg leading-6 font-medium text-white">
                        Technology
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_technology"></canvas>
                </div>
            </div>
        </div>
        <div id="legal" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#legal" class="text-lg leading-6 font-medium text-white">
                        Legal Fees
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_legal"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
var ctx = document.getElementById('s_employees');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($employees as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($employees as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_food');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($food as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($food as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_textbooks');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($textbooks as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($textbooks as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_scholarships');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($scholarships as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($scholarships as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_technology');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($technology as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($technology as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_legal');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($legal as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($legal as $key => $value){ echo $value.',';}?>],
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
</script>
@endsection