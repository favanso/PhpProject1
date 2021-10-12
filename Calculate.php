
<!DOCTYPE html>
<html lang="en">
<body>
<?php
include('topNav.php');
$name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
$totalLoan = htmlspecialchars(filter_input
(INPUT_GET, 'total_loan_amount', FILTER_VALIDATE_FLOAT));
$yearlyInterestRate = htmlspecialchars(filter_input
(INPUT_GET, 'yearly_interest_rate', FILTER_VALIDATE_FLOAT));
$paymentAmount = htmlspecialchars(filter_input
(INPUT_GET, 'monthly_payment_amount', FILTER_VALIDATE_FLOAT));

function calculate($balance, $rate, $payment)
{
if (empty($balance) || empty($rate) || empty($payment) ) {
   echo "<p id='error'>Please check the entries in Index</p>";
   exit;
}

echo '<table class = "tabela">';
echo '<tr><th>MONTHS </th><th>PAYMENT </th><th>INTEREST </th><th>PRINCIPAL </th><th>BALANCE </th></tr>';

$count = 0;
$totPayment = 0;
$totInterest = 0;
do {
   $count++;

   $interest = $balance * $rate/1200;

   $principal = $balance + $interest;

    if ($balance > $payment) {
        $balance = $principal - $payment;
    } // if
    else{
        $balance = 0;
    }

   if ($balance < 0) {
      $principal = $principal + $balance;
      $interest  = $interest - $balance;
      $balance   = 0;
   }

    if ($payment < $interest) {
        echo "</table>";
        echo "<p id='error'> Rate is too high, or payment is too low </p>";
        exit;
    }

   echo "<td>" .$count." </td>";
   echo "<td>" .number_format($payment,   2) ."</td>";
   echo "<td>" .number_format($interest,  2) ."</td>";
   echo "<td>" .number_format($principal, 2) ."</td>";
   echo "<td>" .number_format($balance,   2) ."</td>";
   echo "</tr>";

    $totPayment   = $totPayment + $payment;
    $totInterest  = $totInterest + $interest;
    $totPrincipal = $totPayment + $totInterest;



} while ($balance > 0 );

echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><b>" .number_format($totPayment,   2) ."</b></td>";
echo "<td><b>" .number_format($totInterest,  2) ."</b></td>";
echo "<td><b>" .number_format($totPrincipal, 2) ."</b></td>";
echo "<td>&nbsp;</td>";
echo "</tr>";
echo "</table>";

} //function
?>
</body>
<div>
    <?php
    if (empty($name)){
        echo "<p id='error'>Please check the client name</p>";
        exit;
    }
    echo "<p id='text'>Hi, ". $name . "</p>";
    echo "<p id='text'>Total Balance $".number_format($totalLoan,   2) . "</p>";
    echo "<p id='text'>Your loan payoff schedule is:  </p>";
    ?>
</div>
<div class="Space"></div>
<?php
calculate((float)$totalLoan, (float)$yearlyInterestRate, (float)$paymentAmount);
?>
</html>
