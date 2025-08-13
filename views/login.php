<?php
include ('includes/header.php')?>
<body style = "font-family: Arial, sans-serif;
    background-color: #e2e8f8;
    color: #2c3e50;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;">
    <div class="login-container" id="login-page">
        <div class="login_header">
            <h1>Welcome Back</h1>
        </div>
        <div class="login-container">
            <form id="login-form" method="POST" action="/controller">
                <div class="login-form-group">
                    <label >Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="login-form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="signin-btn" name = "login_btn">Sign In</button>
                <div class="login-signup-link">
                    Don't have an account? <a href="/signup">Sign up</a>
                </div>
            </form>
        </div>
    </div>
   
<?php include ('includes/footer.php')?>