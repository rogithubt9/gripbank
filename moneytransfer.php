<?php
include 'connection.php';
$id=$_GET['sid'];
$sql="select * from customer where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$balance=$row['balance'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRIP Banking System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"  href="mtstyle.css">
</head>
<body>
    
        <div class="header">
            <div class="logo">
                GRIP BANK
            </div>
            <div class="menu">
                <ul>
                    <li><a href="user.php" class="lin">Back</a></li>
                </ul>
            </div>
        </div>
    <div class="cons">
        <form method="POST">
            <table border="0px" class="center"  >
                <tr>
                    <td >
                        <h1 class="headings">Transaction</h1>
                    </td>
                </tr>
                    <tr>
                        <td><h2>Sender</h2></td>
                        
                    </tr>
                    <tr>
                    <td>
                        <label>Name : </label>
                    </td>
                    <td>
                        <input class="ip" type="text" name="sname" value="<?php echo $name ?>">    
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <label>Balance : </label>
                    </td>
                    <td>
                        <input class="ip" type="text" name="balance" value="<?php echo($balance) ?>">            
                    </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr>
                       <td><h2>Reciever</h2></td> 
                    </tr>
                    <tr>
                    <td>
                        <label>Name : </label>
                    </td>

                    <td>
                        <?php
                            $sml="select * from customer where id!=$id";
                            $res=mysqli_query($conn,$sml);
                            
                        if(mysqli_num_rows($res)>0)
                        {
                        echo "<select class='ip' name='rname'>";
                        while ( $ros=mysqli_fetch_assoc($res)) {
                            echo "<option>" .$ros["name"] ."</option>";
                            }    
                        echo"</select>";
                        }

                        ?>  
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Amount : </label>
                    </td>
                    <td>
                        <input type="text" name="amount" class="amount ip" required="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="text" name="submit" class="btn">Submit</button>
                    </td>
                    
                </tr>
            </table>            
        </form>
    </div>
     <div class="footer">
        <p>©2023 ROJINA SWAIN</p>
    </div>

</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $sname=$_POST['sname'];;
        $rname=$_POST['rname'];
        $amount=$_POST['amount'];
        $balance=$_POST['balance'];
        $rest=$balance-$amount;
        $bget=mysqli_query($conn,"select * from customer where name='$rname'");
        $bow=mysqli_fetch_assoc($bget);
        $rbalance=$bow['balance'];
        $abalance=$rbalance+$amount;

        if($balance>=$amount)
        {
        $sqmr="insert into `transactions`(`sender`, `receiver`, `amount`) value ('$sname','$rname','$amount')";
        $pqmr=mysqli_query($conn,"update `customer` set `balance`='$rest' where `name`='$sname'");
        $tqmr=mysqli_query($conn,"update `customer` set `balance`='$abalance' where `name`='$rname'");
        $smr=mysqli_query($conn,$sqmr);
            if($smr and $pqmr and $tqmr){
            echo "<script>alert('Transaction Successful....');</script>";
            echo "<script>document.location='user.php';</script>";
            }
            else{
                echo $sname;
                echo $rname;
                echo $amount;
            }
        }
        else
        {
            echo "<script>alert('Insufficient Funds');</script>";
        }
    }
?>