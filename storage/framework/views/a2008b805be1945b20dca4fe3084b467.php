<?php 
use App\Models\Board;
use App\Models\Thread;
use App\Models\User;

use App\Models\Comment;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

$latestPosts = DB::table('threads')

    ->join('boards', 'threads.board_id', '=', 'boards.id')
    ->orderByDesc('threads.created_at')
    ->select([
        'threads.id as thread_id',
        'threads.title',
        'threads.body',
        'threads.created_at',
        'boards.name as board_name',
        'boards.id as board_id'
    ])
    ->limit(5)->get();
?>

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

    <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="/boards/<?php echo e($post ->board_name); ?>/<?php echo e($post ->thread_id); ?>">
            <div class="p-5 m-2 bg-gray-800">
                <h1><?php echo e($post ->title); ?></h1>
                <p><?php echo e($post->body); ?></p>
            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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