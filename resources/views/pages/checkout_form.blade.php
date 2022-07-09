<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/styleC.css') }}" type="text/css">
</head>

<body>
    <div class="container col-8 my-5 br-2 rounded">
        <div class="row g-3">
            <div class="col-4 order-md-last">
                <h4 class="d-flex justify-content-between align-item-center">
                    <span class="text-muted">purchase history</span>
                    <span class="badge bg-secondary rounded-pill">3</span>
                </h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>Product name (01)</h6>
                            <span class="text-muted">10/02/21</span>
                        </div>
                        <span class="text-muted">500 fcfa</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>Product name (01)</h6>
                            <span class="text-muted">10/02/21</span>
                        </div>
                        <span class="text-muted">500 fcfa</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>Product name (01)</h6>
                            <span class="text-muted">10/02/21</span>
                        </div>
                        <span class="text-muted">500 fcfa</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>Product name (01)</h6>
                            <span class="text-muted">10/02/21</span>
                        </div>
                        <span class="text-muted">500 fcfa</span>
                    </li>
                </ul>
            </div>
            <div class="col-8">
                <h4>Billing Address</h4>
                <form>
                    <div class="card text-center">
                        <div class="card-header">
                            <h5 class="card-title">
                                Actual Balance</h5>

                        </div>
                        <div class="card-body">
                            <B>
                                <h1 class="card-title">400 XOF</h1>
                            </B>

                        </div>
                        <div class="card-footer text-muted">Refill since 10/02/21</div>
                    </div>
                    <hr>

                    <h4>Recharge</h4>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="creditcard">Insert the amount to top up </label>
                            <input type="number" min="100" value="100" max="1000" id="creditcard"
                                class="form-control">
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Continue To Checkout</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
