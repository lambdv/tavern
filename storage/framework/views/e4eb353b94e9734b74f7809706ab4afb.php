
<?php if (isset($component)) { $__componentOriginalc6613bbb4fe0b5807d211609e8fae41e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc6613bbb4fe0b5807d211609e8fae41e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.root','data' => ['title' => 'Tavern']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.root'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tavern']); ?>
    <div>
        <h1 class="text-xl text-bold"><?php echo e($board->name); ?></h1>
        <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/boards/<?php echo e(str_replace(' ','',$board->name)); ?>/<?php echo e($thread->id); ?>">
                <div class="card p-2 rounded-xs border border-gray-700 block">
                    <h2>
                        <?php echo e($thread->title); ?>

                    </h2>
                    <p>
                        <?php echo e($thread->body); ?>

                    </p>
                </div>
            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc6613bbb4fe0b5807d211609e8fae41e)): ?>
<?php $attributes = $__attributesOriginalc6613bbb4fe0b5807d211609e8fae41e; ?>
<?php unset($__attributesOriginalc6613bbb4fe0b5807d211609e8fae41e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6613bbb4fe0b5807d211609e8fae41e)): ?>
<?php $component = $__componentOriginalc6613bbb4fe0b5807d211609e8fae41e; ?>
<?php unset($__componentOriginalc6613bbb4fe0b5807d211609e8fae41e); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Lokesh\Herd\tavern\resources\views/pages/board.blade.php ENDPATH**/ ?>