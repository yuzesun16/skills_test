<html>
<head>
    <title>Skil Test</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('products') }}">Product Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('products') }}">View All Products</a></li>
            <li><a href="{{ URL::to('products/create') }}">Create a Product</a>
        </ul>
    </nav>

    <h1>Edit {{ $product->name }}</h1>


    {{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }}

    <div class="form-group">
        <label for="name">Product Name</label>
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        {{ Form::text('quantity', Input::old('quantity'), array('class' => 'form-control')) }}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    {{ Form::close() }}

</div>
</body>
</html>