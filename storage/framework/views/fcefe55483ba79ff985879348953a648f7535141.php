<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu</h3>
                    </div><!-- card-header -->
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="list-group">
                                <a href="<?php echo e(route('meals')); ?>" class="list-group-item list-group-item-action"> All Meals</a>
                                <a href="<?php echo e(route('meals.create')); ?>" class="list-group-item list-group-item-action"> create
                                    new meal</a>
                                <a href="<?php echo e(route('orders')); ?>" class="list-group-item list-group-item-action"> user order</a>
                            </div>
                        </form>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- 4 -->
            <tbody>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header  text-center">
                            <?php if(session('message')): ?>
                                <div class="alert alert-success">
                                    <h2><?php echo e(session('message')); ?></h2>
                                </div>
                            <?php endif; ?>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>category</th>
                                        <th>S.price</th>
                                        <th>M.price</th>
                                        <th>L.price</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php if(count($meals) > 0): ?>
                                    <?php $__currentLoopData = $meals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $meal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><img src="<?php echo e(Storage::url($meal->image)); ?>" width="90" height="80"
                                                    alt=""></td>
                                            <td><?php echo e($meal->name); ?></td>
                                            <td><?php echo e($meal->description); ?></td>
                                            <td><?php echo e($meal->category); ?></td>
                                            <td><?php echo e($meal->small_meal_price); ?></td>
                                            <td><?php echo e($meal->med_meal_price); ?></td>
                                            <td><?php echo e($meal->large_meal_price); ?></td>

                                            <td><a href="<?php echo e(route('meals.edit', ['id' => $meal->id])); ?>">
                                                    <i class="fa fa-edit"></i></a></td>
                                            <td>
                                                <button type="button"class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($meal->id); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo e($meal->id); ?>" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
                                                <form action="<?php echo e(route('meals.delete', ['id' => $meal->id])); ?>"
                                                    method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="model-header">

                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                               <h2>Are you sure to delete?</h2>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete </button>
                                                                <button type="button"  class="btn btn-primary"data-bs-dismiss="modal">cancel</button>
                                                            </div><!--model-header-->
                                                        </div><!--modal-content-->
                                                    </div><!--modal-dialog-->
                                                </form>
                                            </div><!-- modal fade -->
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="alert alert-danger text-center">
                                        <h2>No meals to show</h2>
                                    </div>
                                <?php endif; ?>
            </tbody>

            </table>

            <div> <?php echo e($meals->links()); ?></div>
        </div><!-- card-body -->
    </div><!-- card -->
    </div><!-- 8 -->



    </div><!-- row -->
    </div><!-- container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\projects\hope_isuccess\resources\views/meals/index.blade.php ENDPATH**/ ?>