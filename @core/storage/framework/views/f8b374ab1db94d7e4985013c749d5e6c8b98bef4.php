<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo purify_html(session('msg')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\wamp64\www\rahulgandhi\@core\resources\views/components/msg/success.blade.php ENDPATH**/ ?>