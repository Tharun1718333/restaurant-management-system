<form action="inserting_values.php" method = "post" autocomplete="off">
  <div class="container">
    <h1>WELCOME</h1>
    <p>Please RESISTER.</p>
    <hr>

    <label for="name"><b>name<br /></b></label>
    <input type="text" placeholder="name" name="name" id="name" required>
    <br />
    <label for="password"><b>Password<br /></b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <br />
    <label for="phone_number"><b>phone_number<br /></b></label>
    <input type="number" placeholder="phone_number" name="phone_number" id="phone_number" required>
    <hr>
    <br />
    <input type="radio" name="user_type" value="chef" checked>chef<br>
    <input type="radio" name="user_type" value="waiter">waiter
    <br />
    <input type="radio" name="user_type" value="customer">customer
    <br />
    <button type="submit" class="registerbtn">Register</button>
  </div>

</form>