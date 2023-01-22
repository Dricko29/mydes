
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Kepala Desa')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
   <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row match-height">

    <!-- Statistics Card -->
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">@lang('Statistik Penduduk')</h4>
          <div class="d-flex align-items-center">
            <p class="card-text font-small-2 me-25 mb-0">{{ \Carbon\Carbon::now()->isoFormat('LLLL') }}</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $jmlPenduduk }} Jiwa</h4>
                  <p class="card-text font-small-3 mb-0">Penduduk</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="users" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $jmlKeluarga }} KK</h4>
                  <p class="card-text font-small-3 mb-0">Keluarga</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $jmlPendudukLaki }} Jiwa</h4>
                  <p class="card-text font-small-3 mb-0">Laki-Laki</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">{{ $jmlPendudukPerempuan }} Jiwa</h4>
                  <p class="card-text font-small-3 mb-0">Perempuan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
  </div>

  <div class="row match-height">
    <div class="col-lg-12 col-12">
      <div class="row match-height">

        <!-- Agama -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="card earnings-card">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <h4 class="card-title mb-1">Statistik Agama</h4>
                  <div class="font-small-2">{{ $dataAgamas['agamaMax']['nama'] }}</div>
                  <h5 class="mb-1">{{ $dataAgamas['agamaMax']['penduduk_count'] }} Jiwa</h5>
                  <p class="card-text text-muted font-small-2">
                    <span class="fw-bolder">{{ $dataAgamas['agamaMaxPersen'] }}%</span><span> dari total penduduk.</span>
                  </p>
                </div>
                <div class="col-6">
                  <div id="agama-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Agama -->

        <!-- Kawin -->
        <div class="col-lg-6 col-md-6 col-12">
          <div class="card earnings-card">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <h4 class="card-title mb-1">Statistik Kawin</h4>
                  <div class="font-small-2">{{ $dataKawins['kawinMax']['nama'] }}</div>
                  <h5 class="mb-1">{{ $dataKawins['kawinMax']['penduduk_count'] }} Jiwa</h5>
                  <p class="card-text text-muted font-small-2">
                    <span class="fw-bolder">{{ $dataKawins['kawinMaxPersen'] }}%</span><span> dari total penduduk.</span>
                  </p>
                </div>
                <div class="col-6">
                  <div id="kawin-chart"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Kawin -->

      </div>
    </div>

  </div>

</section>

<section id="chartjs-chart">
  <div class="row">
    <!--Bar Chart Start -->
    <div class="col-xl-12 col-12">
      <div class="card">
        <div
          class="
            card-header
            d-flex
            justify-content-between
            align-items-sm-center align-items-start
            flex-sm-row flex-column
          "
        >
          <div class="header-left">
            <h4 class="card-title">Statistik Penduduk Berdasarkan Pendidikan Terakhir</h4>
          </div>
          {{-- <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
            <i data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
              placeholder="YYYY-MM-DD"
            />
          </div> --}}
        </div>
        <div class="card-body">
          <canvas class="bar-chart-ex chartjs" data-height="300"></canvas>
        </div>
      </div>
    </div>
    <!-- Bar Chart End -->

    <!-- Horizontal Bar Chart Start -->
    <div class="col-xl-12 col-12">
      <div class="card">
        <div
          class="
            card-header
            d-flex
            justify-content-between
            align-items-sm-center align-items-start
            flex-sm-row flex-column
          "
        >
          <div class="header-left">
            <p class="card-subtitle text-muted mb-25">Statistik Penduduk Berdasarkan Pekerjaan</p>
            {{-- <h4 class="card-title">$74,123</h4> --}}
          </div>
          {{-- <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
            <i data-feather="calendar"></i>
            <input
              type="text"
              class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
              placeholder="YYYY-MM-DD"
            />
          </div> --}}
        </div>
        <div class="card-body">
          <canvas class="horizontal-bar-chart-ex chartjs" data-height="2800"></canvas>
        </div>
      </div>
    </div>
    <!-- Horizontal Bar Chart End -->
  </div>

