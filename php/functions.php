<?php
//Jacob Baker
//February 8, 2017
//functions.php - functions that bridge sql and html together in oh-so-sweet harmony

    //connects to server and returns errors
    function connectServer($query, $userName)
    {
        $link = mysqli_connect("localhost","login","login","users");
        if(mysqli_connect_errno())
            $result = "Failed to connect to MySQL: " . mysqli_connect_error();
        elsec
        {
            $password = mysqli_query($link, "SELECT hash_password FROM Users WHERE user_name = $userName;");
            while($row = mysqli_fetch_assoc($password))
                $password = $row["hash_password"];
            $link = mysqli_connect("localhost",$userName,$password,"users");
            if(mysqli_connect_errno())
                $result = "Failed to connect to MySQL: " . mysqli_connect_error();
            else
                $result = mysqli_query($link, $query);
        }
        return $result;
    }

    //connects to server and logs you in succedes if it returns a positive privilige level
    function login($userName, $password)
    {
        $link = mysqli_connect("localhost","login","login","users");
        if(mysqli_connect_errno())
            $result = "Failed to connect to MySQL: " . mysqli_connect_error();
        else
        {
            $result = mysqli_query($link, "SELECT login('$userName','$password') AS privelege");
            while($row = mysqli_fetch_assoc($result))
                $result = $row["privelege"];
        }
        return $result;
    }
/*
    //returns an array with the first element being an array of safe ingriedients
    //the second would be an array of blacklisted ingriedients
    //the third and last would be an array of ingriedients with a max amount
    function getIngredients($user_name)
    {
        $ingriedients = connectServer("SELECT * FROM Ingriedients;");
        $blacklist = connectServer("SELECT * FROM Blacklist_Table WHERE user_name = '$user_name';");
        $i = 0;
        while($row = mysqli_fetch_assoc($blackList)
        {
            $allBlackList[$i] = $row["ingredient_id"];
            $i++;
        }
        $whiteListCount = 0;
        $blackListCount = 0;
        $redListCount = 0;
        while($row = mysqli_fetch_assoc($ingriedients)
        {
            $allIngredients = $row["ingredient_id"];
            if($allIngredients in $allBlackList)
            {
                if(something)
                {
                    $blackList[$blackListCount] = $allIngredients;
                    $blackList++;
                }
                else
                {
                    $redList[$redListCount] = $allIngredients;
                    $redListCount++;
                }
            }
            else
            {
                $whiteList[$whiteListCount] = $allIngredients;
                $whiteListCount++;
            }
                
        }
    }
*/
?>
