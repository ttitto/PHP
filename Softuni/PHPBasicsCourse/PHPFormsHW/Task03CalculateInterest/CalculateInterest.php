<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Interest Calculator</title>
</head>
<body>
<form action="CalculateInterest.php" method="get">
    <label for="amount">Enter Amount</label>
    <input type="text" id="amount" name="amount"><br/>
    <input type="radio" id="usd" name="currency" value="USD"/><label for="usd">USD</label>
    <input type="radio" id="eur" name="currency" value="EUR"/><label for="eur">EUR</label>
    <input type="radio" id="bgn" name="currency" value="BGN"/><label for="bgn">BGN</label><br/>
    <label for="interest">Compound Interest Amount</label>
    <input type="text" id="interest" name="interest"/><br/>
    <label>
        <select name="period">
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
            <option value="24">2 Years</option>
            <option value="60">5 Years</option>
        </select>
    </label>
    <input type="submit" value="Calculate"/>
</form>
</body>
</html>
<?php
function calculate_amount()
{
    $period = 0;
    $amount = 0;
    $interest = 0;
    if (isset($_GET['amount'])) {
        $amount = $_GET['amount'];
    }
    if (isset($_GET['period'])) {
        $period = intval($_GET['period']);
    }
    if (isset($_GET['interest'])) {
        $interest = floatval($_GET['interest']);
    }
    for ($m = 1; $m <= $period; $m++) {
        $amount += ($amount * ($interest / 12) / 100);
    }
    return $amount;
}

function print_final_amount($value)
{
    if(isset($_GET['currency'])){
        $currency=$_GET['currency'];
        switch($currency){
            case 'USD':
                printf("$ %.2f",$value);
                break;
            case "EUR":
                printf("%.2f EURO",$value);
                break;
            case "BGN":
                printf("%.2f лв",$value);
                break;
            default: printf("%.2f",$value);
        }
    } else{
        printf("%.2f",$value);
    }
}

print_final_amount(calculate_amount());
?>

