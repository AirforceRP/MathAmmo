<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment - MathAmmo</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script>
    function setPaymentAmount() {
      // Get the selected subscription type
      const subscriptionType = document.getElementById("subscription-type").value;
      let amount;

      // Set the amount based on the selected subscription type
      if (subscriptionType === 'monthly') {
        amount = '2.99'; // Monthly subscription amount
      } else if (subscriptionType === 'yearly') {
        amount = '29.99'; // Yearly subscription amount
      } else if (subscriptionType === 'perpetual') {
        amount = '199.99'; // Perpetual license amount
      }

      // Set the amount in the PayPal form
      document.getElementById('paypal-amount').value = amount;
    }
  </script>
</head>
<body class="bg-gray-50 font-sans antialiased">
  <div class="container mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold mb-6">Choose Your Subscription Plan</h2>

    <!-- Subscription Dropdown -->
    <div class="mb-4">
      <label class="block text-gray-700 font-semibold mb-2" for="subscription-type">Select Subscription Plan</label>
      <select class="w-full p-2 border rounded" id="subscription-type" onchange="setPaymentAmount()">
        <option value="monthly">Monthly - $2.99</option>
        <option value="yearly">Yearly - $29.99</option>
        <option value="perpetual">Perpetual License - $199.99</option>
      </select>
    </div>

    <!-- PayPal Payment Form -->
    <div class="bg-white p-6 rounded-lg shadow">
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <!-- PayPal form setup -->
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="mail@mathammo.com"> <!-- Replace with your PayPal business email -->
        <input type="hidden" name="item_name" value="MathAmmo Subscription">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" id="paypal-amount" name="amount" value="2.99"> <!-- Default amount for monthly -->

        <!-- Hidden fields to specify the return and cancel URLs -->
        <input type="hidden" name="return" value="http://localhost/mathammo/payment_success.php"> <!-- URL to redirect on success -->
        <input type="hidden" name="cancel_return" value="http://localhost/mathammo/payment_cancel.php"> <!-- URL to redirect on cancel -->

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded font-semibold hover:bg-blue-500">Pay with PayPal</button>
      </form>
    </div>
  </div>
</body>
</html>



