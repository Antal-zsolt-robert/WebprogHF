<?php
echo "<h2>Mai nap</h2>";
$maiNap = date("l");
switch ($maiNap) {
    case "Monday":
        echo "Ma hétfő!";
        break;
    case "Tuesday":
        echo "Ma kedd!";
        break;
    case "Wednesday":
        echo "Ma szerda!";
        break;
    case "Thursday":
        echo "Ma csütörtök!";
        break;
    case "Friday":
        echo "Ma péntek!";
        break;
    case "Saturday":
        echo "Ma szombar!";
        break;
    case "Sunday":
        echo "Ma vasárnap!";
        break;
}
?>

<?php
if (isset($_POST['operand'])) {
    $num1 = $_POST['firstNumber'];
    $num2 = $_POST['secondNumber'];
    $operand = $_POST['operand'];
    if ($operand == "+")
        $result = $num1 + $num2;
    else if ($operand == "-")
        $result = $num1 - $num2;
    else if ($operand == "x")
        $result = $num1 * $num2;
    else if ($operand == "/")
        $result = $num1 / $num2;
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div class="container">
    <form method="post" action="">
        <h2>Simple Calculator</h2>
        First Number:<input name="firstNumber" value="" type="number">
        <br>
        <br>
        Second Number:<input name="secondNumber" value="" type="number">
        <br>
        <br>
        <input type="submit" name="operand" value="+">
        <input type="submit" name="operand" value="-">
        <input type="submit" name="operand" value="x">
        <input type="submit" name="operand" value="/">
        <br>
        <br>Result: <input type='number' value="<?php echo $result; ?>"><br>
    </form>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset=UTF-8">
</head>
<body>
<h2>Chess Board</h2>
<table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
    <?php
    for($row=1;$row<=8;$row++)
    {
        echo "<tr>";
        for($col=1;$col<=8;$col++)
        {
            $total=$row+$col;
            if($total%2==0)
            {
                echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
            }
            else
            {
                echo "<td height=30px width=30px bgcolor=#000000></td>";
            }
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

<!DOCTYPE html>
<?php
$start  = 1;
$end = 10;
?>
<html>
<head>
    <title></title>
</head>
<body>
<h2>Division table</h2>
<table border="1">
    <?php
    print("<tr>");
    print("<th></th>");
    for($count = $start; $count <= $end; $count++)
        print("<th>".$count."</th>");
    print("</tr>");

    for($count = $start; $count <= $end; $count++)
    {
        print("<tr><th>".$count."</th>");
        for($count2 = $start; $count2 <= $end; $count2++)
        {
            $result = $count / $count2;
            printf("<td>%.2f</td>", $result);
        }
        print("</tr> \n");
    }
    ?>
</table>
</body>
</html>





