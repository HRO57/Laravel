<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Shopping Cart add to cart with Stripe Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Additional custom styles can be added here */
    </style>
</head>
<body>
    <div class="container">
        <div class='row'>
            <h1>Checkout</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <p>Your items are ready for checkout.</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Product 1
                                <span class="badge bg-primary">Quantity: 2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Product 2
                                <span class="badge bg-primary">Quantity: 1</span>
                            </li>
                            <!-- Add more list items for other products -->
                        </ul>
                        <hr>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Continue Shopping</a>

                        {{-- <form action="/session" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <a href="#" class="btn btn-success float-end">Proceed to Payment <i class="fas fa-arrow-right"></i></a>
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
