<?php $__env->startSection('title'); ?>
 Tong's Blog
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <div class="row">
    <div class="col-md-6">
    <div>
    <h1><?php echo e($story->subject); ?></h1>

    <span class="label label-info"><?php echo e($story->user_name); ?></span>

     <br />
     <br />

    <div class="alert alert-danger" role="alert">
  <p><?php echo e($story->description); ?></p>
</div>
</div>
<div>
<h3>Edit this story<h3>
<form action="/home/{story}" method= "post">
        <?php echo e(csrf_field()); ?>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input class="form-control" type="text" name="subject" id="subject">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" rows="3" type="text" name="description" id="description"></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo e($story->id); ?>">
            <button type = "submit" class = "btn btn-primary">Submit</button>
        </form>
</div>

</div>
</div>



        
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>