<button id="nimbbl_button">Pay with Nimbbl</button>
<script src="https://uatapi.nimbbl.tech/static/assets/js/checkout.js"></script>
<form name='nimbblpayform' action="verify.php" method="POST">
    <input type="hidden" name="nimbbl_transaction_id" id="nimbbl_transaction_id">
    <input type="hidden" name="nimbbl_signature"  id="nimbbl_signature" >
</form>
<script>
var options = {
        "access_key": "access_key_mx47or5MAA14x0La", // Enter the Key ID generated from the Dashboard
        "order_id": "{{$order_data->order_id}}",          // Enter the order_id from the create-order api
        "callback_handler": function (response) {
            document.getElementById('nimbbl_transaction_id').value = response.nimbbl_transaction_id;
            document.getElementById('nimbbl_signature').value = response.nimbbl_signature;
            document.nimbblpayform.submit();
        },
    };

var checkout = new NimbblCheckout(options);

document.getElementById('nimbbl_button').onclick = function(e){
    checkout.open("{{$order_data->order_id}}");
    e.preventDefault();
}
</script>
