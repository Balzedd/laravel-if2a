@extends('main')

@section('content')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/adaptive.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <div id="containerJED"></div>
        <div class="row">
            <div id="containerbaljed"></div>
        </div>
        <p class="highcharts-description">
            A basic column chart comparing estimated corn and wheat production
            in some countries.

            The chart is making use of the axis crosshair feature, to highlight
            the hovered country.
        </p>
    </figure>

    <style>
        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                sans-serif;
            background: var(--highcharts-background-color);
            color: var(--highcharts-neutral-color-100);
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid var(--highcharts-neutral-color-10, #e6e6e6);
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: var(--highcharts-neutral-color-60, #666);
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tbody tr:nth-child(even) {
            background: var(--highcharts-neutral-color-3, #f7f7f7);
        }

        .highcharts-description {
            margin: 0.3rem 10px;
        }
    </style>

    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Mahasiswa Balzed'
            },
            subtitle: {
                text: 'Source: Aplikasi BALJEDD'
            },
            xAxis: {
                categories: [
                    @foreach ($grafikmhs as $data)
                        '{{ $data->nama_prodi }}',
                    @endforeach
                ],
                crosshair: true,
                accessibility: {
                    description: 'Program Studi'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Mahasiswa'
                }
            },
            tooltip: {
                valueSuffix: 'Orang'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Mahasiswa',
                data: [
                    @foreach ($grafikmhs as $data)
                        {{ $data->jumlah_mhs }},
                    @endforeach
                ]
            }]
        });
        Highcharts.chart('containerJED', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Jumlah Mahasiswa Balzed'
            },
            subtitle: {
                text: 'Source: Aplikasi BALJEDD'
            },
            xAxis: {
                categories: [
                    @foreach ($grafikjed as $data)
                        '{{ $data->tahun_akademik }}',
                    @endforeach
                ],
                crosshair: true,
                accessibility: {
                    description: 'Program Studi'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Mahasiswa'
                }
            },
            tooltip: {
                valueSuffix: 'Orang'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Mahasiswa',
                data: [
                    @foreach ($grafikjed as $data)
                        {{ $data->jumlah_jed }},
                    @endforeach
                ]
            }]
        });

        Highcharts.chart('containerbaljed', {

            title: {
                text: 'Trend Jumlah Mahasiswa Balzedd per Tahun',
                align: 'left'
            },

            subtitle: {
                text: 'APK BALJEDD',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Trend Mahasiswa'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2023 to 2025'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2023
                }
            },

            series: [
                @foreach ($grafiktrendmhs as $data)
                    {
                        name: '{{ $data->nama_prodi }}',
                        data: [
                            {{ $data->jmhs_2023 }}, {{ $data->jmhs_2024 }}, {{ $data->jmhs_2025 }},
                        ]
                    }
                @endforeach
            ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
@endsection
