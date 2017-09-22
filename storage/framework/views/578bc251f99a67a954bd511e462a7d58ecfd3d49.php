<?php $__env->startSection('title'); ?>
 Tong's Blog
 <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



    <h1>Stories</h1>
    <div class="alert alert-info" role="alert">
    <table class="table table-striped">
        <tr>
            <th>subject</th><br>
            <th>Description</th><br>
            <th>Writter</th>
            <th></th>
        </tr>

        <?php foreach ($stories as $story) : ?>
            <tr>
                <td><a href="/home/<?php echo e($story->id); ?>"> <?php echo e($story->subject); ?></td><br>
                <td><?php echo e($story->description); ?></td><br>
                <td><?php echo e($story->user_name); ?></td>
                <td>
                   <form action="/home/{story}" method= "post">
                   <?php echo e(method_field('DELETE')); ?>

                     <?php echo e(csrf_field()); ?>


                     <input type="hidden" name="id" value="<?php echo e($story->id); ?>">
                    <button type = "submit" class = "btn btn-primary">Delete</button>
                </form>
                </td>
            </tr>
            
        <?php endforeach ?>
    </table>

    </div>   


 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>