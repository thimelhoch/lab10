<?php

function users()
{
    $mysqli = new mysqli("mysql.eecs.ku.edu", "t047h556", "eenoh9AM", "t047h556");

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $users = "SELECT * FROM Users";

    echo "<table>";
    echo "<tr>";
    echo "<th><strong>" . "Users" . "</strong></th>";

    if ($result=$mysqli->query($users))
    {
      while ($row = $result->fetch_assoc())
      {
        echo "<tr><td>" . $row["user_id"] . "</td></tr>";
      }
    }
    echo "</table>";

    $result->free();
    
    $mysqli->close();
}

echo users();

?>
