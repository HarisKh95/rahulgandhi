<script>
    (function () {
        "use strict";
        $(document).on('click','.quickview',function (e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                $.ajax({
                        type:'GET',
                        url:  '<?php echo e(route("frontend.products.quickview")); ?>',
                        data: {product_id:product_id},
                        beforeSend: function(){
                            $("#AppendQuickView").html('<div class="loader-2"></div>');
                        },
                        success: function(resp){
                            $("#AppendQuickView").html(resp.view);
                        },error: function(){
                        }
                });
            });
    })(jQuery);
</script><?php /**PATH /opt/lampp/htdocs/rahulgandhi/@core/resources/views/components/quickview/js.blade.php ENDPATH**/ ?>