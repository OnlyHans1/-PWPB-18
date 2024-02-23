<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .login-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-header h2 {
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="login-header">
                    <h2>Login</h2>
                </div>
                <form class="form-horizontal" action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username" class="col-sm-12">Username</label>
                        <div class="col-sm-12">
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-12">Password</label>
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>