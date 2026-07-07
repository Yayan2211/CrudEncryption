<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vue 2 -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.js"></script>
</head>
<body class="bg-light">

<div id="app" class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">@{{ title }}</h3>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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

                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary">
                                Register
                            </button>
                        </div>

                    </form>

                    <hr>

                    <div class="text-center">
                        <small class="text-muted">
                            Already have an account?
                        </small>
                        <br>
                        <a href="{{ route('login') }}" class="text-decoration-none">
                            Login Here
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
        title: 'User Registration'
    }
});
</script>

</body>
</html>