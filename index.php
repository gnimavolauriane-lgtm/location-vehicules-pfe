<?php
echo "<h1>Bienvenue sur mon site local !</h1>";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Test PayPal Sandbox</title>
</head>
<body>
    <h1>Test PayPal Sandbox</h1>
    <form id="paypal-form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
      <input type="hidden" name="cmd" value="_xclick" />
      <input type="hidden" name="business" value="sb-9jbgu43463559@business.example.com" />
      <input type="hidden" name="item_name" value="Test Item" />
      <input type="hidden" name="amount" value="10.00" />
      <input type="hidden" name="currency_code" value="USD" />
      <input type="hidden" name="return" value="https://tonsite.com/merci.php" />
      <input type="hidden" name="cancel_return" value="https://tonsite.com/annule.php" />
      <button type="submit">Payer avec PayPal Sandbox</button>
    </form>
</body>
</html>
