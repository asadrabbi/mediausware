<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
        <div class="row">
            <div class="col-md-12 group-col">
                <h3>Recent Post Sent to Buffer</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(Request::url()); ?>" method = "GET">
                            <input type="text" name="search" id="#search">
                            <input class="datepicker" data-date-format="mm/dd/yyyy" name="sent_at">
                        </form>
                    </div>
                </div>
                
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
<script>
    $('.datepicker').datepicker();
$('#filterbtn').click(function(e){
    e.preventDefault();
    if($('#search-form').length){
        var param = $('#search-form').ktdtSerializeObject();
        var start = param.inetload_time_start;
        var end = param.inetload_time_end;
        if( start != '' ||  end != ''){
            if(start == ''){
                start = moment(end, 'YYYY-MM-DD').subtract(1, 'days').format('YYYY-MM-DD');
            }
            if(end == ''){
                end = moment().format('YYYY-MM-DD');
            }
            var starttime = moment(start+' 00:00:00').valueOf()/1000;
            var endtime = moment(end+' 23:59:59').valueOf()/1000;
            var time = starttime+'_'+endtime+'_payment';
            param.time = time;
            delete param['inetload_time_start'];
            delete param['inetload_time_end'];
        }
        paidsummary_table.search(param, 'params');
    }
});
</script>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>