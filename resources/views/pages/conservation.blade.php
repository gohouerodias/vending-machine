@extends('app')

@section('title', 'Conservation')


@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Temperatures et humidité résidant dans chaque chambre</h3>
        </div>

        @foreach ($data as $data)
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">{{ $data->room->nom }}</h3>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                        <span>temperature</span>
                                    </div>

                                    <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $data->temperature }}</span>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-temperature-low fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-5">
                    <div class="card shadow border-left-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                        <span>Humidité</span>
                                    </div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>{{ $data->humidity }}</span>
                                    </div>
                                </div>
                                <div class="col-auto"><i class="fas fa-percent fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary font-weight-bold m-0">Durée de conservation</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Croissant<span class="float-right">5 jours</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                        style="width: 40%;"><span class="sr-only">40%</span></div>
                </div>
                <h4 class="small font-weight-bold">Oeuf<span class="float-right">7 jours</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                        style="width: 60%;"><span class="sr-only">60%</span></div>
                </div>
                <h4 class="small font-weight-bold">Viande<span class="float-right">11 jours&nbsp;</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                        style="width: 80%;"><span class="sr-only">80%</span></div>
                </div>
                <h4 class="small font-weight-bold">Saucisse<span class="float-right">2 semaines !</span></h4>
                <div class="progress mb-4 bg-danger" style="color: var(--danger);">
                    <div class="progress-bar bg-success bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                        style="width: 100%;"><span class="sr-only">100%</span></div>
                </div>
            </div>
        </div>

        <!--Customized bootstrap alert with icons-->
        <div classs="container p-5">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12">
                    <div class="alert-danger shadow my-3" role="alert" style="border-radius: 0px">
                        <div class="row">
                            <div class="col-2">
                                <div class="text-center" style="background:#721C24">
                                    <svg width="3em" height="3em" style="color:#F8D7DA" viewBox="0 0 16 16"
                                        class="m-1 bi bi-exclamation-circle-fill" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="alert col-10 my-auto">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True" style="color:#721C24">&times;</span>
                                </button>
                                <div class="row">
                                    <p style="font-size:18px" class="mb-0 font-weight-light"><b
                                            class="mr-1">Danger!</b>This example text in a custom alert.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12">
                    <div class="alert-primary shadow my-3" role="alert" style="border-radius: 0px">
                        <div class="row">
                            <div class="col-2">
                                <div class="text-center" style="background:#004085">
                                    <svg width="3em" height="3em" style="color:#CCE5FF" viewBox="0 0 16 16"
                                        class="m-1 bi bi-bell-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="alert col-10 my-auto">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True" style="color:#155724">&times;</span>
                                </button>
                                <div class="row">
                                    <p style="font-size:18px" class="mb-0 font-weight-light"><b
                                            class="mr-1">Alert:</b>This example text in a custom alert.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12">
                    <div class="alert-success shadow my-3" role="alert" style="border-radius: 0px">
                        <div class="row">
                            <div class="col-2">
                                <div class="text-center" style="background:#155724">
                                    <svg width="3em" height="3em" style="color:#D4EDDA" viewBox="0 0 16 16"
                                        class="m-1 bi bi-shield-fill-check" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="alert col-10 my-auto">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True" style="color:#155724">&times;</span>
                                </button>
                                <div class="row">
                                    <p style="font-size:18px" class="mb-0 font-weight-light"><b
                                            class="mr-1">Success!</b>This example text in a custom alert.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12">
                    <div class="alert-warning shadow my-3" role="alert" style="border-radius: 0px">
                        <div class="row">
                            <div class="col-2">
                                <div class="text-center" style="background:#856404">
                                    <svg width="3em" height="3em" style="color:#FFF3CD" viewBox="0 0 16 16"
                                        class="m-1 bi bi-cone-striped" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.97 4.88l.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.158-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="alert col-10 my-auto">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="True" style="color:#856404">&times;</span>
                                </button>
                                <div class="row">
                                    <p style="font-size:18px" class="mb-0 font-weight-light"><b
                                            class="mr-1">Warning:</b>This example text in a custom alert.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
