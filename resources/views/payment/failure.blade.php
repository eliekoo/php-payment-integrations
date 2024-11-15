<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-danger">
            <h1>Payment Failed</h1>
            <p>Sorry, something went wrong with your payment. Please try again.</p>
            <a href="/paypal" class="btn btn-danger">Try Again</a>
        </div>
    </div>
</body>
</html>


@if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif