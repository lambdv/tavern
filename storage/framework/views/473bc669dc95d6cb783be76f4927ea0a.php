<nav class="flex width-full bg-gray-500 text-white text-center">
    <div class="">
        <a href="<?php echo e(route('index')); ?>" class="text-lg font-bold">Tavern</a>
    </div>
    <div class="ml-auto mr-0">
        <div id="link" class="flex gap-4">
            <a href="<?php echo e(route('index')); ?>">Home</a>
            <a href="<?php echo e(route('boards')); ?>">boards</a>

            <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(route('profile')); ?>">

                        <?php if (isset($component)) { $__componentOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::profile','data' => ['initials' => auth()->user()->initials()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::profile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['initials' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(auth()->user()->initials())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994)): ?>
<?php $attributes = $__attributesOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994; ?>
<?php unset($__attributesOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994)): ?>
<?php $component = $__componentOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994; ?>
<?php unset($__componentOriginal2e5cdd03843a4c4d68fb9a6d7bd7e994); ?>
<?php endif; ?>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>">Login</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH C:\Users\Lokesh\Herd\tavern\resources\views/components/navagation/topnav.blade.php ENDPATH**/ ?>