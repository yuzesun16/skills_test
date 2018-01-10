<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('products') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('products') }}">View All Products</a></li>
            <li><a href="{{ URL::to('products/create') }}">Post a Product</a>
        </ul>
    </nav>

    <h1>All the Products</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Total Value</td>
            <td>Created DateTime</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>${{ $product->total_value }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="panel">
        <div class="panel-heading">JSON Format</div>
        <div class="panel-body">{{ $products_json }}</div>
    </div>

</div>
</body>
</html>