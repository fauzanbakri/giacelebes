<?Php
include 'config.php';
$q = $con->query("SELECT * FROM data_email");
echo'
    <thead>
        <tr>
        <th>No</th>
        <th>Email</th>
        <th>Action</th>
        </tr>
    </thead>
';
$no=1;
foreach($q as $row){
echo'
    <tbody>        
        <tr>
        <td><center>'.$no.'</td>
        <td>'.$row['email'].'</td>
        <td><center><a class="btn btn-danger" onclick="del_email('.'\''.$row["email"].'\''.')"><i class="fas fa-trash"></i></a></td>
        </tr>
    </tbody>
';
$no++;
}
?>