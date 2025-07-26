<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e($title ?? ''); ?></title>
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="<?php echo e(asset(path: 'css/index.css')); ?>">
    </head>
    <body class="">
        <header class="">
            <?php if (isset($component)) { $__componentOriginalbcb72f304edc1e4c86ddc2337199c10b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbcb72f304edc1e4c86ddc2337199c10b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navagation.topnav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navagation.topnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbcb72f304edc1e4c86ddc2337199c10b)): ?>
<?php $attributes = $__attributesOriginalbcb72f304edc1e4c86ddc2337199c10b; ?>
<?php unset($__attributesOriginalbcb72f304edc1e4c86ddc2337199c10b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbcb72f304edc1e4c86ddc2337199c10b)): ?>
<?php $component = $__componentOriginalbcb72f304edc1e4c86ddc2337199c10b; ?>
<?php unset($__componentOriginalbcb72f304edc1e4c86ddc2337199c10b); ?>
<?php endif; ?>
        </header>
        <main class="">
            
            <?php echo e($slot); ?>

        </main>
    </body>
</html>
<?php /**PATH C:\Users\Lokesh\Herd\tavern\resources\views/components/layouts/root.blade.php ENDPATH**/ ?>