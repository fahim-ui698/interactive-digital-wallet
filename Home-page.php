<?php require "./DbConnect.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <script src="./external.js" ></script>
    </head>
    <body>

    <?php 
        
        $categoryErr=$toErr=$amountErr=$successfulMessage=$to=$errorMessage=$datetime="";
        $flag=false;


        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(empty($_POST['category']))
            {
                $categoryErr="* Select a category ";
                $datetime="";
                $flag=true;

            }
            
            if(empty($_POST['to']))
            {
                $toErr="* Phone number required ";
                $datetime="";
                $flag=true;

            }

            if(empty($_POST['amount']))
            {
                $amountErr="* Enter an amount ";
                $datetime="";
                $flag=true;

            }

            if(!$flag)
            {
            
                $successfulMessage= "Success full";
               
            }

            else 
            {
                
                $errorMessage="Failed";
            }

            if(!empty($_POST['category']) && !empty($_POST['to']) && !empty($_POST['amount']))
            {
                if($_POST['amount']>0)
                {
                    $category=test_input($_POST['category']);
                    $to=test_input($_POST['to']);
                    $amount=test_input($_POST['amount']);
                    $datetime=date("Y/m/d")."  ". date("h:i:sa");

                    $result=write($category,$to,$amount,$datetime);

                    if($result)
                    {
                        $successfulMessage= "Registration Successful";
                    }
                    else
                    {
                        $errorMessage="Registration Unsuccessful";
                    }
                }
                else
                {
                    $amountErr="*Amount can not be negative";
                    
                }
                
            }
            



        }

        function test_input($data)
        {
            $data=trim($data);
            $data=stripcslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="home" onsubmit="return isvalid()">

        
        <h2>Page 1 [Home]</h2>
        <h2>Digital Wallet</h2>
        <div style="color:blue">

            <span>1. <a href="Home-page.php">Home</a></span>
            <span>2. <a href="Transaction.php">Transaction History</a></span>
        </div>
        <h2>Fund Transfer : </h2>
        <div>
            <span><label for="category">Select Category : </label></span>
            <span>
                <select name="category" id="category">
                <option value="" >Select a value</option>
                <option value="mobile recharge">mobile recharge</option>
                <option value="cash out">cash out</option>
                <option value="send money">send money</option>
                </select>
            </span>
            <span id="categoryErr" style="color : red;"><?php echo $categoryErr; ?></span>
        </div>
        <br><br>
       
        <div>
            <span><label for="to">To : </label></span>
            <span><input type="tel"  id="to" name="to" placeholder="12345-123456" pattern="[0-9]{5}[0-9]{6}" value="<?php echo $to;?>"></span>
            <span id="toErr" style="color : red;"><?php echo $toErr; ?></span>
        </div><br><br>
        <div>
            <span><label for="amount">Amount: </label></span>
            <span><input type="number"  id="amount" name="amount" value="<?php echo $amount;?>" ></span>

            <span id="amountErr" style="color : red;"><?php echo $amountErr; ?></span>
        </div><br><br>
        <input type="submit" value="Submit">
        <br><br>
        
        </div>

                
        </form>
    </body>
</html>