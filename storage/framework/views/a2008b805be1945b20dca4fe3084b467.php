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
    <h1 class="text-xl text-white font-bold ml-auto mr-auto text-center">Welcome to the tavern!</h1>
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
<?php /**PATH C:\Users\Lokesh\Herd\tavern\resources\views/pages/index.blade.php ENDPATH**/ ?>