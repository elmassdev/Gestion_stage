<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="card mb-4 pb-4">
        <div class="card-header">Gérer les rôles</div>
        <div class="container">
            <form method="post" action="<?php echo e(route('user.assignPermissions')); ?>" class="form-group px-4">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="role_id">Select Role:</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="permissions">Select Permissions:</label>
                    <select name="permissions[]" id="permissions" multiple class="form-control" size="8">
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($permission->name); ?>"><?php echo e($permission->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-4">Assign Permissions</button>
            </form>
        </div>
    </div>

    <div class="row py-4">
        <table class="table">
            <tr>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="py-4">
                        <h3><?php echo e($role->name); ?></h3>
                        <ul>
                            <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($permission->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </table>
    </div>
    <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/register"> Ajouter un nouveau utilisateur</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-roles"> Gérer les roles</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-permissions"> Gérer les Permissions</a>
            <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/user/assignPermissions.blade.php ENDPATH**/ ?>