<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-success">
            <h1>Payment Successful!</h1>
            <p>Your payment has been successfully processed. Thank you for your purchase!</p>
            <a href="/" class="btn btn-primary">Return to Homepage</a>
        </div>
    </div>
</body>
</html>


@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif