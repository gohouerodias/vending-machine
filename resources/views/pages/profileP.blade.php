@extends('app')

@section('title', 'profile Product')


@section('content')
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

    <div class="container-fluid">
        <h3 class="text-dark mb-4">{{ $prod->name }}</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img class="img-fluid" alt="{{ $prod->image }}" src=" {{ asset('images/' . $prod->image) }}"
                            width="250" height="250">


                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('image-upload-product/' . $prod->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-7">
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card shadow ">
                                <div class="container">
                                    <div class="row">
                                        <div class="col ">
                                            <div class="card ">
                                                <div class="card-header">
                                                    <h3>Bar Series</h3>
                                                </div>
                                                <div class="card-block">
                                                    <div id="chart1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- chart bar for sell event -->
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <canvas id="myChart" width="10" height="10"></canvas>
                                <script>
                                    var labels = <?php echo json_encode($labels); ?>;
                                    var datas = <?php echo json_encode($data); ?>;


                                    const data = {
                                        labels: labels,
                                        datasets: [{
                                            label: 'My First dataset',
                                            backgroundColor: 'rgb(25, 99, 132)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            data: datas,

                                        }]
                                    };

                                    const config = {
                                        type: 'bar',
                                        data: data,
                                        options: {
                                            plugins: {
                                                title: {
                                                    display: true,
                                                    text: 'hello chart'
                                                }
                                            },
                                            scales: {
                                                y: {
                                                    stacked: true
                                                }
                                            }
                                        },
                                    };
                                </script>
                                <script>
                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config
                                    );
                                </script>
                                <!-- End chart bar for sell event -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Product information</p>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('update_product/' . $prod->id) }}" method="POST">
                                    @csrf

                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="productname"><strong>Product
                                                        name</strong></label>
                                                <input class="form-control" type="text" value="{{ $prod->name }}"
                                                    name="name" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="price">Price in
                                                    FCFA&nbsp;<br></label>
                                                <input class="form-control" type="number" inputmode="numeric"
                                                    value="{{ $prod->price_unit }}" name="price" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="container"><strong>Container</strong><br></label><input
                                                    class="form-control" type="text" value="{{ $prod->room->nom }}"
                                                    name="container" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="quantity"><strong>Quantity</strong><br></label><input
                                                    class="form-control" type="text" name="quantity"
                                                    value="{{ $prod->quantity_init }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="expiration_date"><strong>Expiration
                                                        date</strong><br></label><input class="form-control" type="date"
                                                    name="expiration_date" value="{{ $prod->expiration_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label
                                                    for="description"><strong>Description</strong><br></label><input
                                                    class="form-control" type="text" name="description"
                                                    value="{{ $prod->description }}">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">
                                            Update data</button></div>
                                </form>
                            </div>
                            @php
                                $value = $prod->quantity_init;
                                $value2 = countQuantiy($prod->quantitySell);

                                $restant = $value - $value2;
                                $percent = intval(($value2 * 100) / $value);

                                $col = 'danger';
                                if ($percent > 0 && $percent <= 45) {
                                    $col = 'success';
                                } elseif ($percent > 45 && $percent < 60) {
                                    $col = 'warning';
                                } elseif ($percent >= 60 && $percent < 100) {
                                    $col = 'danger';
                                }

                            @endphp
                            <h6>Nombre restant actuellement : {{ $restant }} </h6>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $col }}"
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: {{ $percent }}%"></div>
                            </div>
                        </div>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> Indicates a successful or positive action.
                        </div>
                        @php
                            $message = alertQuantity($prod->id);

                            if ($message != '') {
                                echo "  <div class='alert alert-danger alert-dismissible'>
                                                                                                                                                                                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                                                                                                                                                                            <strong>Warning!</strong> " .
                                    $message .
                                    "
                                                                                                                                                                                                        </div>";
                            }
                        @endphp



                    </div>

                </div>
            </div>
        </div>

    @endsection
