<?php
function pledgeHouse($connect, $char_id, $user_email, $user_id)
{
  echo "<form action='interaction.php' method='post'>";
  echo "<input type='hidden' name='user_email' value='" . $user_email . "' />";
  echo "<input type='hidden' name='user_id' value='" . $user_id . "' />";
  echo "<input type='hidden' name='char_id' value='" . $char_id . "' />";
  echo "<p><input type='text' name='house_name' placeholder='Enter name of House' size='40' /></p>";
  echo "<p><input type='submit' name='pledge_house' value='Submit' /></p>";
}
 ?>