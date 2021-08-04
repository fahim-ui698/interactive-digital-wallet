
<!DOCTYPE html>
<HTml>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transection History</title>
        <script src="./external.js"></script>
    </head>
    <body>
        <form action="./History.php" method="GET" name="transection" onsubmit="getHistory(this);return false;" >
        

        <h2>Page 2 [Transaction History]</h2>
        <h2>Digital Wallet</h2>
        <div style="color:blue">

            <span>1. <a href="Home-page.php">Home</a></span>
            <span>2. <a href="Transaction.php">Transaction History</a></span>
        </div>
        
        <br>
        <div>
           <span><input type="text" name="category"></span> 
           <span><input type="submit" name="search" value="search"></span> 
        </div>
        <br><br>
        <div id="result"></div>  
        </form>
    </body>

</HTml>