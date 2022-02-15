@extends('admin._layout')
@section('content')
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Usuários registrados</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 572px;" width="715" height="312" class="chartjs-render-monitor"></canvas>

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
                        data: [700,500,400],
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

        })
    </script>
    @endsection

@endsection
