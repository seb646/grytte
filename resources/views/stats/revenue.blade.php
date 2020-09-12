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
                        <a href="/stats" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
                            Overview
                        </a>
                        <a href="/stats/revenue" class="block sm:inline-block mr-4 px-3 py-2 font-medium text-sm leading-5 rounded-md text-gray-700 bg-gray-200 hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100">
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
        <div id="tuition" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#tuition" class="text-lg leading-6 font-medium text-white">
                        Tuition
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_tuition"></canvas>
                </div>
            </div>
        </div>
        <div id="donations" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#donations" class="text-lg leading-6 font-medium text-white">
                        Donations
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_donations"></canvas>
                </div>
            </div>
        </div>
        <div if="investments" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#investments" class="text-lg leading-6 font-medium text-white">
                        Investment Portfolio
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_investments"></canvas>
                </div>
            </div>
        </div>
        <div id="fundraising" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#fundraising" class="text-lg leading-6 font-medium text-white">
                        Fundraising Events
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_fundraising"></canvas>
                </div>
            </div>
        </div>
        <div id="grants" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#grants" class="text-lg leading-6 font-medium text-white">
                        Government Grants
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_grants"></canvas>
                </div>
            </div>
        </div>
        <div id="app_fees" class="bg-white shadow overflow-hidden rounded-lg mt-12">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6 bg-gray-600">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-no-wrap">
                    <div class="ml-4 mt-4">
                      <a href="#app_fees" class="text-lg leading-6 font-medium text-white">
                        Application Fees
                      </a>
                    </div>
                </div>
            </div>
            <div class="px-4 py-5 sm:px-6">
                <div class="w-full">
                    <canvas id="s_app_fees"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script>
var ctx = document.getElementById('s_tuition');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($tuition as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($tuition as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_donations');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($donations as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($donations as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_investments');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($investments as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($investments as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_fundraising');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($fundraising as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($fundraising as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_grants');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($grants as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($grants as $key => $value){ echo $value.',';}?>],
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

var ctx = document.getElementById('s_app_fees');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php foreach($app_fees as $key => $value){ echo $key.',';}?>],
        datasets: [{
            label: 'USD',
            data: [<?php foreach($app_fees as $key => $value){ echo $value.',';}?>],
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