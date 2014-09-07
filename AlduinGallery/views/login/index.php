<?php if(empty($logged_user)): ?>
<form method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"/>
    <label for="pass">Password</label>
    <input type="password" id="pass" name="pass"/>
    <input type="submit" value="Login"/>
</form>
<?php endif; ?>