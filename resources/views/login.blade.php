<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>
<body class="bg-light">

<div id="app" class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <!-- Header -->
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">@{{ title }}</h3>
                </div>

                <!-- Body -->
                <div class="card-body">

                    <!-- @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif -->

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                                autofocus>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                    </form>

                    <hr>

                    <div class="text-center">
                        <small class="text-muted">
                            Don't have an account?
                        </small>
                        <br>
                        <a href="{{ route('register') }}" class="text-decoration-none">
                            Create an Account
                        </a>
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
        title: 'Login'
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>