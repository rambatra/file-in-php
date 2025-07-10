<?php
$con=mysqli_connect('localhost','root','','cred');
$sql="SELECT * FROM employees";
$result= mysqli_query($con,$sql);
$outcome="";
if(mysqli_num_rows($result)>0){
    $outcome="<table border='1px'>
    <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Role</td>
    </tr>";
    while($row= mysqli_fetch_assoc($result)){
        $outcome .="<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td></tr>";
    }
    $outcome .="</table>";
}
echo  $outcome ;
?>