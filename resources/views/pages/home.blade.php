@extends('app')
@section('title', 'dashboard')


@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard </br>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


            </h3>
            <div classs="container p-5">
                <div class="row no-gutters fixed-bottom">
                    <div class="col-lg-5 col-md-12 ml-auto">
                        <div class="alert alert-gradient shadow" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="True" style="color:#fff">&times;</span>
                            </button>
                            <h4 class="alert-heading-gradient">Well done!</h4>
                            <p class="lead mb-0"> {{ __('Welcome to your admin account !') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .alert-gradient {
                    background: linear-gradient(to top right, #e66465, #9198e5);
                    border-radius: 0px;
                    border: none;
                    color: #fff;
                }

                .alert-heading-gradient {
                    color: #fff;
                    font-weight: 900;
                }

            </style>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i
                    class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><a href="#"
                                        data-toggle="modal" data-target="#modal1">Link<span>Earnings (monthly)</span></a>
                                </div>
                                <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Chiffre d'affaire</h4><button type="button"
                                                    class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>The content of your modal.</p>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button"
                                                    data-dismiss="modal">Close</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-info py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="modal fade" role="dialog" tabindex="-1" id="my_modal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal Title</h4><button type="button"
                                                    class="close" data-dismiss="modal" aria-label="Close"><span
                                                        aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col">
                                                    <div class="row">
                                                        @foreach ($prods as $product)
                                                            <div class="col-lg-6 mb-4">
                                                                <div class="card text-white bg-{{ $str }} shadow">
                                                                    <div class="card-body">
                                                                        <a class="card-link"
                                                                            href="{{ url('profileP', $product->id) }}">
                                                                            <p class="m-0"
                                                                                style="color: rgb(255,255,255);">
                                                                                {{ $product->name }} </p>
                                                                            <p class="text-white-50 small m-0">
                                                                                Quantity init=
                                                                                {{ $product->quantity_init }}</p>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"><button class="btn btn-light" type="button"
                                                    data-dismiss="modal">Close</button></div>
                                        </div>
                                    </div>
                                </div><a href="profile_product.html" data-toggle="modal" data-target="#my_modal">
                                    <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                        <span>Produit Disponible</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-left-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2"><a href="sellevent">
                                    <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                        <span>Historique de vente</span>
                                    </div>
                                </a></div>
                            <div class="col-auto"><i class="fas fa-history fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary font-weight-bold m-0">Earnings Overview</h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item"
                                    href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else
                                    here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area"><canvas
                                data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false},&quot;title&quot;:{},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="col-md-20 col-xs-1 ">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Revenues sources</h4>
                        </div>
                        <div class="card-body align-items-center">
                            <div id="pie_chart"
                                style="height: 300px; width: auto; align-items: center;align-content: center;align-self: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--progres de vente -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary font-weight-bold m-0">Progrès de vente&nbsp;</h6>
                    </div>
                    <div class="card-body">
                        @foreach ($prods as $item)
                            @php
                                $value = $item->quantity_init;
                                $value2 = countQuantiy($item->quantitySell);

                                $percent = intval(($value2 * 100) / $value);
                                $col = 'danger';
                                if ($percent <= 45) {
                                    $col = 'success';
                                }
                                if ($percent > 45 && $percent <= 60) {
                                    $col = 'warning';
                                }
                                if ($percent > 60 || $percent >= 100) {
                                    $col = 'danger';
                                }
                                $text = alertQuantity($item->id);
                            @endphp
                            <h4 class="small font-weight-bold">{{ $item->name }}<span
                                    class="float-right">{{ $text ? $text : $percent . '%' }}</span>
                            </h4>

                            <div class="progress mb-4">
                                <div class="progress-bar bg-{{ $col }}" aria-valuenow="20" aria-valuemin="0"
                                    aria-valuemax="100" style="width: {{ $percent }}%;"><span
                                        class="sr-only">{{ $percent . '%' }}</span>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>

        <!--End progres de vente -->
    </div>
    <script type="text/javascript">
        var analytics = <?php echo $array; ?>

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title: 'current sales turnover in percentage (XOF)'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection
