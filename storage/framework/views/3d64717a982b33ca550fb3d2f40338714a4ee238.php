<?php $__env->startSection('title'); ?>
 Tong's Blog
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="row">
    <div class="col-md-6">
    <h3>Stories</h3>
    <table>
        <tr>
            <th>subject</th><br>
            <th>Description</th><br>
            <th>Writter</th>
        </tr>

        <?php foreach ($stories as $story) : ?>
            <tr>
                <td><?php echo e($story->subject); ?></td><br>
                <td><?php echo e($story->description); ?></td><br>
                <td><?php echo e($story->user_name); ?></td>
            </tr>
            
        <?php endforeach ?>
    </table>
        
    </div>
 </div>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>