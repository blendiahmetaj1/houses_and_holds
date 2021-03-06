<?php
function writeLocalCharacters($connect, $location)
{
  $sql = "SELECT * FROM characters WHERE is_online=1 AND location_id=" . $location['id'];
  $result = mysqli_query($connect, $sql);

  $path = "gamelogs/charsLoc" . $location['id'] . ".html";
  $fp = fopen($path, 'w+');
  //ftruncate($fp, 0);

  if($result->num_rows > 0)
  {
    fwrite($fp, "<table><tr><th>People</th></tr>");

    while($row = $result->fetch_assoc())
    {
      fwrite($fp, "<tr><td>");
      fwrite($fp, $row['name']);

      // write character house if they have one
      if(!is_null($row['house_id']))
      {
        $sql2 = "SELECT name FROM houses WHERE id=" . $row['house_id'];
        $result2 = mysqli_query($connect, $sql2);

        if($result2->num_rows > 0)
        {
          while($row2 = $result2->fetch_assoc())
          {
            fwrite($fp, " ");
            fwrite($fp, $row2['name']);
          }
        }
      }

      fwrite($fp, "</td></tr>");
    }

    fwrite($fp, "</table>");

  }
  else
  {
    fwrite($fp, "<table><tr><th>People</th></tr>");
    fwrite($fp, "<tr><td>");
    fwrite($fp, "No one here.");
    fwrite($fp, "</td></tr>");
    fwrite($fp, "</table>");
  }

  fclose($fp);
}
 ?>
