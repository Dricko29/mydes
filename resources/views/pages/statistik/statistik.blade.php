@extends('pages.main')

@section('css')

@endsection

@section('title', __('Complaint'))

@section('content')
<section class="uni-banner">
    <div class="container">
        <div class="uni-banner-text-area">
            <h1>@lang('Statistic')</h1>
            <ul>
                <li><a href="/">Home</a></li>
                <li>List @lang('Statistic')</li>
            </ul>
        </div>
    </div>
</section>
		<section class="blog-details ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="blog-card mt-2">
									<div class="blog-card-text-area">
										<h4>
											<a href="#">Statistik Agama</a>
										</h4>
                                        <div id="chartAgama">
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12 col-12">
								<div class="blog-card mt-2">
									<div class="blog-card-text-area">
										<h4>
											<a href="#">Statistik Status Kawin</a>
										</h4>
                                        <div id="chartKawin">
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="blog-card mt-2">
									<div class="blog-card-text-area">
										<h4>
											<a href="#">Statistik Pendidikan</a>
										</h4>
                                        <div id="chartPendidikan">
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        		
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.0/chart.min.js"></script>
<script>
    var chartColors = {
      column: {
        series1: '#826af9',
        series2: '#d2b0ff',
        bg: '#f8d3ff'
      },
      success: {
        shade_100: '#7eefc7',
        shade_200: '#06774f'
      },
      donut: {
        series1: '#ffe700',
        series2: '#00d4bd',
        series3: '#826bf8',
        series4: '#2b9bf4',
        series5: '#00FFFF',
        series6: '#DEB887',
        series7: '#A52A2A',
        series8: '#5e5873',
      },
      area: {
        series3: '#a4f8cd',
        series2: '#60f2ca',
        series1: '#2bdac7'
      }
    };
    var agamaChartEl = document.querySelector('#chartAgama'),
    agamaChartConfig = {
      chart: {
        height: 350,
        type: 'donut'
      },
      legend: {
        show: true,
        position: 'bottom'
      },
      labels: {!! json_encode($dataAgamas['agama']->pluck('nama')) !!},
      series: {!! json_encode($dataAgamas['seriesAgamaPersen']) !!},
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series5,
        chartColors.donut.series3,
        chartColors.donut.series2,
        chartColors.donut.series4,
        chartColors.donut.series6,
        chartColors.donut.series7,
        chartColors.donut.series8,

      ],
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                fontSize: '2rem',
                fontFamily: 'Montserrat'
              },
              value: {
                fontSize: '1rem',
                fontFamily: 'Montserrat',
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              total: {
                show: true,
                fontSize: '1.5rem',
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
          breakpoint: 992,
          options: {
            chart: {
              height: 380
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              height: 320
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      fontSize: '1.5rem'
                    },
                    value: {
                      fontSize: '1rem'
                    },
                    total: {
                      fontSize: '1.5rem'
                    }
                  }
                }
              }
            }
          }
        }
      ]
    };
    if (typeof agamaChartEl !== undefined && agamaChartEl !== null) {
        var agamaChart = new ApexCharts(agamaChartEl, agamaChartConfig);
        agamaChart.render();
    }
    var kawinChartEl = document.querySelector('#chartKawin'),
    kawinChartConfig = {
      chart: {
        height: 350,
        type: 'donut'
      },
      legend: {
        show: true,
        position: 'bottom'
      },
      labels: {!! json_encode($dataKawins['kawin']->pluck('nama')) !!},
      series: {!! json_encode($dataKawins['seriesKawinPersen']) !!},
      colors: [
        chartColors.donut.series1,
        chartColors.donut.series5,
        chartColors.donut.series3,
        chartColors.donut.series2,

      ],
      dataLabels: {
        enabled: true,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      plotOptions: {
        pie: {
          donut: {
            labels: {
              show: true,
              name: {
                fontSize: '2rem',
                fontFamily: 'Montserrat'
              },
              value: {
                fontSize: '1rem',
                fontFamily: 'Montserrat',
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
              total: {
                show: true,
                fontSize: '1.5rem',
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
          breakpoint: 992,
          options: {
            chart: {
              height: 380
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            chart: {
              height: 320
            },
            plotOptions: {
              pie: {
                donut: {
                  labels: {
                    show: true,
                    name: {
                      fontSize: '1.5rem'
                    },
                    value: {
                      fontSize: '1rem'
                    },
                    total: {
                      fontSize: '1.5rem'
                    }
                  }
                }
              }
            }
          }
        }
      ]
    };
    if (typeof kawinChartEl !== undefined && kawinChartEl !== null) {
        var kawinChart = new ApexCharts(kawinChartEl, kawinChartConfig);
        kawinChart.render();
    }

    // pendidikan
    var options = {
          series: [{
          data: {!! json_encode($pendidikan->pluck('penduduk_count')) !!}
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: {!! json_encode($pendidikan->pluck('nama')) !!},
        }
        };

    var chart = new ApexCharts(document.querySelector("#chartPendidikan"), options);
    chart.render();

</script>
@endsection
