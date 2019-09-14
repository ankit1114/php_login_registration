<?php
session_start();
include("header.php");
?>
<div class="container">

  <div>
    <label for="name">Name:</label>
    <input type="text" name="full name" placeholder="full name">
  </div>

  <div class="form-group">
    <label for="email_id">Email Id:</label>
    <input type="text" name="email id" placeholder="Emailid">
  </div>
  <div class="form-group">
    <label for="Message">Message:</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:170px"></textarea>
  </div>
  <div class="form-group">
    <input type="submit" value="Submit">
  </div>
</div>
<?php
include("footer.php");
?>
