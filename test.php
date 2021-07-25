
 
<?php

    $con = mysql_connect("localhost","root","123456") or die("Unable to connect");
    $db = mysql_select_db("schoolrecord",$con) or die("Unable to select DB");
 
    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
 
    $sf = ($page-1) * 10;
    $sql = "SELECT * FROM student LIMIT ".$sf.",10";
    $rs = mysql_query($sql,$con);
    //echo $rs;
?>
<html>
    <head>
        <title>Pages</title>
    </head>
    <body>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
            </tr>
            <?php
                while($row = mysql_fetch_assoc($rs))
                {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            $sql1 = "SELECT COUNT(name) FROM student";
            $rs1 = mysql_query($sql1,$con);
            $row1 = mysql_fetch_row($rs1);
            $total = $row1[0];
            $tp = ceil($total/10);
 
            for($i = 1; $i <= $tp; $i++)
            {
                echo "<a href='test.php?page=".$i."'>".$i."</a> ";
            }
        ?>
    </body>
</html>