</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}

    {{-- <script src="{{ asset(mix('js/scripts/charts/chart-chartjs.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script> --}}

  {{-- apex --}}
  <script>
  $(window).on('load', function () {
    'use strict';

    var $barColor = '#f3f3f3';
    var $trackBgColor = '#EBEBEB';
    var $textMutedColor = '#b9b9c3';
    var $budgetStrokeColor2 = '#dcdae3';
    var $goalStrokeColor2 = '#51e5a8';
    var $strokeColor = '#ebe9f1';
    var $textHeadingColor = '#5e5873';
    var $agamaStrokeColor2 = '#0000FF';
    var $agamaStrokeColor3 = '#A52A2A';
    var $agamaStrokeColor4 = '#DEB887';
    var $agamaStrokeColor5 = '#5F9EA0';
    var $agamaStrokeColor6 = '#7FFF00';
    var $agamaStrokeColor7 = '#D2691E';
    var $agamaStrokeColor8 = '#00FFFF';
    // kawin
    var $kawinStrokeColor2 = '#0000FF';
    var $kawinStrokeColor3 = '#A52A2A';
    var $kawinStrokeColor4 = '#DEB887';
    var $kawinStrokeColor5 = '#5F9EA0';
    var $kawinStrokeColor6 = '#7FFF00';
    var $kawinStrokeColor7 = '#D2691E';
    var $kawinStrokeColor8 = '#00FFFF';

    var $statisticsOrderChart = document.querySelector('#statistics-order-chart');
    var $statisticsProfitChart = document.querySelector('#statistics-profit-chart');
    var $agamaChart = document.querySelector('#agama-chart');
    var $kawinChart = document.querySelector('#kawin-chart');
    var $revenueReportChart = document.querySelector('#revenue-report-chart');
    var $budgetChart = document.querySelector('#budget-chart');
    var $browserStateChartPrimary = document.querySelector('#browser-state-chart-primary');
    var $browserStateChartWarning = document.querySelector('#browser-state-chart-warning');
    var $browserStateChartSecondary = document.querySelector('#browser-state-chart-secondary');
    var $browserStateChartInfo = document.querySelector('#browser-state-chart-info');
    var $browserStateChartDanger = document.querySelector('#browser-state-chart-danger');
    var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart');

    var statisticsOrderChartOptions;
    var statisticsProfitChartOptions;
    var agamaChartOptions;
    var kawinChartOptions;
    var revenueReportChartOptions;
    var budgetChartOptions;
    var browserStatePrimaryChartOptions;
    var browserStateWarningChartOptions;
    var browserStateSecondaryChartOptions;
    var browserStateInfoChartOptions;
    var browserStateDangerChartOptions;
    var goalOverviewChartOptions;

    var statisticsOrderChart;
    var statisticsProfitChart;
    var agamaChart;
    var kawinChart;
    var revenueReportChart;
    var budgetChart;
    var browserStatePrimaryChart;
    var browserStateDangerChart;
    var browserStateInfoChart;
    var browserStateSecondaryChart;
    var browserStateWarningChart;
    var goalOverviewChart;
    var isRtl = $('html').attr('data-textdirection') === 'rtl';


    //------------ Statistics Bar Chart ------------
    //----------------------------------------------
    statisticsOrderChartOptions = {
      chart: {
        height: 70,
        type: 'bar',
        stacked: true,
        toolbar: {
          show: false
        }
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0,
          top: -15,
          bottom: -15
        }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '20%',
          startingShape: 'rounded',
          colors: {
            backgroundBarColors: [$barColor, $barColor, $barColor, $barColor, $barColor],
            backgroundBarRadius: 5
          }
        }
      },
      legend: {
        show: false
      },
      dataLabels: {
        enabled: false
      },
      colors: [window.colors.solid.warning],
      series: [
        {
          name: '2020',
          data: [45, 85, 65, 45, 65]
        }
      ],
      xaxis: {
        labels: {
          show: false
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        show: false
      },
      tooltip: {
        x: {
          show: false
        }
      }
    };
    statisticsOrderChart = new ApexCharts($statisticsOrderChart, statisticsOrderChartOptions);
    statisticsOrderChart.render();

    //------------ Statistics Line Chart ------------
    //-----------------------------------------------
    statisticsProfitChartOptions = {
      chart: {
        height: 70,
        type: 'line',
        toolbar: {
          show: false
        },
        zoom: {
          enabled: false
        }
      },
      grid: {
        borderColor: $trackBgColor,
        strokeDashArray: 5,
        xaxis: {
          lines: {
            show: true
          }
        },
        yaxis: {
          lines: {
            show: false
          }
        },
        padding: {
          top: -30,
          bottom: -10
        }
      },
      stroke: {
        width: 3
      },
      colors: [window.colors.solid.info],
      series: [
        {
          data: [0, 20, 5, 30, 15, 45]
        }
      ],
      markers: {
        size: 2,
        colors: window.colors.solid.info,
        strokeColors: window.colors.solid.info,
        strokeWidth: 2,
        strokeOpacity: 1,
        strokeDashArray: 0,
        fillOpacity: 1,
        discrete: [
          {
            seriesIndex: 0,
            dataPointIndex: 5,
            fillColor: '#ffffff',
            strokeColor: window.colors.solid.info,
            size: 5
          }
        ],
        shape: 'circle',
        radius: 2,
        hover: {
          size: 3
        }
      },
      xaxis: {
        labels: {
          show: true,
          style: {
            fontSize: '0px'
          }
        },
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        }
      },
      yaxis: {
        show: false
      },
      tooltip: {
        x: {
          show: false
        }
      }
    };
    statisticsProfitChart = new ApexCharts($statisticsProfitChart, statisticsProfitChartOptions);
    statisticsProfitChart.render();

  //--------------- Agama Chart ---------------
  //----------------------------------------------
  agamaChartOptions = {
    chart: {
      type: 'donut',
      height: 120,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: {!! json_encode($dataAgamas['seriesAgamaPersen']) !!},
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: {!! json_encode($dataAgamas['agama']->pluck('nama')) !!},
    stroke: { width: 0 },
    colors: [$agamaStrokeColor2, $agamaStrokeColor3,$agamaStrokeColor4,$agamaStrokeColor5,$agamaStrokeColor6,$agamaStrokeColor7,$agamaStrokeColor8, window.colors.solid.success],
    grid: {
      padding: {
        right: -20,
        bottom: -8,
        left: -20
      }
    },
    plotOptions: {
      pie: {
        startAngle: -10,
        donut: {
          labels: {
            show: true,
            name: {
              offsetY: 15
            },
            value: {
              offsetY: -15,
              formatter: function (val) {
                return parseInt(val) + '%';
              }
            },
            total: {
              show: true,
              offsetY: 15,
              label: {!! json_encode($dataAgamas['agamaMax']['nama']) !!},
              formatter: function (w) {
                return {!! json_encode($dataAgamas['agamaMaxPersen']) !!}+'%';
              }
            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 1325,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 120
          }
        }
      },
      {
        breakpoint: 1045,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 120
          }
        }
      }
    ]
  };
  agamaChart = new ApexCharts($agamaChart, agamaChartOptions);
  agamaChart.render();
  //--------------- Kawin Chart ---------------
  //----------------------------------------------
  kawinChartOptions = {
    chart: {
      type: 'donut',
      height: 120,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: {!! json_encode($dataKawins['seriesKawinPersen']) !!},
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: {!! json_encode($dataKawins['kawin']->pluck('nama')) !!},
    stroke: { width: 0 },
    colors: [$kawinStrokeColor2, $kawinStrokeColor3,$kawinStrokeColor4,$kawinStrokeColor5, window.colors.solid.success],
    grid: {
      padding: {
        right: -20,
        bottom: -8,
        left: -20
      }
    },
    plotOptions: {
      pie: {
        startAngle: -10,
        donut: {
          labels: {
            show: true,
            name: {
              offsetY: 15
            },
            value: {
              offsetY: -15,
              formatter: function (val) {
                return parseInt(val) + '%';
              }
            },
            total: {
              show: true,
              offsetY: 15,
              label: {!! json_encode($dataKawins['kawinMax']['nama']) !!},
              formatter: function (w) {
                return {!! json_encode($dataKawins['kawinMaxPersen']) !!}+'%';
              }
            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 1325,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 120
          }
        }
      },
      {
        breakpoint: 1045,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 120
          }
        }
      }
    ]
  };
  kawinChart = new ApexCharts($kawinChart, kawinChartOptions);
  kawinChart.render();

    //------------ Revenue Report Chart ------------
    //----------------------------------------------
    revenueReportChartOptions = {
      chart: {
        height: 230,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          columnWidth: '17%',
          endingShape: 'rounded'
        },
        distributed: true
      },
      colors: [window.colors.solid.primary, window.colors.solid.warning],
      series: [
        {
          name: 'Earning',
          data: [95, 177, 284, 256, 105, 63, 168, 218, 72]
        },
        {
          name: 'Expense',
          data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
        }
      ],
      dataLabels: {
        enabled: false
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: -20,
          bottom: -10
        },
        yaxis: {
          lines: { show: false }
        }
      },
      xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
        labels: {
          style: {
            colors: $textMutedColor,
            fontSize: '0.86rem'
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            colors: $textMutedColor,
            fontSize: '0.86rem'
          }
        }
      }
    };
    revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
    revenueReportChart.render();

    //---------------- Budget Chart ----------------
    //----------------------------------------------
    budgetChartOptions = {
      chart: {
        height: 80,
        toolbar: { show: false },
        zoom: { enabled: false },
        type: 'line',
        sparkline: { enabled: true }
      },
      stroke: {
        curve: 'smooth',
        dashArray: [0, 5],
        width: [2]
      },
      colors: [window.colors.solid.primary, $budgetStrokeColor2],
      series: [
        {
          data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
        },
        {
          data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
        }
      ],
      tooltip: {
        enabled: false
      }
    };
    budgetChart = new ApexCharts($budgetChart, budgetChartOptions);
    budgetChart.render();

    //------------ Browser State Charts ------------
    //----------------------------------------------

    // State Primary Chart
    browserStatePrimaryChartOptions = {
      chart: {
        height: 30,
        width: 30,
        type: 'radialBar'
      },
      grid: {
        show: false,
        padding: {
          left: -15,
          right: -15,
          top: -12,
          bottom: -15
        }
      },
      colors: [window.colors.solid.primary],
      series: [54.4],
      plotOptions: {
        radialBar: {
          hollow: {
            size: '22%'
          },
          track: {
            background: $trackBgColor
          },
          dataLabels: {
            showOn: 'always',
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      }
    };
    browserStatePrimaryChart = new ApexCharts($browserStateChartPrimary, browserStatePrimaryChartOptions);
    browserStatePrimaryChart.render();

    // State Warning Chart
    browserStateWarningChartOptions = {
      chart: {
        height: 30,
        width: 30,
        type: 'radialBar'
      },
      grid: {
        show: false,
        padding: {
          left: -15,
          right: -15,
          top: -12,
          bottom: -15
        }
      },
      colors: [window.colors.solid.warning],
      series: [6.1],
      plotOptions: {
        radialBar: {
          hollow: {
            size: '22%'
          },
          track: {
            background: $trackBgColor
          },
          dataLabels: {
            showOn: 'always',
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      }
    };
    browserStateWarningChart = new ApexCharts($browserStateChartWarning, browserStateWarningChartOptions);
    browserStateWarningChart.render();

    // State Secondary Chart 1
    browserStateSecondaryChartOptions = {
      chart: {
        height: 30,
        width: 30,
        type: 'radialBar'
      },
      grid: {
        show: false,
        padding: {
          left: -15,
          right: -15,
          top: -12,
          bottom: -15
        }
      },
      colors: [window.colors.solid.secondary],
      series: [14.6],
      plotOptions: {
        radialBar: {
          hollow: {
            size: '22%'
          },
          track: {
            background: $trackBgColor
          },
          dataLabels: {
            showOn: 'always',
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      }
    };
    browserStateSecondaryChart = new ApexCharts($browserStateChartSecondary, browserStateSecondaryChartOptions);
    browserStateSecondaryChart.render();

    // State Info Chart
    browserStateInfoChartOptions = {
      chart: {
        height: 30,
        width: 30,
        type: 'radialBar'
      },
      grid: {
        show: false,
        padding: {
          left: -15,
          right: -15,
          top: -12,
          bottom: -15
        }
      },
      colors: [window.colors.solid.info],
      series: [4.2],
      plotOptions: {
        radialBar: {
          hollow: {
            size: '22%'
          },
          track: {
            background: $trackBgColor
          },
          dataLabels: {
            showOn: 'always',
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      }
    };
    browserStateInfoChart = new ApexCharts($browserStateChartInfo, browserStateInfoChartOptions);
    browserStateInfoChart.render();

    // State Danger Chart
    browserStateDangerChartOptions = {
      chart: {
        height: 30,
        width: 30,
        type: 'radialBar'
      },
      grid: {
        show: false,
        padding: {
          left: -15,
          right: -15,
          top: -12,
          bottom: -15
        }
      },
      colors: [window.colors.solid.danger],
      series: [8.4],
      plotOptions: {
        radialBar: {
          hollow: {
            size: '22%'
          },
          track: {
            background: $trackBgColor
          },
          dataLabels: {
            showOn: 'always',
            name: {
              show: false
            },
            value: {
              show: false
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      }
    };
    browserStateDangerChart = new ApexCharts($browserStateChartDanger, browserStateDangerChartOptions);
    browserStateDangerChart.render();

    //------------ Goal Overview Chart ------------
    //---------------------------------------------
    goalOverviewChartOptions = {
      chart: {
        height: 245,
        type: 'radialBar',
        sparkline: {
          enabled: true
        },
        dropShadow: {
          enabled: true,
          blur: 3,
          left: 1,
          top: 1,
          opacity: 0.1
        }
      },
      colors: [$goalStrokeColor2],
      plotOptions: {
        radialBar: {
          offsetY: -10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '77%'
          },
          track: {
            background: $strokeColor,
            strokeWidth: '50%'
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              color: $textHeadingColor,
              fontSize: '2.86rem',
              fontWeight: '600'
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: [window.colors.solid.success],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      series: [83],
      stroke: {
        lineCap: 'round'
      },
      grid: {
        padding: {
          bottom: 30
        }
      }
    };
    goalOverviewChart = new ApexCharts($goalOverviewChart, goalOverviewChartOptions);
    goalOverviewChart.render();
  });
  </script>
  <script>
    /*=========================================================================================
    File Name: chart-chartjs.js
    Description: Chartjs Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

  $(window).on('load', function () {
    'use strict';

    var chartWrapper = $('.chartjs'),
      flatPicker = $('.flat-picker'),
      barChartEx = $('.bar-chart-ex'),
      horizontalBarChartEx = $('.horizontal-bar-chart-ex'),
      lineChartEx = $('.line-chart-ex'),
      radarChartEx = $('.radar-chart-ex'),
      polarAreaChartEx = $('.polar-area-chart-ex'),
      bubbleChartEx = $('.bubble-chart-ex'),
      doughnutChartEx = $('.doughnut-chart-ex'),
      scatterChartEx = $('.scatter-chart-ex'),
      lineAreaChartEx = $('.line-area-chart-ex');

    // Color Variables
    var primaryColorShade = '#836AF9',
      yellowColor = '#ffe800',
      successColorShade = '#28dac6',
      warningColorShade = '#ffe802',
      warningLightColor = '#FDAC34',
      infoColorShade = '#299AFF',
      greyColor = '#4F5D70',
      blueColor = '#2c9aff',
      blueLightColor = '#84D0FF',
      greyLightColor = '#EDF1F4',
      tooltipShadow = 'rgba(0, 0, 0, 0.25)',
      lineChartPrimary = '#666ee8',
      lineChartDanger = '#ff4961',
      labelColor = '#6e6b7b',
      grid_line_color = 'rgba(200, 200, 200, 0.2)'; // RGBA color helps in dark layout

    // Detect Dark Layout
    if ($('html').hasClass('dark-layout')) {
      labelColor = '#b4b7bd';
    }

    // Wrap charts with div of height according to their data-height
    if (chartWrapper.length) {
      chartWrapper.each(function () {
        $(this).wrap($('<div style="height:' + this.getAttribute('data-height') + 'px"></div>'));
      });
    }

    // Init flatpicker
    if (flatPicker.length) {
      var date = new Date();
      flatPicker.each(function () {
        $(this).flatpickr({
          mode: 'range',
          defaultDate: ['2019-05-01', '2019-05-10']
        });
      });
    }

    // Bar Chart
    // --------------------------------------------------------------------
    if (barChartEx.length) {
      var barChartExample = new Chart(barChartEx, {
        type: 'bar',
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderSkipped: 'bottom'
            }
          },
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 500,
          legend: {
            display: false
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          scales: {
            xAxes: [
              {
                display: true,
                gridLines: {
                  display: true,
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                scaleLabel: {
                  display: false
                },
                ticks: {
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                display: true,
                gridLines: {
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 100,
                  min: 0,
                  max: 400,
                  fontColor: labelColor
                }
              }
            ]
          }
        },
        data: {
          labels: {!! json_encode($pendidikan->pluck('nama')) !!},
          datasets: [
            {
              data: {!! json_encode($pendidikan->pluck('penduduk_count')) !!},
              barThickness: 15,
              backgroundColor: successColorShade,
              borderColor: 'transparent'
            }
          ]
        }
      });
    }

    //Draw rectangle Bar charts with rounded border
    Chart.elements.Rectangle.prototype.draw = function () {
      var ctx = this._chart.ctx;
      var viewVar = this._view;
      var left, right, top, bottom, signX, signY, borderSkipped, radius;
      var borderWidth = viewVar.borderWidth;
      var cornerRadius = 20;
      if (!viewVar.horizontal) {
        left = viewVar.x - viewVar.width / 2;
        right = viewVar.x + viewVar.width / 2;
        top = viewVar.y;
        bottom = viewVar.base;
        signX = 1;
        signY = top > bottom ? 1 : -1;
        borderSkipped = viewVar.borderSkipped || 'bottom';
      } else {
        left = viewVar.base;
        right = viewVar.x;
        top = viewVar.y - viewVar.height / 2;
        bottom = viewVar.y + viewVar.height / 2;
        signX = right > left ? 1 : -1;
        signY = 1;
        borderSkipped = viewVar.borderSkipped || 'left';
      }

      if (borderWidth) {
        var barSize = Math.min(Math.abs(left - right), Math.abs(top - bottom));
        borderWidth = borderWidth > barSize ? barSize : borderWidth;
        var halfStroke = borderWidth / 2;
        var borderLeft = left + (borderSkipped !== 'left' ? halfStroke * signX : 0);
        var borderRight = right + (borderSkipped !== 'right' ? -halfStroke * signX : 0);
        var borderTop = top + (borderSkipped !== 'top' ? halfStroke * signY : 0);
        var borderBottom = bottom + (borderSkipped !== 'bottom' ? -halfStroke * signY : 0);
        if (borderLeft !== borderRight) {
          top = borderTop;
          bottom = borderBottom;
        }
        if (borderTop !== borderBottom) {
          left = borderLeft;
          right = borderRight;
        }
      }

      ctx.beginPath();
      ctx.fillStyle = viewVar.backgroundColor;
      ctx.strokeStyle = viewVar.borderColor;
      ctx.lineWidth = borderWidth;
      var corners = [
        [left, bottom],
        [left, top],
        [right, top],
        [right, bottom]
      ];

      var borders = ['bottom', 'left', 'top', 'right'];
      var startCorner = borders.indexOf(borderSkipped, 0);
      if (startCorner === -1) {
        startCorner = 0;
      }

      function cornerAt(index) {
        return corners[(startCorner + index) % 4];
      }

      var corner = cornerAt(0);
      ctx.moveTo(corner[0], corner[1]);

      for (var i = 1; i < 4; i++) {
        corner = cornerAt(i);
        var nextCornerId = i + 1;
        if (nextCornerId == 4) {
          nextCornerId = 0;
        }

        var nextCorner = cornerAt(nextCornerId);

        var width = corners[2][0] - corners[1][0],
          height = corners[0][1] - corners[1][1],
          x = corners[1][0],
          y = corners[1][1];

        var radius = cornerRadius;

        if (radius > height / 2) {
          radius = height / 2;
        }
        if (radius > width / 2) {
          radius = width / 2;
        }

        if (!viewVar.horizontal) {
          ctx.moveTo(x + radius, y);
          ctx.lineTo(x + width - radius, y);
          ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
          ctx.lineTo(x + width, y + height - radius);
          ctx.quadraticCurveTo(x + width, y + height, x + width, y + height);
          ctx.lineTo(x + radius, y + height);
          ctx.quadraticCurveTo(x, y + height, x, y + height);
          ctx.lineTo(x, y + radius);
          ctx.quadraticCurveTo(x, y, x + radius, y);
        } else {
          ctx.moveTo(x + radius, y);
          ctx.lineTo(x + width - radius, y);
          ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
          ctx.lineTo(x + width, y + height - radius);
          ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
          ctx.lineTo(x + radius, y + height);
          ctx.quadraticCurveTo(x, y + height, x, y + height);
          ctx.lineTo(x, y + radius);
          ctx.quadraticCurveTo(x, y, x, y);
        }
      }

      ctx.fill();
      if (borderWidth) {
        ctx.stroke();
      }
    };

    // Horizontal Bar Chart
    // --------------------------------------------------------------------
    if (horizontalBarChartEx.length) {
      new Chart(horizontalBarChartEx, {
        type: 'horizontalBar',
        options: {
          elements: {
            rectangle: {
              borderWidth: 2,
              borderSkipped: 'right'
            }
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 500,
          legend: {
            display: false
          },
          layout: {
            padding: {
              bottom: -30,
              left: -25
            }
          },
          scales: {
            xAxes: [
              {
                display: true,
                gridLines: {
                  zeroLineColor: grid_line_color,
                  borderColor: 'transparent',
                  color: grid_line_color
                },
                scaleLabel: {
                  display: true
                },
                ticks: {
                  min: 0,
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                display: true,
                gridLines: {
                  display: false
                },
                scaleLabel: {
                  display: true
                },
                ticks: {
                  fontColor: labelColor
                }
              }
            ]
          }
        },
        data: {
          labels: {!! json_encode($pekerjaan->pluck('nama')) !!},
          datasets: [
            {
              data: {!! json_encode($pekerjaan->pluck('penduduk_count')) !!},
              barThickness: 15,
              backgroundColor: window.colors.solid.info,
              borderColor: 'transparent'
            }
          ]
        }
      });
    }

    // Line Chart
    // --------------------------------------------------------------------
    if (lineChartEx.length) {
      var lineExample = new Chart(lineChartEx, {
        type: 'line',
        plugins: [
          // to add spacing between legends and chart
          {
            beforeInit: function (chart) {
              chart.legend.afterFit = function () {
                this.height += 20;
              };
            }
          }
        ],
        options: {
          responsive: true,
          maintainAspectRatio: false,
          backgroundColor: false,
          hover: {
            mode: 'label'
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          layout: {
            padding: {
              top: -15,
              bottom: -25,
              left: -15
            }
          },
          scales: {
            xAxes: [
              {
                display: true,
                scaleLabel: {
                  display: true
                },
                gridLines: {
                  display: true,
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                display: true,
                scaleLabel: {
                  display: true
                },
                ticks: {
                  stepSize: 100,
                  min: 0,
                  max: 400,
                  fontColor: labelColor
                },
                gridLines: {
                  display: true,
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                }
              }
            ]
          },
          legend: {
            position: 'top',
            align: 'start',
            labels: {
              usePointStyle: true,
              padding: 25,
              boxWidth: 9
            }
          }
        },
        data: {
          labels: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130, 140],
          datasets: [
            {
              data: [80, 150, 180, 270, 210, 160, 160, 202, 265, 210, 270, 255, 290, 360, 375],
              label: 'Europe',
              borderColor: lineChartDanger,
              lineTension: 0.5,
              pointStyle: 'circle',
              backgroundColor: lineChartDanger,
              fill: false,
              pointRadius: 1,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBorderColor: window.colors.solid.white,
              pointHoverBackgroundColor: lineChartDanger,
              pointShadowOffsetX: 1,
              pointShadowOffsetY: 1,
              pointShadowBlur: 5,
              pointShadowColor: tooltipShadow
            },
            {
              data: [80, 125, 105, 130, 215, 195, 140, 160, 230, 300, 220, 170, 210, 200, 280],
              label: 'Asia',
              borderColor: lineChartPrimary,
              lineTension: 0.5,
              pointStyle: 'circle',
              backgroundColor: lineChartPrimary,
              fill: false,
              pointRadius: 1,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBorderColor: window.colors.solid.white,
              pointHoverBackgroundColor: lineChartPrimary,
              pointShadowOffsetX: 1,
              pointShadowOffsetY: 1,
              pointShadowBlur: 5,
              pointShadowColor: tooltipShadow
            },
            {
              data: [80, 99, 82, 90, 115, 115, 74, 75, 130, 155, 125, 90, 140, 130, 180],
              label: 'Africa',
              borderColor: warningColorShade,
              lineTension: 0.5,
              pointStyle: 'circle',
              backgroundColor: warningColorShade,
              fill: false,
              pointRadius: 1,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBorderColor: window.colors.solid.white,
              pointHoverBackgroundColor: warningColorShade,
              pointShadowOffsetX: 1,
              pointShadowOffsetY: 1,
              pointShadowBlur: 5,
              pointShadowColor: tooltipShadow
            }
          ]
        }
      });
    }

    // Radar Chart
    // --------------------------------------------------------------------
    if (radarChartEx.length) {
      var canvas = document.getElementById('canvas');

      // For radar gradient color
      var gradientBlue = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
      gradientBlue.addColorStop(0, 'rgba(155,136,250, 0.9)');
      gradientBlue.addColorStop(1, 'rgba(155,136,250, 0.8)');

      var gradientRed = canvas.getContext('2d').createLinearGradient(0, 0, 0, 150);
      gradientRed.addColorStop(0, 'rgba(255,161,161, 0.9)');
      gradientRed.addColorStop(1, 'rgba(255,161,161, 0.8)');

      var radarExample = new Chart(radarChartEx, {
        type: 'radar',
        plugins: [
          // to add spacing between legends and chart
          {
            beforeInit: function (chart) {
              chart.legend.afterFit = function () {
                this.height += 20;
              };
            }
          }
        ],
        data: {
          labels: ['STA', 'STR', 'AGI', 'VIT', 'CHA', 'INT'],
          datasets: [
            {
              label: 'Donté Panlin',
              data: [25, 59, 90, 81, 60, 82],
              fill: true,
              backgroundColor: gradientRed,
              borderColor: 'transparent',
              pointBackgroundColor: 'transparent',
              pointBorderColor: 'transparent'
            },
            {
              label: 'Mireska Sunbreeze',
              data: [40, 100, 40, 90, 40, 90],
              fill: true,
              backgroundColor: gradientBlue,
              borderColor: 'transparent',
              pointBackgroundColor: 'transparent',
              pointBorderColor: 'transparent'
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 500,
          legend: {
            position: 'top',
            labels: {
              padding: 25,
              fontColor: labelColor
            }
          },
          layout: {
            padding: {
              top: -20
            }
          },
          tooltips: {
            enabled: false,
            custom: function (tooltip) {
              var tooltipEl = document.getElementById('tooltip');
              if (tooltip.body) {
                tooltipEl.style.display = 'block';
                if (tooltip.body[0].lines && tooltip.body[0].lines[0]) {
                  tooltipEl.innerHTML = tooltip.body[0].lines[0];
                }
              } else {
                setTimeout(function () {
                  tooltipEl.style.display = 'none';
                }, 500);
              }
            }
          },
          gridLines: {
            display: false
          },
          scale: {
            ticks: {
              maxTicksLimit: 1,
              display: false,
              fontColor: labelColor
            },
            gridLines: {
              color: grid_line_color
            },
            angleLines: { color: grid_line_color }
          }
        }
      });
    }

    // Polar Area Chart
    // --------------------------------------------------------------------
    if (polarAreaChartEx.length) {
      var polarExample = new Chart(polarAreaChartEx, {
        type: 'polarArea',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 500,
          legend: {
            position: 'right',
            labels: {
              usePointStyle: true,
              padding: 25,
              boxWidth: 9,
              fontColor: labelColor
            }
          },
          layout: {
            padding: {
              top: -5,
              bottom: -45
            }
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          scale: {
            scaleShowLine: true,
            scaleLineWidth: 1,
            ticks: {
              display: false,
              fontColor: labelColor
            },
            reverse: false,
            gridLines: {
              display: false
            }
          },
          animation: {
            animateRotate: false
          }
        },
        data: {
          labels: ['Africa', 'Asia', 'Europe', 'America', 'Antarctica', 'Australia'],
          datasets: [
            {
              label: 'Population (millions)',
              backgroundColor: [
                primaryColorShade,
                warningColorShade,
                window.colors.solid.primary,
                infoColorShade,
                greyColor,
                successColorShade
              ],
              data: [19, 17.5, 15, 13.5, 11, 9],
              borderWidth: 0
            }
          ]
        }
      });
    }

    // Bubble Chart
    // --------------------------------------------------------------------
    if (bubbleChartEx.length) {
      var bubbleExample = new Chart(bubbleChartEx, {
        type: 'bubble',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            xAxes: [
              {
                display: true,
                gridLines: {
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 10,
                  min: 0,
                  max: 140,
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                display: true,
                gridLines: {
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 100,
                  min: 0,
                  max: 400,
                  fontColor: labelColor
                }
              }
            ]
          },
          legend: {
            display: false
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          }
        },
        data: {
          animation: {
            duration: 10000
          },
          datasets: [
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 20,
                  y: 74,
                  r: 10
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 30,
                  y: 72,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 10,
                  y: 110,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 40,
                  y: 110,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 20,
                  y: 135,
                  r: 6
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 10,
                  y: 160,
                  r: 12
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 30,
                  y: 165,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 40,
                  y: 200,
                  r: 20
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 90,
                  y: 185,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 50,
                  y: 240,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 60,
                  y: 275,
                  r: 10
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 70,
                  y: 305,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 80,
                  y: 325,
                  r: 4
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 50,
                  y: 285,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 60,
                  y: 235,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 70,
                  y: 275,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 80,
                  y: 290,
                  r: 4
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 90,
                  y: 250,
                  r: 10
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 100,
                  y: 220,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 120,
                  y: 230,
                  r: 4
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 110,
                  y: 320,
                  r: 15
                }
              ]
            },
            {
              backgroundColor: warningColorShade,
              borderColor: warningColorShade,
              data: [
                {
                  x: 130,
                  y: 330,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 100,
                  y: 310,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 110,
                  y: 240,
                  r: 5
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 120,
                  y: 270,
                  r: 7
                }
              ]
            },
            {
              backgroundColor: primaryColorShade,
              borderColor: primaryColorShade,
              data: [
                {
                  x: 130,
                  y: 300,
                  r: 6
                }
              ]
            }
          ]
        }
      });
    }

    // Doughnut Chart
    // --------------------------------------------------------------------
    if (doughnutChartEx.length) {
      var doughnutExample = new Chart(doughnutChartEx, {
        type: 'doughnut',
        options: {
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 500,
          cutoutPercentage: 60,
          legend: { display: false },
          tooltips: {
            callbacks: {
              label: function (tooltipItem, data) {
                var label = data.datasets[0].labels[tooltipItem.index] || '',
                  value = data.datasets[0].data[tooltipItem.index];
                var output = ' ' + label + ' : ' + value + ' %';
                return output;
              }
            },
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          }
        },
        data: {
          datasets: [
            {
              labels: ['Tablet', 'Mobile', 'Desktop'],
              data: [10, 10, 80],
              backgroundColor: [successColorShade, warningLightColor, window.colors.solid.primary],
              borderWidth: 0,
              pointStyle: 'rectRounded'
            }
          ]
        }
      });
    }

    // Scatter Chart
    // --------------------------------------------------------------------
    if (scatterChartEx.length) {
      var scatterExample = new Chart(scatterChartEx, {
        type: 'scatter',
        plugins: [
          // to add spacing between legends and chart
          {
            beforeInit: function (chart) {
              chart.legend.afterFit = function () {
                this.height += 20;
              };
            }
          }
        ],
        options: {
          responsive: true,
          maintainAspectRatio: false,
          responsiveAnimationDuration: 800,
          title: {
            display: false,
            text: 'Chart.js Scatter Chart'
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          scales: {
            xAxes: [
              {
                gridLines: {
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 10,
                  min: 0,
                  max: 140,
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                gridLines: {
                  color: grid_line_color,
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 100,
                  min: 0,
                  max: 400,
                  fontColor: labelColor
                }
              }
            ]
          },
          legend: {
            position: 'top',
            align: 'start',
            labels: {
              usePointStyle: true,
              padding: 25,
              boxWidth: 9
            }
          },
          layout: {
            padding: {
              top: -20
            }
          }
        },
        data: {
          datasets: [
            {
              label: 'iPhone',
              data: [
                {
                  x: 72,
                  y: 225
                },
                {
                  x: 81,
                  y: 270
                },
                {
                  x: 90,
                  y: 230
                },
                {
                  x: 103,
                  y: 305
                },
                {
                  x: 103,
                  y: 245
                },
                {
                  x: 108,
                  y: 275
                },
                {
                  x: 110,
                  y: 290
                },
                {
                  x: 111,
                  y: 315
                },
                {
                  x: 109,
                  y: 350
                },
                {
                  x: 116,
                  y: 340
                },
                {
                  x: 113,
                  y: 260
                },
                {
                  x: 117,
                  y: 275
                },
                {
                  x: 117,
                  y: 295
                },
                {
                  x: 126,
                  y: 280
                },
                {
                  x: 127,
                  y: 340
                },
                {
                  x: 133,
                  y: 330
                }
              ],
              backgroundColor: window.colors.solid.primary,
              borderColor: 'transparent',
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 5
            },
            {
              label: 'Samsung Note',
              data: [
                {
                  x: 13,
                  y: 95
                },
                {
                  x: 22,
                  y: 105
                },
                {
                  x: 17,
                  y: 115
                },
                {
                  x: 19,
                  y: 130
                },
                {
                  x: 21,
                  y: 125
                },
                {
                  x: 35,
                  y: 125
                },
                {
                  x: 13,
                  y: 155
                },
                {
                  x: 21,
                  y: 165
                },
                {
                  x: 25,
                  y: 155
                },
                {
                  x: 18,
                  y: 190
                },
                {
                  x: 26,
                  y: 180
                },
                {
                  x: 43,
                  y: 180
                },
                {
                  x: 53,
                  y: 202
                },
                {
                  x: 61,
                  y: 165
                },
                {
                  x: 67,
                  y: 225
                }
              ],
              backgroundColor: yellowColor,
              borderColor: 'transparent',
              pointRadius: 5
            },
            {
              label: 'OnePlus',
              data: [
                {
                  x: 70,
                  y: 195
                },
                {
                  x: 72,
                  y: 270
                },
                {
                  x: 98,
                  y: 255
                },
                {
                  x: 100,
                  y: 215
                },
                {
                  x: 87,
                  y: 240
                },
                {
                  x: 94,
                  y: 280
                },
                {
                  x: 99,
                  y: 300
                },
                {
                  x: 102,
                  y: 290
                },
                {
                  x: 110,
                  y: 275
                },
                {
                  x: 111,
                  y: 250
                },
                {
                  x: 94,
                  y: 280
                },
                {
                  x: 92,
                  y: 340
                },
                {
                  x: 100,
                  y: 335
                },
                {
                  x: 108,
                  y: 330
                }
              ],
              backgroundColor: successColorShade,
              borderColor: 'transparent',
              pointBorderWidth: 2,
              pointHoverBorderWidth: 2,
              pointRadius: 5
            }
          ]
        }
      });
    }

    // Line AreaChart
    // --------------------------------------------------------------------
    if (lineAreaChartEx.length) {
      new Chart(lineAreaChartEx, {
        type: 'line',
        plugins: [
          // to add spacing between legends and chart
          {
            beforeInit: function (chart) {
              chart.legend.afterFit = function () {
                this.height += 20;
              };
            }
          }
        ],
        options: {
          responsive: true,
          maintainAspectRatio: false,
          legend: {
            position: 'top',
            align: 'start',
            labels: {
              usePointStyle: true,
              padding: 25,
              boxWidth: 9
            }
          },
          layout: {
            padding: {
              top: -20,
              bottom: -20,
              left: -20
            }
          },
          tooltips: {
            // Updated default tooltip UI
            shadowOffsetX: 1,
            shadowOffsetY: 1,
            shadowBlur: 8,
            shadowColor: tooltipShadow,
            backgroundColor: window.colors.solid.white,
            titleFontColor: window.colors.solid.black,
            bodyFontColor: window.colors.solid.black
          },
          scales: {
            xAxes: [
              {
                display: true,
                gridLines: {
                  color: 'transparent',
                  zeroLineColor: grid_line_color
                },
                scaleLabel: {
                  display: true
                },
                ticks: {
                  fontColor: labelColor
                }
              }
            ],
            yAxes: [
              {
                display: true,
                gridLines: {
                  color: 'transparent',
                  zeroLineColor: grid_line_color
                },
                ticks: {
                  stepSize: 100,
                  min: 0,
                  max: 400,
                  fontColor: labelColor
                },
                scaleLabel: {
                  display: true
                }
              }
            ]
          }
        },
        data: {
          labels: [
            '7/12',
            '8/12',
            '9/12',
            '10/12',
            '11/12',
            '12/12',
            '13/12',
            '14/12',
            '15/12',
            '16/12',
            '17/12',
            '18/12',
            '19/12',
            '20/12',
            ''
          ],
          datasets: [
            {
              label: 'Africa',
              data: [40, 55, 45, 75, 65, 55, 70, 60, 100, 98, 90, 120, 125, 140, 155],
              lineTension: 0,
              backgroundColor: blueColor,
              pointStyle: 'circle',
              borderColor: 'transparent',
              pointRadius: 0.5,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBackgroundColor: blueColor,
              pointHoverBorderColor: window.colors.solid.white
            },
            {
              label: 'Asia',
              data: [70, 85, 75, 150, 100, 140, 110, 105, 160, 150, 125, 190, 200, 240, 275],
              lineTension: 0,
              backgroundColor: blueLightColor,
              pointStyle: 'circle',
              borderColor: 'transparent',
              pointRadius: 0.5,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBackgroundColor: blueLightColor,
              pointHoverBorderColor: window.colors.solid.white
            },
            {
              label: 'Europe',
              data: [240, 195, 160, 215, 185, 215, 185, 200, 250, 210, 195, 250, 235, 300, 315],
              lineTension: 0,
              backgroundColor: greyLightColor,
              pointStyle: 'circle',
              borderColor: 'transparent',
              pointRadius: 0.5,
              pointHoverRadius: 5,
              pointHoverBorderWidth: 5,
              pointBorderColor: 'transparent',
              pointHoverBackgroundColor: greyLightColor,
              pointHoverBorderColor: window.colors.solid.white
            }
          ]
        }
      });
    }
  });

  </script>
@endsection
