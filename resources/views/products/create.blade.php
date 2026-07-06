<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>
<body class="bg-light">

<div id="app" class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow">

                <!-- Header -->
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0">@{{ title }}</h3>
                </div>

                <!-- Body -->
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Enter product name"
                                value="{{ old('name') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input
                                type="number"
                                class="form-control"
                                name="qty"
                                placeholder="Enter quantity"
                                value="{{ old('qty') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                name="price"
                                placeholder="Enter price"
                                value="{{ old('price') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                rows="4"
                                placeholder="Enter product description">{{ old('description') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="{{ route('product.index') }}" class="btn btn-secondary">
                                ← Back
                            </a>

                            <button type="submit" class="btn btn-success">
                                Save Product
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
new Vue({
    el: '#app',
    data: {
        title: 'Create Product'
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>