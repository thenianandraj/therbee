<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        <div id="error-message" class="text-danger mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Handle form submission
        $(document).on('submit', '#loginForm', function(event) {
            event.preventDefault();

            // Get form data
            const email = $('#email').val();
            const password = $('#password').val();

            // Clear any previous error message
            $('#error-message').text('');

            // Send login request to Laravel backend
            $.ajax({
                url: '/login', // Change this to your API endpoint if needed
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: '{{ csrf_token() }}' // Include CSRF token for security in Laravel
                },
                success: function(response) {
                    // If login is successful, redirect to dashboard or home
                    window.location.href = '/category_list'; // Adjust this route as necessary
                },
                error: function(xhr) {
                    // If login fails, display error message
                    const errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'Something went wrong!';
                    $('#error-message').text(errorMessage);
                }
            });
        });
    </script>
</body>
</html>
