<?php

function writePost()
{
    $name = $_POST["userName"];
    $post = $_POST["userPost"];

    if(empty($name))
    {
        echo "You did not fill out a user name.";
    }

    else
    {
        if(empty($post))
        {
            echo "Your post has no text, and hence could not be saved.";
            $empty=1;
        }

        if($empty!=1)
        {
            $mysqli = new mysqli("mysql.eecs.ku.edu", "t047h556", "eenoh9AM", "t047h556");
        
            if ($mysqli->connect_errno)
            {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

            $insert = "INSERT INTO Posts(author_id, content)
                        VALUES('$name', '$post')";

            $checkUsers = "SELECT * FROM Users";
            if ($result=$mysqli->query($checkUsers))
            {
                while ($row = $result->fetch_assoc())
                {
                    if($row["user_id"]==$name)
                    {
                        if($mysqli->query($insert))
                        {
                            $userExists=1;
                            cho "A new post written by " .$name." was successfully stored in the database!";
                        }
                    }
                }
                if($userExists!=1)
                {
                    echo "The post was not written by an existing user, and hence could not be saved.";
                }
      
                $result->free();
            }
            $mysqli->close();
        }
    }
}

echo writePost();
?>
