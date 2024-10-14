<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #343a40;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 12px 10px;
            border: 2px solid #ced4da;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            border-color: #007bff;
        }

        .input-group label {
            position: absolute;
            left: 12px;
            top: 10px;
            transition: 0.2s;
            color: #6c757d;
            pointer-events: none;
        }

        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -10px;
            font-size: 12px;
            color: #007bff;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
            color: #007bff;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .signup-text {
            margin-top: 20px;
        }

        .signup-text a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form>
            <div class="input-group">
                <input type="text" id="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-group">
                <input type="password" id="password" required>
                <label for="password">Password</label>
                <span class="toggle-password" onclick="togglePassword()">👁</span>
            </div>
            <button type="submit" class="login-btn">Sign In</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.textContent = '🙈'; // Ganti ikon saat password terlihat
            } else {
                passwordField.type = 'password';
                toggleIcon.textContent = '👁'; // Ganti ikon saat password tersembunyi
            }
        }
    </script>
</body>
</html>
