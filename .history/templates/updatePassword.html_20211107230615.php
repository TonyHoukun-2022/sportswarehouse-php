<div class="section-heading-container">
  <h2 class="section-heading"><?= $title ?></h2>
</div>
<form action="updatePassword.php" method="POST">
  <fieldset>
    <legend>Update password</legend>
    <p>
      <label for="newPassword">New password:</label>
      <input type="password" id="newPassword" name="newPassword" required>
    </p>
    <p>
      <input type="submit" value="Change password">
    </p>
  </fieldset>
</form>
<p><?= $message ?></p>