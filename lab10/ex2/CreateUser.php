<?php

function create()
{
  $name = $_POST["userName"];

  if(empty($name))
  {
    echo "You did not fill out a user name.";
  }
  else
  {
    $mysqli = new mysqli("mysql.eecs.ku.edu", "t047h556", "eenoh9AM", "t047h556");

    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "INSERT INTO Users(user_id)
              VALUES('$name')";

    if ($mysqli->query($query))
    {
     echo "New user was successfully stored in the database!";
    }
    else
    {
     echo "This user already exists.";
    }
    $mysqli->close();
  }
}

echo create();

?>
