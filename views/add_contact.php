<?php include ('includes/header.php')?>
<body style = "font-family: Arial, sans-serif;
    background-color: #e2e8f8;
    color: #2c3e50;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;">
    <div class="login-container" id="login-page">
        <div class="login_header">
            <h2>Add Contact</h2>
        </div>
        <div class="login-container">
            <form id="login-form" method="POST" action="/controller">
                <div class="login-form-group">
                    <label >Username</label>
                    <input type="text" name="username" required>
                </div>
                <button type="submit" class="signin-btn" name = "add_contact">Add-Contact</button>
            </form>
        </div>
    </div>
   
<?php include ('includes/footer.php')?>