<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRIP Banking System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="data.css">
</head>
<body>
    
        <div class="header">
            <div class="logo">
                GRIP BANK
            </div>
            <div class="menu">
                <ul>
                    <li><a class="lin" href="index.php">Home</a></li>
                    <li><a class="lin" href="user.php">Customers</a></li>
                    <li style="background-color: tomato;"><a class="lin" href="transaction.php">Transaction History</a></li>
                    <li><a class="lin" href="https://www.thesparksfoundationsingapore.org">About</a></li>
                </ul>
            </div>
        </div>
    <div class="cons const">
         <form method="POST">
        <table>
            <tr>
                <th>Sl.No.</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Amount</th>
            </tr>
            <tbody>
                <?php
                    $db=mysqli_connect("localhost","root","","grip");
                    $query= mysqli_query($db,"SELECT * FROM transactions ");
                    $counter=1;
                    while($row=mysqli_fetch_assoc($query)){
                        
                        $sname=$row['sender'];
                        $rname=$row['receiver'];
                        $amount=$row['amount'];
                        echo '<tr>
                        <td>'.$counter.'</td>
                        <td>'.$sname.'</td>
                        <td>'.$rname.'</td>
                        <td>'.$amount.'</td>
                        </tr>';
                        $counter++;
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