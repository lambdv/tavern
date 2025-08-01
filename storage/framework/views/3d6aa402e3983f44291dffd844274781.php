<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'block',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'variant' => 'block',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$classes = Flux::classes()
    ->add('min-w-0') // This is here to allow nested input elements like flux::input.file to truncate properly...
    ->add('[&:not(:has([data-flux-field])):has([data-flux-control][disabled])>[data-flux-label]]:opacity-50') // Dim labels for fields with no nested fields when a control is disabled...
    ->add('[&:has(>[data-flux-radio-group][disabled])>[data-flux-label]]:opacity-50') // Special case for radio groups because they are nested fields...
    ->add('[&:has(>[data-flux-checkbox-group][disabled])>[data-flux-label]]:opacity-50') // Special case for checkbox groups because they are nested fields...
    ->add(match ($variant) {
        default => 'block',
        'inline' => [
            'grid gap-x-3 gap-y-1.5',
            'has-[[data-flux-label]~[data-flux-control]]:grid-cols-[1fr_auto]',
            'has-[[data-flux-control]~[data-flux-label]]:grid-cols-[auto_1fr]',
            '[&>[data-flux-control]~[data-flux-description]]:row-start-2 [&>[data-flux-control]~[data-flux-description]]:col-start-2',
            '[&>[data-flux-control]~[data-flux-error]]:col-span-2 [&>[data-flux-control]~[data-flux-error]]:mt-1', // Position error messages...
            '[&>[data-flux-label]~[data-flux-control]]:row-start-1 [&>[data-flux-label]~[data-flux-control]]:col-start-2',
        ],
    })
    ->add(match ($variant) {
        default => [ // Adjust spacing around label...
            '*:data-flux-label:mb-3 [&>[data-flux-label]:has(+[data-flux-description])]:mb-2',
        ],
        'inline' => '',
    })
    ->add(match ($variant) {
        default => [ // Adjust spacing around description...
            '[&>[data-flux-label]+[data-flux-description]]:mt-0',
            '[&>[data-flux-label]+[data-flux-description]]:mb-3',
            '[&>*:not([data-flux-label])+[data-flux-description]]:mt-3',
        ],
        'inline' => '',
    });
?>

<ui-field <?php echo e($attributes->class($classes)); ?> data-flux-field>
    <?php echo e($slot); ?>

</ui-field>
<?php /**PATH C:\Users\Lokesh\Herd\tavern\vendor\livewire\flux\src/../stubs/resources/views/flux/field.blade.php ENDPATH**/ ?>