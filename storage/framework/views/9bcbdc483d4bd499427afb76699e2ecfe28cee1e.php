<!-- resources/views/user/assignRoles.blade.php -->



<?php $__env->startSection('content'); ?>
    <div>
        <div class="container">
            <h3 class="my-4"> les utilisateurs: </h3>
            <table class="table table-striped table-responsive mx-auto">
                <tr>
                    <th>Prénom</th>
                    <th>nom</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Role</th>
                </tr>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->prenom); ?> </td>
                    <td><?php echo e($user->nom); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->sigle); ?></td>
                    <td><?php echo e($user->getRoleNames()->implode(', ')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <?php echo e($users->links()); ?>


        </div>
        <div class="container">
            <h3 class="my-4" >Gérer les roles</h3>
            <form method="post" action="<?php echo e(route('user.assignRoles')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group py-2">
                    <label for="user_id" class="mb-1"> <b>Choisir un utilisateur:</b> </label>
                    <select name="user_id" class="form-control">
                        <?php if(isset($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->prenom); ?> <?php echo e($user->nom); ?> (<?php echo e($user->email); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="roles" class="mb-1"> <b> Affecter les roles: </b></label>
                    <select name="roles[]" multiple class="form-control" size="6">
                        <?php if(isset($roles)): ?>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-1"> Valider</button>
            </form>

            <div class="py-4">
                <?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/register"> Ajouter un nouveau utilisateur</a>
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-roles"> Gérer les roles</a>
                <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-permissions"> Gérer les Permissions</a>
                <?php endif; ?>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Share\main\Gestion_stage\resources\views/user/assignRoles.blade.php ENDPATH**/ ?>