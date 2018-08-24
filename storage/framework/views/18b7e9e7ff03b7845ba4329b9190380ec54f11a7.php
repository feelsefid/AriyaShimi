<?php $__env->startSection('content'); ?>

    <div class="col-md-12 content-center">
        <div class="card-plain">
            <img src="<?php echo e(url('general/images/pyramid-logo.png')); ?>" style="margin:auto; margin-bottom: 20px; display: block; width: 200px">
            <?php echo e(Form::open(['url' => url('/login')])); ?>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>" style="width: 304px; border-radius: 20px">
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="Username (Email)">
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>

            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>" style="width: 304px; border-radius: 20px">
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                            <strong><?php echo e($errors->first('password')); ?></strong>
                        </span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <?php echo app('captcha')->display($attributes = [], $options = ['lang'=> 'en']); ?>

                <?php if($errors->has('g-recaptcha-response')): ?>
                    <span class="cr-warning w3-text-red">
                        <?php echo e($errors->first('g-recaptcha-response')); ?>

                    </span>
                <?php endif; ?>
            </div>


            <div class="nav-item">
                <button type="submit" class="nav-link btn btn-primary btn-round" style="width: 304px; float: left;background-color: #E6212D;">Login</button>
            </div>
            <a href="<?php echo e(url('password/reset')); ?>" style="color: #fff; padding-bottom: 20px">Forgot Password?Click here</a>

            <?php echo e(Form::close()); ?>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>