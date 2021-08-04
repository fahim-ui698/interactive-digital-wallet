<?php

require "./DbConnect.php";
$category=empty($_GET['category']) ? "" : $_GET['category'];


if(empty($category))
{
        $allHistory=getAllHistory();
        echo "<table style='border: 1px solid black;width:40%'>";
        echo"<tr>";    
        echo "<th>Id</th>";
        echo"<th>Transaction Category</th>";
        echo"<th>To</th>";
        echo"<th>Amount</th>";
        echo"<th>Transfered on</th>";
        echo"</tr>";
       for ($i=0; $i < count($allHistory); $i++) { 
           echo "<tr>";
           echo "<td>" . $allHistory[$i]['id'] . "</td>";
           echo "<td>" . $allHistory[$i]['category'] . "</td>";
           echo "<td>" . $allHistory[$i]['sendTo'] . "</td>";
           echo "<td>" . $allHistory[$i]['amount'] . "</td>";
           echo "<td>" . $allHistory[$i]['time'] . "</td>";
           echo "</tr>";
       }
}
else
{
    $history=getHistory($category);
    if(count($history)>0)
    {
        echo "<table style='border: 1px solid black;width:40%'>";
        echo"<tr>";    
        echo "<th>Id</th>";
        echo"<th>Transaction Category</th>";
        echo"<th>To</th>";
        echo"<th>Amount</th>";
        echo"<th>Transfered on</th>";
        echo"</tr>";
        for ($i=0; $i < count($history); $i++) { 
       echo "<tr>";
       echo "<td>" . $history[$i]['id'] . "</td>";
       echo "<td>" . $history[$i]['category'] . "</td>";
       echo "<td>" . $history[$i]['sendTo'] . "</td>";
       echo "<td>" . $history[$i]['amount'] . "</td>";
       echo "<td>" . $history[$i]['time'] . "</td>";
       
       echo "</tr>";
        }
    }
    else
    {
        echo "No data found";
    }
    
    
}

echo"</table>";

?>