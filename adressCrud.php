<?php

/**
 * Create user 
 * 
 */
function createAdress($p1,$p2,$p3,$p4,$p5)
{
    global $conn;
    
    /*$query = "INSERT INTO adress VALUES (NULL, $data['street0'], $data['street_nb0'], $data['type0'],$data['city0'],
      $data['zipcode0'])";*/
      //$query = "INSERT INTO adress (firstname, lastname, email)  VALUES (?,?,?,?,?)";
      
      $stmt = $conn->prepare("INSERT INTO adress (street, street_nb ,city, type1, zipcode)  VALUES ('?', '?','?','?', '?')");
      $stmt->bind_param("sssss", $p1,$p2,$p3,$p4,$p5);

    // set parameters and execute
    /*  $firstname = "John";
     $lastname = "Doe";
     $email = "john@example.com"; */
     $stmt->execute();

    // mysqli_query($conn, $query);

   /*  if ($stmt = mysqli_prepare($conn, $query)) {
        
        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $data['street'.$i],
            $data['street_nb'.$i],
            $data['type'.$i],
             $data['city'.$i],
            $data['zipcode'.$i]
        );

        Exécution de la requête 
        $result = mysqli_stmt_execute($stmt);
    } */
}

function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function createUser(array $data)
{
    global $conn;
    
    $query = "INSERT INTO user VALUES (NULL, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        
        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $data['user_name'],
            $data['email'],
            $data['pwd']
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
