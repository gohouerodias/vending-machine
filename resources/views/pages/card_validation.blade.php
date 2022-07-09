<!DOCTYPE html>
<!--Credit by Coding Zakir Subscribe Channel-->
<html>

<head>
    <title>Bootstrap 4 Payment Gateway Card UI Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="{{ asset('css/styleCV.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="container py-5">
        <form class="row needs-validation" novalidate="" method="POST" action="#">
            <div class="col-md-4 mb-3">
                <label for="cc-number">Subscriber card number</label>
                <input type="text" class="form-control" name="cc-number" id="cc-number" required=""
                    pattern="[0-9]{16}" data-value-missing="A credit card number is required"
                    data-pattern-mismatch="The credit card number must be 16 digits">
                <div class="invalid-feedback"></div>
            </div>
            <div class="col-md-12 mb-3">
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/scriptV.js') }}"></script>

</body>

</html>
