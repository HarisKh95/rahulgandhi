<a tabindex="0" class="btn btn-danger btn-xs mb-3 mr-1"
   role="button"
   data-toggle="popover"
   data-trigger="focus"
   data-html="true"
   title=""
   data-content="
   <h6><?php echo e(__('Are you sure to delete this?')); ?></h6>
   <form method='post' action='<?php echo e($url); ?>'>
   <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
   <br>
    <input type='submit' class='btn btn-danger btn-xs' value='<?php echo e(__('Yes,Please')); ?>'>
    </form>
   ">
    <i class="ti-trash"></i>
</a><?php /**PATH C:\wamp64\www\rahulgandhi\@core\resources\views/components/delete-popover.blade.php ENDPATH**/ ?>