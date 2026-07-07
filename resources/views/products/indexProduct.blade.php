<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>
<body class="bg-light">

<div id="app" class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow">

                <!-- Header -->
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">@{{ title }}</h3>

                    <a href="{{ route('product.create') }}" class="btn btn-light">
                        + Create Product
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">

                    @if(session()->has('success'))
                        <div id="success-alert" class="alert alert-success">
                            {{ session('success') }}
                        </div>

                        <script>
                            setTimeout(function () {
                                const alert = document.getElementById('success-alert');
                                if (alert) {
                                    alert.style.transition = 'opacity 0.5s';
                                    alert.style.opacity = '0';

                                    setTimeout(() => {
                                        alert.remove();
                                    }, 500);
                                }
                            }, 3000);
                        </script>
                    @endif

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped align-middle">

                            <thead class="table-dark align-center">
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center" width="100">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                            @forelse($products as $product)

                                <tr>

                                    <!-- <td>{{ $product->id }}</td> -->

                                    <td>{{ $product->name }}</td>

                                    <td>{{ $product->qty }}</td>

                                    <td>${{ number_format($product->price,2) }}</td>

                                    <td>{{ $product->description }}</td>

                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('product.view', ['product' => $product]) }}"
                                            class="btn btn-primary btn-sm"
                                            title="View">
                                                <i class="bi bi-eye"></i>
                                            </a>

                                            <a href="{{ route('product.edit', ['product' => $product]) }}"
                                            class="btn btn-warning btn-sm"
                                            title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('product.destroy', ['product' => $product]) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                    <!-- <td>

                                        <form method="POST"
                                              action="{{ route('product.destroy',['product'=>$product]) }}">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm w-100"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                    <td>

                                        <a href="{{ route('product.view',['product'=>$product]) }}"
                                           class="btn btn-primary btn-sm w-100">
                                            View
                                        </a>

                                    </td> -->

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7" class="text-center text-muted">
                                        No products found.
                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

<script>
new Vue({
    el: '#app',
    data: {
        title: 'Product Management'
    }
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>