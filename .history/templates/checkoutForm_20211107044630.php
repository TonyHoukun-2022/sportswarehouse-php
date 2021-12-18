<form method="POST" action="thanksOrder.php"id="checkout">
  <fieldset>
    <legend>Delivery Details</legend>
    <p>
      <label for="firstName">First Name: </label>
      <input type="text" id="firstName" name="firstName">
    </p>
    
    <p>
      <label for="lastName">Last Name: </label>
      <input type="text" id="lastName" name="lastName">
    </p>
    
    <p>
      <label for="address">Delivery address: </label>
      <input type="text" id="address" name="address">
    </p>
    
    <p>
      <label for="phone">Contact number: </label>
      <input type="text" id="phone" name  ="phone">
    </p>
    
    <p>
      <label for="email">Email address: </label>
      <input type="text" id="email" name  ="email">
    </p> 
  </fieldset>
  
  <fieldset>
    <legend>Payment</legend>
    <p>
      <label for="creditcard">Credit card number: </label>
      <input type="text" id="creditcard" name  ="creditcard">
    </p>
    
    <p>
      <label for="nameOnCard">Name on card:</label>
      <input type="text" id="nameOnCard" name  ="nameOnCard">
    </p>
    
    <p>
      <label for="expiry">Expiry date: </label>
      <input type="text" id="expiry" name="expiry">
    </p>
    
    <p>
      <label for="csv">CSV: </label>
      <input type="text" id="csv" name="csv">
    </p>
    
    <p>
      <input type="submit"  name="pay" value="Pay">
    </p>
  </fieldset>
</form>