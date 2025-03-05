<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/LOGIN/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="form-box login">
            <form action="/MYsql/login.php" method="POST"> 
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" placeholder="Correo Electronico" name="email">
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Contraseña" name="password">
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>or login width social platforms</p>
                <div class="social-icons">
                    <a href="#" class="bx bxl-google"></a>
                    <a href="#" class="bx bxl-facebook"></a>
                    <a href="#" class="bx bxl-github"></a>
                    <a href="#" class="bx bxl-linkedin"></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="/MYsql/register.php" method="POST" class="formulario__register"> 
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" placeholder="Nombre completo" name="full_name">
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Correo Electronico" name="email">
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <div class="input-box">
                    <input type="text" placeholder="Usuario" name="username">
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <div class="input-box">
                    <input type="password" placeholder="Contraseña" name="password">
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <button type="submit" class="btn">Register</button>
                <p>or login width social platforms</p>
                <div class="social-icons">
                    <a href="#" class="bx bxl-google"></a>
                    <a href="#" class="bx bxl-facebook"></a>
                    <a href="#" class="bx bxl-github"></a>
                    <a href="#" class="bx bxl-linkedin"></a>
                </div>
            </form>
        </div>
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, welcomw!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Hello, Welcome!</h1>
                <p>Already an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="/LOGIN/script.js"></script>
</body>
</html>