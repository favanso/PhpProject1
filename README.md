# JavaTemplate

## Project 1 
### loan payoff calculator

#### index.php page with the form for the user to enter:
- name
- total loan amount
- yearly interest rate
- monthly payment amount

#### calculate.php page:
- calculate the loan payoff for each month 
- display the users name along with the payoff schedule
- current balance starts as the total loan amount

for each month, as long as the current balance is positive, keep looping:
- current balance gets increased by the yearly interest rate / 12
- then subtract the monthly payment from the new current balance
- display the current balance for each month
- if the payment isn't larger than the monthly interest, display an error instead
