<?php

function userPosts()
{
  $name = $_POST["selectUser"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "t047h556", "eenoh9AM", "t047h556");

  $posts = "SELECT content
            FROM Posts
            WHERE author_id='$name'";

  echo "<table>";
  echo "<th><strong>" . "Posts made by " . $name . "</strong></th>";
  if ($result=$mysqli->query($posts))
  {
    while ($row = $result->fetch_assoc())
    {
      echo "<tr><td>" . $row["content"] . "</td></tr>";
    }
  }
  echo "</table>";

  $result->free();

  $mysqli->close();
}

echo userPosts();

?>
