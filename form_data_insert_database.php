<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body{
    background-color: greenyellow;
   
}
.errorcolor{
        color: red;
    }
    </style>
</head>
<body>
    <!--.................................................PHP START.................................... -->
    <?php
    // ..........................Validation start .....................................
    $nameError = $emailError = $phoneError = $pincodeError = $address ="";
    $email = $name= $pincode = $phonenumber= $submited="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
 

        if(empty($_POST["name"])){
            $nameError = "Name is mandatory" ;
        }
        else{
            $name = input_test($_POST["name"]);

            if(!preg_match("/^[a-zA-Z-']*$/",$name)){
                // $nameError = "only albhabet required";
            }
        }

        //  ....................................................... Email section..................................
        if(empty($_POST["email"])){
            $emailError = " email required";
        }
        else{
            $email = input_test($_POST["email"]);

            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $emailError = " email format wrong";
            }
        }
        // ..........................................................phone...............................
        if(empty($_POST["phonenumber"])){
            $phoneError = "number is compulsary";
        }
        else{
            $phonenumber =input_test($_POST["phonenumber"]);
            
        }

        // .......................................................pin code...........................
        if(empty($_POST["pincode"])){
            $pincodeError = "pin code compulsary";
        }
        else{
            $pincode = input_test($_POST["pincode"]);
        }

        $submited =input_test($_POST["submited"]);
    }

    function input_test($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars(($data));
        return $data;
    }
// ..................................................Connect data and insert data into data base start.......................
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "personaldb";


// iam connecting data php  to data base 
$connect = mysqli_connect( $servername,  $username, $password,$dbname);

// i am chekking database connect or not
if(!$connect){
    die("connection faild".mysqli_connect_error());
}
//  .................................................create database..................................

// $sql = "CREATE DATABASE personaldb";
// if(mysqli_query($connect,$sql)){
//   echo "data created successfully";
// }
// else{
//     echo "error".mysqli_error($connect);
// }
// mysqli_close($connect);

// ..........................................................create table..........................................

 
// $sql = "CREATE TABLE students(
//       id INT AUTO_INCREMENT PRIMARY KEY,
//      stname VARCHAR(30) NOT NULL,
//    email VARCHAR(40),
//    phone VARCHAR(10) NOT NULL)";
  
//    if(mysqli_query($connect,$sql)){
//     echo "table success fully created";
//    }
//    else{
//     echo "error".mysqli_error($connect);
//    }
//    mysqli_close($connect)

// ......................................................updation in field...............................


//  $sql = "ALTER TABLE students
//  ADD pincode VARCHAR (20)";
// if(mysqli_query($connect,$sql)){
//     echo "update successfully";
// }else{
//     echo "error!" .mysqli_error($connect);
// }
// mysqli_close($connect);

// ....................................................INSERT DATA IN database cammand....................


//  $sql = "INSERT INTO students(stname,email,phone,pincode) VALUES('pushpendra kumar sharma', 'pushpendra1212088@gmail.com','8650452700','203393')";
//  if(mysqli_query($connect,$sql)){
//     echo "data insert successfully";
//  }else{
//     echo "error".mysqli_error($connect);
//  }

//  $sql = "INSERT INTO students(stname,email,phone,pincode,address) VALUES('pushpendra kumar sharma', 'pushpendra1212088@gmail.com','8650452700','203393','lucknow')";
//  if(mysqli_query($connect,$sql)){
//     echo "data insert successfully";
//  }else{
//     echo "error".mysqli_error($connect);
//  }
//.....................................................................DELETE TABLE RECORD COMMAND.....................


// $sql = "DELETE FROM students";
// if(mysqli_query($connect,$sql)){
//     echo "data delete succussfully";
// }else{
//     echo "error".mysqli_error($connect);
// }


//   .............................form data into data base query......................

$sql = "INSERT INTO students(stname,email,phone,pincode,address) VALUES('$name','$email','$phonenumber','$pincode','$address')";

(mysqli_query($connect,$sql));
mysqli_close($connect);

  ?>

   <!--  ..............................................HTML FORM start............................ -->
    <center><h1>REGISTRATION FORM</h1></center>

    <center><form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <b>Name:</b> <input type="text" name="name" placeholder="Enter name" >
    <span class="errorcolor">* <?php echo $nameError;?></span>
    
    <br><br>


    <b>Email:</b> <input type="text" name="email" placeholder="enter meil">
    <span class="errorcolor">* <?php echo  $emailError;?></span>
    <br><br>

    
    <b>Phone:</b> <input type="text" name="phonenumber" placeholder="Phone">
    <span class="errorcolor">* <?php echo $phoneError;?></span>
    <br><br>


    <b>Pin Code:</b> <input type="text" name="pincode" placeholder="enter pin code">
     <span class="errorcolor">* <?php echo $pincodeError;?></span><br><br>


    <b>Address:</b><textarea name="Address" id="" cols="30" rows="10"></textarea><br><br>
     <input type="hidden" name="submited" value="Data submitted successfully">
    <input type="submit" name=" submit" value="submit"></center>
    </form>


    <!-- <?php
    // if($nameError == "Name is mandatory"){
    //     echo "Error";
    // }else{
    //     echo $submited;
    // }
    ?> -->


<?php echo  "<B>By Pushpendra Kumar sharma</B>";
?>


</body>
</html>