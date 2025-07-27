<?php

use App\Models\Board;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use App\Models\Comment;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

?>

<div>
    <title><?php echo e($thread -> title); ?></title>
    <div class="p-5 m-2 bg-gray-900" id="post">
        <h1 class="text-2xl font-bold"><?php echo e($this->thread->title); ?></h1>
        <p class=""><?php echo e($this->thread->body); ?></p>
        <p class="text-xs text-gray-300">author: <?php echo e($op->name); ?></p>
    </div>

    <div id="comments">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="p-5 m-2 bg-amber-950" id="post">
                <?php echo e($comment->body); ?>

                <p class="text-red-500"><?php echo e($comment->name); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div><?php /**PATH C:\Users\Lokesh\Herd\tavern\resources\views\livewire/pages/thread.blade.php ENDPATH**/ ?>