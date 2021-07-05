<form action="validating_values.php" method = "post" autocomplete="off">
  <div class="container">
    <h1>WELCOME</h1>
    <p>Please LOGIN.</p>
    <hr>

    <label for="login_id"><b>NAME<br /></b></label>
    <input type="number" placeholder="login_id" name="login_id" id="login_id" required>
    <br />
    <label for="login_password"><b>Password<br /></b></label>
    <input type="password" placeholder="login_password" name="login_password" id="login_password" required>
    <br />
    <input type="radio" name="login_user_type" value="chef" checked>chef<br>
    <input type="radio" name="login_user_type" value="waiter">waiter
    <br />
    <input type="radio" name="login_user_type" value="customer">customer
    <br />
    <button type="submit" class="loginbtn">Login</button>
  </div>

</form>