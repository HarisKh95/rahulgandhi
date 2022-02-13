<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button id="nimbbl_button">Pay with Nimbbl</button>
<script src="https://uatapi.nimbbl.tech/static/assets/js/checkout.js"></script>
<form name='nimbblpayform' action="verify.php" method="POST">
    <input type="hidden" name="nimbbl_transaction_id" id="nimbbl_transaction_id">
    <input type="hidden" name="nimbbl_signature"  id="nimbbl_signature" >
</form>
<script>
var options = {
        "access_key": {!! config('nimbbl.access_key') !!}, // Enter the Key ID generated from the Dashboard
        "order_id": order_id, // Enter the order_id from the create-order api
        "callback_handler": function (response) {
            document.getElementById('nimbbl_transaction_id').value = response.nimbbl_transaction_id;
            document.getElementById('nimbbl_signature').value = response.nimbbl_signature;
            document.nimbblpayform.submit();
        }
    };

var checkout = new NimbblCheckout(options);

document.getElementById('nimbbl_button').onclick = function(e){
    checkout.open(order_id);
    e.preventDefault();
}
</script>

</body>
</html>