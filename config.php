<!-- connection -->

<?php 

$connect = mysqli_connect("localhost","root","","crud") or die("Could not connect to database");


// insertion function

function insertData($table, $data){
    global $connect;
    $columns = implode(', ', array_keys($data));
    $values = implode("','", array_values($data));
    $query = "INSERT INTO $table ($columns) value ('$values')";

    $run = mysqli_query($connect, $query);

    return $run;    
}


// calling function 
function callingData($table){
    global $connect;
    $data = [];
    $query  = mysqli_query($connect, "select * from $table");
    while($row = mysqli_fetch_array($query)){
        $data[]  = $row;
    }
    return $data;
}


function deleteData($table, $condition){
    global $connect;
    $query = "DELETE FROM $table WHERE $condition";
    $run = mysqli_query($connect, $query);
    return $run;
}

// redirct function
function redirect($page){
    echo "<script>open('$page','_self');</script>";
}




?>