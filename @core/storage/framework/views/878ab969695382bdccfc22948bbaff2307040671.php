<button id="nimbbl_button">Pay with Nimbbl</button>
<script src="https://api.nimbbl.tech/static/assets/js/checkout.js"></script>
<form name='nimbblpayform' action="verify.php" method="POST">
    <input type="hidden" name="nimbbl_transaction_id" id="nimbbl_transaction_id">
    <input type="hidden" name="nimbbl_signature"  id="nimbbl_signature" >
</form>
<script>
var options = {
        "access_key": "<?php echo e(config('nimbbl.access_key')); ?>", // Enter the Key ID generated from the Dashboard
        "order_id": "<?php echo e($order_data->order_id); ?>",          // Enter the order_id from the create-order api
        "callback_url": "<?php echo e(route('frontend.product.nimbbl.ipn',[ 'id'=> $id,'currency'=>$currency,'total_amount'=>$total_amount ])); ?>", // Enter the call back url
                "redirect":true,
        // "callback_handler": function (response) {
            // document.getElementById('nimbbl_transaction_id').value = response.nimbbl_transaction_id;
            // document.getElementById('nimbbl_signature').value = response.nimbbl_signature;
        //     document.nimbblpayform.submit();
        // },
    };

var checkout = new NimbblCheckout(options);
document.getElementById('nimbbl_button').onclick = function(e){
    checkout.open("<?php echo e($order_data->order_id); ?>");
    e.preventDefault();
}
</script>
<?php /**PATH C:\wamp64\www\rahulgandhi\@core\resources\views/payment/nimbbl.blade.php ENDPATH**/ ?>