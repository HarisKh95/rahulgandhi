<script>
    (function($){
    "use strict";
        $(document).ready(function () {
            $(document).on('click','#work',function () {
                $(this).addClass("disabled")
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Working")); ?>');
            });
        });
    })(jQuery);
</script><?php /**PATH C:\wamp64\www\rahulgandhi\@core\resources\views/components/btn/work.blade.php ENDPATH**/ ?>