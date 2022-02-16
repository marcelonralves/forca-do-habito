@extends('admin._layout')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countCards['customers'] }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fas fa-user-plus"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $countCards['users'] }}</h3>
                    <p>Usuários</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $countCards['categories'] }}</h3>
                    <p>Categorias</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="card card-primary" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>


            <div class="card card-danger" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="donutChart" style="min-height: 250px; height: 0px; max-height: 250px; max-width: 100%; display: block; width: 0px;" width="0" height="0" class="chartjs-render-monitor"></canvas>
                </div>

            </div>


            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Clientes Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card card-info" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>


            <div class="card card-success" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Bar Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>


            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Clientes Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>

            </div>

        </div>

    </div>
@section('script')
    <script>
        $(function () {
            let usersData        = {
                labels: [
                    'Grátis',
                    'Normal',
                    'Prêmio',
                ],
                datasets: [
                    {
                        data: [{{ $pizzaCustomer[0] }},{{ $pizzaCustomer[1] }},{{ $pizzaCustomer[2] }}],
                        backgroundColor : ['#f56954', '#00a65a', '#f39c12',],
                    }
                ]
            }
            let pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            let pieData        = usersData;
            let pieOptions     = {
                maintainAspectRatio : false,
                responsive : true,
            }
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })


            //---------------------
            //- STACKED BAR CHART -
            //---------------------

            var areaChartData = {
                labels  : ['{{ $countRegs[0]['day'] }}', '{{ $countRegs[1]['day'] }}', '{{ $countRegs[2]['day'] }}', '{{ $countRegs[3]['day'] }}', '{{ $countRegs[4]['day'] }}', '{{ $countRegs[5]['day'] }}', '{{ $countRegs[6]['day'] }}'],
                datasets: [
                    {
                        label               : 'Clientes',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            {{ $countRegs[0]['count'] }}, {{ $countRegs[1]['count'] }}, {{ $countRegs[2]['count'] }}, {{ $countRegs[3]['count'] }}, {{ $countRegs[4]['count'] }}, {{ $countRegs[5]['count'] }}, {{ $countRegs[6]['count'] }}]
                    },
                ]
            }

            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')

            var stackedBarChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: areaChartData,
                options: stackedBarChartOptions
            })
        })

    </script>
@endsection

@endsection
