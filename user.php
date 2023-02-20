<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRIP Banking System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="data.css">

</head>
<body>
        <div class="header">
            <div class="logo">
                GRIP BANK
            </div>
            <div class="menu">
                <ul>
                    <li><a class="lin" href="index.php">Home</a></li>
                    <li style="background-color: tomato;"><a class="lin" href="user.php">Customers</a></li>
                    <li><a class="lin" href="transaction.php">Transaction History</a></li>
                    <li><a class="lin" href="https://www.thesparksfoundationsingapore.org/">About</a></li>
                </ul>
            </div>
        </div>
    <div class="cons const">
        <form method="POST">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Current Balance</th>
                <th>View</th>
            </tr>
            <tbody>
                <?php
                    $db=mysqli_connect("localhost","root","","grip");
                    $query= mysqli_query($db,"SELECT * FROM customer ");
                    while($row=mysqli_fetch_assoc($query)){
                        $id=$row['id'];
                        $name=$row['name'];
                        $email=$row['email'];
                        $balance=$row['balance'];
                        echo '<tr>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$balance.'</td>
                        <td>  <button class="select" ><a href="moneytransfer.php?sid='.$id.'"  class="lon" >SELECT</a></button> </td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>

    </form>
    </div>
     <div class="footer">
        <p>©2023 ROJINA SWAIN</p>
    </div>
</body>
</html> 