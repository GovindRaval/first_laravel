
<?php $__env->startSection('page_title',  trans('admin.role_permission')); ?>
<?php $__env->startSection('additional_css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <?php echo $__env->make('layout/toaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(__('admin.role_permission')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home.index')); ?>"><?php echo e(__('admin.home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('super-admin.role-permission.index')); ?>"><?php echo e(__('admin.role_permission')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(__('admin.list')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card <?php echo e(config('custom.card-primary')); ?>">
                <div class="card-header">
                    <h3 class="card-title"><?php echo e(__('admin.assign_role_permission')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_super_admin_role_permission'))): ?>
                    <button type="button" class="<?php echo e(config('custom.btn-primary')); ?> update-role-permission update float-right" title="<?php echo e(__('admin.want_to_update')); ?>"><?php echo e(__('admin.want_to_update')); ?></button>
                    <?php endif; ?>
                </div>
                <form method="post" action="<?php echo e(route('super-admin.role-permission.update',["id"=>$selectedRolId])); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo e(__('admin.select_role')); ?></label><span class="required"></span>
                                    <select disabled="" name="role_id[]" multiple="" class="form-control select2 <?php echo e(config('custom.select2-css')); ?>" data-dropdown-css-class="<?php echo e(config('custom.select2-css')); ?>">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($record->id); ?>" <?php echo e((collect(old('role_id',$selectedRolId))->contains($record->id)) ? 'selected':''); ?>><?php echo e(ucfirst($record->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="label-message text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="role_id" value="<?php echo e($selectedRolId); ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body table-responsive p-0">
                                    <label><?php echo e(__('admin.select_permission')); ?></label><span class="required"></span>
                                    <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="label-message text-danger"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <table class="table table-head-fixed text-nowrap table-striped">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('admin.permission_list')); ?>

                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="chk_all" id="chk_all">
                                                        <label for="chk_all">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </th>
                                                <th><?php echo e(__('admin.view')); ?>

                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="chk_all_view" id="chk_all_view">
                                                        <label for="chk_all_view">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </th>
                                                <th><?php echo e(__('admin.create')); ?>

                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="chk_all_create" id="chk_all_create">
                                                        <label for="chk_all_create">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </th>
                                                <th><?php echo e(__('admin.edit')); ?>

                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="chk_all_edit" id="chk_all_edit">
                                                        <label for="chk_all_edit">
                                                            <?php echo e(__('admin.select_all')); ?> 
                                                        </label>
                                                    </div>
                                                </th>
                                                <th><?php echo e(__('admin.delete')); ?>

                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="chk_all_delete" id="chk_all_delete">
                                                        <label for="chk_all_delete">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $menu_level1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="level_1"><?php echo e($level1->name); ?>

                                                    <!--Level 1-->
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="i-level1_<?php echo e($level1->id); ?>-all level1_chk_all level1_<?php echo e($level1->id); ?>" id="level1_<?php echo e($level1->id); ?>">
                                                        <label for="level1_<?php echo e($level1->id); ?>">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--View-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('View_'.$level1->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 view_chk level1_<?php echo e($level1->id); ?>" data-level1='i-level1_<?php echo e($level1->id); ?>' value="View_<?php echo e($level1->id); ?>" id="View_<?php echo e($level1->id); ?>">
                                                        <label for="View_<?php echo e($level1->id); ?>">
                                                            <?php echo e(__('admin.view')); ?> <?php echo e($level1->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Create-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Create_'.$level1->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 create_chk level1_<?php echo e($level1->id); ?>" data-level1='i-level1_<?php echo e($level1->id); ?>' value="Create_<?php echo e($level1->id); ?>" id="Create_<?php echo e($level1->id); ?>">
                                                        <label for="Create_<?php echo e($level1->id); ?>">
                                                            <?php echo e(__('admin.create')); ?> <?php echo e($level1->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Edit-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Edit_'.$level1->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 edit_chk level1_<?php echo e($level1->id); ?>" data-level1='i-level1_<?php echo e($level1->id); ?>' value="Edit_<?php echo e($level1->id); ?>" id="Edit_<?php echo e($level1->id); ?>">
                                                        <label for="Edit_<?php echo e($level1->id); ?>">
                                                            <?php echo e(__('admin.edit')); ?> <?php echo e($level1->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Delete-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Delete_'.$level1->id)) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" class="level1 delete_chk level1_<?php echo e($level1->id); ?>" data-level1='i-level1_<?php echo e($level1->id); ?>' value="Delete_<?php echo e($level1->id); ?>" id="Delete_<?php echo e($level1->id); ?>">
                                                        <label for="Delete_<?php echo e($level1->id); ?>">
                                                            <?php echo e(__('admin.delete')); ?> <?php echo e($level1->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <?php if($level1->getMenuLevel2()): ?>
                                            </tr>
                                            <?php $__currentLoopData = $level1->getMenuLevel2(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="level_2"><?php echo e($level2->name); ?>

                                                    <!--Level 2-->
                                                    <div class="icheck-primary">
                                                        <input  type="checkbox" class="i-level2_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>-all level2_chk_all level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?>" id="level1_<?php echo e($level1->id); ?>_level2_<?php echo e($level2->id); ?>">
                                                        <label for="level1_<?php echo e($level1->id); ?>_level2_<?php echo e($level2->id); ?>">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--View-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('View_'.$level1->id.'_'.$level2->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 view_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?>" data-level2='i-level2_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>' value="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>" id="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                        <label for="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                            <?php echo e(__('admin.view')); ?> <?php echo e($level2->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Create-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Create_'.$level1->id.'_'.$level2->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 create_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?>" data-level2='i-level2_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>' value="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>" id="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                        <label for="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                            <?php echo e(__('admin.create')); ?> <?php echo e($level2->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Edit-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Edit_'.$level1->id.'_'.$level2->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 edit_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?>" data-level2='i-level2_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>' value="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>" id="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                        <label for="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                            <?php echo e(__('admin.edit')); ?> <?php echo e($level2->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Delete-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Delete_'.$level1->id.'_'.$level2->id)) ? 'checked' : ''); ?> type="checkbox" name="permissions[]" class="level1 delete_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?>" data-level2='i-level2_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>' value="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>" id="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                        <label for="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>">
                                                            <?php echo e(__('admin.delete')); ?> <?php echo e($level2->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <?php if($level2->getMenuLevel3()): ?>
                                            </tr>
                                            <?php $__currentLoopData = $level2->getMenuLevel3(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="level_3"><?php echo e($level3->name); ?>

                                                    <!--Level 3-->
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="i-level3_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>-all level3_chk_all level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?> level3_<?php echo e($level3->id); ?>" id='level1_<?php echo e($level1->id); ?>_level2_<?php echo e($level2->id); ?>_level3_<?php echo e($level3->id); ?>'>
                                                        <label for="level1_<?php echo e($level1->id); ?>_level2_<?php echo e($level2->id); ?>_level3_<?php echo e($level3->id); ?>">
                                                            <?php echo e(__('admin.select_all')); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--View-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('View_'.$level1->id.'_'.$level2->id.'_'.$level3->id)) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" class="level1 view_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?> level3_<?php echo e($level3->id); ?>" data-level3='i-level3_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>' value="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>" id="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <label for="View_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <?php echo e(__('admin.view')); ?> <?php echo e($level3->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Create-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Create_'.$level1->id.'_'.$level2->id.'_'.$level3->id)) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" class="level1 create_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?> level3_<?php echo e($level3->id); ?>" data-level3='i-level3_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>' value="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>" id="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <label for="Create_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <?php echo e(__('admin.create')); ?> <?php echo e($level3->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Edit-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Edit_'.$level1->id.'_'.$level2->id.'_'.$level3->id)) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" class="level1 edit_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?> level3_<?php echo e($level3->id); ?>" data-level3='i-level3_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>' value="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>" id="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <label for="Edit_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <?php echo e(__('admin.edit')); ?> <?php echo e($level3->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!--Delete-->
                                                    <div class="icheck-primary">
                                                        <input <?php echo e((collect(old('permissions',$permission))->contains('Delete_'.$level1->id.'_'.$level2->id.'_'.$level3->id)) ? 'checked' : ''); ?>  type="checkbox" name="permissions[]" class="level1 delete_chk level1_<?php echo e($level1->id); ?> level2_<?php echo e($level2->id); ?> level3_<?php echo e($level3->id); ?>" data-level3='i-level3_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>' value="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>" id="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <label for="Delete_<?php echo e($level1->id); ?>_<?php echo e($level2->id); ?>_<?php echo e($level3->id); ?>">
                                                            <?php echo e(__('admin.delete')); ?> <?php echo e($level3->name); ?>

                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer submit-btn hidden">
                        <span class="float-left"><?php echo __('admin.additional_notes'); ?></span>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(config('custom_middleware.edit_super_admin_role_permission'))): ?>
                        <div class="btn-toolbar float-right">
                            <div class="btn-group mr-2">
                                <a href="<?php echo e(route('super-admin.role-permission.index')); ?>" class="<?php echo e(config('custom.btn-danger-form')); ?>" title="<?php echo e(__('admin.cancel')); ?>"><?php echo e(__('admin.cancel')); ?></a>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="<?php echo e(config('custom.btn-success-form')); ?>" title="<?php echo e(__('admin.update')); ?>"><?php echo e(__('admin.update')); ?></button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_specific_js'); ?>
<?php echo $__env->make('layout/select2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    $(document).ready(function ()
    {
        $(window).keydown(function (event)
        {
            if (event.keyCode == 13)
            {
                event.preventDefault();
                return false;
            }
        });
        $("input[type=checkbox]").attr("disabled", 'disabled');

        check_uncheck('view_chk', 'chk_all_view');
        check_uncheck('create_chk', 'chk_all_create');
        check_uncheck('edit_chk', 'chk_all_edit');
        check_uncheck('delete_chk', 'chk_all_delete');

        $('.level1_chk_all').change(function ()
        {
            var classes = $(this).attr("class").split(" ");
            var selected_class = classes[classes.length - 1];

            if (this.checked)
            {
                $("." + selected_class).prop('checked', true);
            }
            else
            {
                $("." + selected_class).prop('checked', false);
            }
        });
        $('.level2_chk_all').change(function ()
        {
            var classes = $(this).attr("class").split(" ");
            var selected_class = classes[classes.length - 1];

            if (this.checked)
            {
                $("." + selected_class).prop('checked', true);
            }
            else
            {
                $("." + selected_class).prop('checked', false);
            }
        });
        $('.level3_chk_all').change(function ()
        {
            var classes = $(this).attr("class").split(" ");
            var selected_class = classes[classes.length - 1];

            if (this.checked)
            {
                $("." + selected_class).prop('checked', true);
            }
            else
            {
                $("." + selected_class).prop('checked', false);
            }
        });
        $('.chk_all').change(function ()
        {
            if (this.checked)
            {
                $('input[type=checkbox]').prop('checked', true);
            }
            else
            {
                $('input[type=checkbox]').prop('checked', false);
            }
        });
        $('.chk_all_view').change(function ()
        {
            if (this.checked)
            {
                $('.view_chk').prop('checked', true);
            }
            else
            {
                $('.view_chk').prop('checked', false);
            }
        });
        $('.chk_all_create').change(function ()
        {
            if (this.checked)
            {
                $('.create_chk').prop('checked', true);
            }
            else
            {
                $('.create_chk').prop('checked', false);
            }
        });
        $('.chk_all_edit').change(function ()
        {
            if (this.checked)
            {
                $('.edit_chk').prop('checked', true);
            }
            else
            {
                $('.edit_chk').prop('checked', false);
            }
        });
        $('.chk_all_delete').change(function ()
        {
            if (this.checked)
            {
                $('.delete_chk').prop('checked', true);
            }
            else
            {
                $('.delete_chk').prop('checked', false);
            }
        });
        $('.view_chk').change(function ()
        {
            check_uncheck('view_chk', 'chk_all_view');
        });
        $('.create_chk').change(function ()
        {
            check_uncheck('create_chk', 'chk_all_create');
        });
        $('.edit_chk').change(function ()
        {
            check_uncheck('edit_chk', 'chk_all_edit');
        });
        $('.delete_chk').change(function ()
        {
            check_uncheck('delete_chk', 'chk_all_delete');
        });
        $('.level1').change(function ()
        {

//        var total_chk = $("[data-level3=" + $(this).attr('data-level3') + "]").length;
//        var checked_chk = $("[data-level3=" + $(this).attr('data-level3') + "]:checked").length;
//        alert(total_chk);
//        if (total_chk == checked_chk)
//        {
//            $("." + $(this).attr('data-level3') + "-all").prop('checked', true);
//        }
//        else
//        {
//            $("." + $(this).attr('data-level3') + "-all").prop('checked', false);
//        }
            check_uncheck_inner($(this), "data-level3");
            check_uncheck_inner($(this), "data-level2");
            check_uncheck_inner($(this), "data-level1");
        });

        /*
         * update-role-permission
         */

        $(".update-role-permission").click(function ()
        {
            if ($(this).hasClass("update"))
            {
                $(this).text("<?php echo e(__('admin.cancel')); ?>");
                $(this).attr("title", "<?php echo e(__('admin.cancel')); ?>");
                $("input[type=checkbox]").removeAttr("disabled");
                $(".submit-btn").removeClass("hidden");
                $(this).removeClass("update");
                $(this).addClass("cancel");
            }
            else
            {
                $(this).text("<?php echo e(__('admin.want_to_update')); ?>");
                $(this).attr("title", "<?php echo e(__('admin.want_to_update')); ?>");
                $("input[type=checkbox]").attr("disabled", 'disabled');
                $(this).removeClass("cancel");
                $(".submit-btn").addClass("hidden");
                $(this).addClass("update");
            }
        });
    });
    function check_uncheck_inner(current_element, selected_attr)
    {
        var total_chk = $("[" + selected_attr + "=" + $(current_element).attr(selected_attr) + "]").length;
        var checked_chk = $("[" + selected_attr + "=" + $(current_element).attr(selected_attr) + "]:checked").length;
//    alert(total_chk);
//    alert(checked_chk);
        if (total_chk == checked_chk)
        {
            $("." + $(current_element).attr(selected_attr) + "-all").prop('checked', true);
        }
        else
        {
            $("." + $(current_element).attr(selected_attr) + "-all").prop('checked', false);
        }
    }
    function check_uncheck(single_chk_class, select_all_chk_class)
    {
        var total_chk = $("." + single_chk_class).length;
        var checked_chk = $("." + single_chk_class + ":checked").length;
        if (total_chk == checked_chk)
        {
            $("." + select_all_chk_class).prop('checked', true);
        }
        else
        {
            $("." + select_all_chk_class).prop('checked', false);
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\first_laravel\resources\views/super-admin/role-permission/view.blade.php ENDPATH**/ ?>