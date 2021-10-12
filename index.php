<?php
include('topNav.php');
echo "</br>";
?>

<!--instructions based on the 
   https://github.com/dogsGhost/loan-payment-calculator/blob/master/index.php-->

<div class="instructions">
    <h2 style="text-align:center;">Instructions</h2>
    <ul>
        <li>This calculator outputs the monthly payments for a loan.</li>
        <li>The loan amount is the total amount of money you are borrowing 
            and must be a number greater than zero. 
            Just use dot to separate the decimal part.
        <li>Interest is the interest rate you are paying, 
            this is a decimal or whole number greater than 0.1;
            do not include the percent sign.</li>
        <li>Monthly amount is the value that you will pay monthly, 
            it must be a number greater than zero.
            Just use dot to separate the decimal part.</li>
    </ul>
</div>
<form action="Calculate.php" method="get">
    <table>
        <tr>
            <td>Enter your name: </td>
            <td><input type="text" name="name" placeholder="NAME" /></td>
        </tr>
        <tr>
            <td>Enter total loan amount: </td>
            <td><input type="text" 
                       name="total_loan_amount" placeholder="$ 0.0"/></td>
        </tr>
        <tr>
            <td>Yearly interest rate: </td>
            <td><input type="text" 
                       name="yearly_interest_rate" placeholder="0.0 %"/></td>
        </tr>
        <tr>
            <td>Monthly payment amount: </td>
            <td><input type="text" 
                       name="monthly_payment_amount" placeholder="$ 0.0"/></td>
        </tr>

    </table><br>

    <div>
        <input type='submit' value='Calculate Loan Payoff'/></br>
    </div>
</form>
</body>
</html>