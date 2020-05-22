<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
        <div class="row">
            <div class="col-md-12 group-col">
                <h3>Recent Post Sent to Buffer</h3>
                <div class="panel panel-default">
                    <table style="width:100%">
                        <tr>
                          <th>Group Name</th>
                          <th>Group Type</th>
                          <th>Account name</th>
                          <th>Post Text</th>
                          <th>Time</th>
                        </tr>
                        <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buffer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="col-md-2"><?php echo e($buffer->groupInfo ? $buffer->groupInfo->type : ''); ?></td>
                            <td class="col-md-2"><?php echo e($buffer->groupInfo ? $buffer->groupInfo->name : ''); ?></td>
                            <td class="col-md-2"><?php echo e($buffer->accountInfo ? $buffer->accountInfo->name : ''); ?></td>
                            <td class="col-md-4"><?php echo e($buffer->post_text); ?></td>
                            <td class="col-md-2"><?php echo e($buffer->sent_at); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </table> 
                      <div class="col-md-12 text-center">
                      <?php echo e($history->links()); ?>

                      </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>