<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"F:\phpStudy\WWW\newproject\public/../application/admin\view\order\order\edit.html";i:1544605804;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Serial'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-serial" data-rule="required" class="form-control" name="row[serial]" type="text" value="<?php echo $row['serial']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Soure'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-soure" data-rule="required" class="form-control selectpicker" name="row[soure]">
                <?php if(is_array($soureList) || $soureList instanceof \think\Collection || $soureList instanceof \think\Paginator): if( count($soureList)==0 ) : echo "" ;else: foreach($soureList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['soure'])?$row['soure']:explode(',',$row['soure']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_model_id" data-rule="required" data-source="vehicle/model/index" class="form-control selectpage" name="row[vehicle_model_id]" type="text" value="<?php echo $row['vehicle_model_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_id" data-rule="required" data-source="vehicle/index" class="form-control selectpage" name="row[vehicle_id]" type="text" value="<?php echo $row['vehicle_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User_member_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-user_member_id" data-rule="required" data-source="user/member/index" class="form-control selectpage" name="row[user_member_id]" type="text" value="<?php echo $row['user_member_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Usertype'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-usertype" data-rule="required" class="form-control selectpicker" name="row[usertype]">
                <?php if(is_array($usertypeList) || $usertypeList instanceof \think\Collection || $usertypeList instanceof \think\Paginator): if( count($usertypeList)==0 ) : echo "" ;else: foreach($usertypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['usertype'])?$row['usertype']:explode(',',$row['usertype']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Start_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-start_time" data-rule="required" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[start_time]" type="text" value="<?php echo datetime($row['start_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('End_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-end_time" data-rule="required" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[end_time]" type="text" value="<?php echo datetime($row['end_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('New_end_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-new_end_time" data-rule="required" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[new_end_time]" type="text" value="<?php echo datetime($row['new_end_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Rent_days'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rent_days" data-rule="required" class="form-control" name="row[rent_days]" type="number" value="<?php echo $row['rent_days']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Belong_office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-belong_office_id" data-rule="required" data-source="belong/office/index" class="form-control selectpage" name="row[belong_office_id]" type="text" value="<?php echo $row['belong_office_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Rent_office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rent_office_id" data-rule="required" data-source="rent/office/index" class="form-control selectpage" name="row[rent_office_id]" type="text" value="<?php echo $row['rent_office_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Return_office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-return_office_id" data-rule="required" data-source="return/office/index" class="form-control selectpage" name="row[return_office_id]" type="text" value="<?php echo $row['return_office_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-price_type" data-rule="required" class="form-control selectpicker" name="row[price_type]">
                <?php if(is_array($priceTypeList) || $priceTypeList instanceof \think\Collection || $priceTypeList instanceof \think\Paginator): if( count($priceTypeList)==0 ) : echo "" ;else: foreach($priceTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['price_type'])?$row['price_type']:explode(',',$row['price_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Confirmed_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-confirmed_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[confirmed_time]" type="text" value="<?php echo datetime($row['confirmed_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Returned_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-returned_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[returned_time]" type="text" value="<?php echo datetime($row['returned_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Settlemented_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-settlemented_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[settlemented_time]" type="text" value="<?php echo datetime($row['settlemented_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Appointment_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-appointment_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[appointment_time]" type="text" value="<?php echo datetime($row['appointment_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Appointment_end_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-appointment_end_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[appointment_end_time]" type="text" value="<?php echo datetime($row['appointment_end_time']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Edit_admin_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-edit_admin_id" data-rule="required" data-source="edit/admin/index" class="form-control selectpage" name="row[edit_admin_id]" type="text" value="<?php echo $row['edit_admin_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_outbound_mileage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_outbound_mileage" class="form-control" name="row[vehicle_outbound_mileage]" type="number" value="<?php echo $row['vehicle_outbound_mileage']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_inbound_mileage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_inbound_mileage" class="form-control" name="row[vehicle_inbound_mileage]" type="number" value="<?php echo $row['vehicle_inbound_mileage']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Total_amount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-total_amount" class="form-control" step="0.01" name="row[total_amount]" type="number" value="<?php echo $row['total_amount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Paid_amount'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-paid_amount" class="form-control" step="0.01" name="row[paid_amount]" type="number" value="<?php echo $row['paid_amount']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Pay_source'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-pay_source" class="form-control selectpicker" name="row[pay_source]">
                <?php if(is_array($paySourceList) || $paySourceList instanceof \think\Collection || $paySourceList instanceof \think\Paginator): if( count($paySourceList)==0 ) : echo "" ;else: foreach($paySourceList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['pay_source'])?$row['pay_source']:explode(',',$row['pay_source']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Rent_per_day'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rent_per_day" class="form-control" step="0.01" name="row[rent_per_day]" type="number" value="<?php echo $row['rent_per_day']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_rent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_rent" class="form-control" step="0.01" name="row[price_rent]" type="number" value="<?php echo $row['price_rent']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_poundage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_poundage" class="form-control" step="0.01" name="row[price_poundage]" type="number" value="<?php echo $row['price_poundage']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_basic_insurance'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_basic_insurance" class="form-control" step="0.01" name="row[price_basic_insurance]" type="number" value="<?php echo $row['price_basic_insurance']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_deposit'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_deposit" class="form-control" step="0.01" name="row[price_deposit]" type="number" value="<?php echo $row['price_deposit']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_deposit_violation'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_deposit_violation" class="form-control" step="0.01" name="row[price_deposit_violation]" type="number" value="<?php echo $row['price_deposit_violation']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Deposit_pay_source'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-deposit_pay_source" class="form-control selectpicker" name="row[deposit_pay_source]">
                <?php if(is_array($depositPaySourceList) || $depositPaySourceList instanceof \think\Collection || $depositPaySourceList instanceof \think\Paginator): if( count($depositPaySourceList)==0 ) : echo "" ;else: foreach($depositPaySourceList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['deposit_pay_source'])?$row['deposit_pay_source']:explode(',',$row['deposit_pay_source']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Paid_deposit'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-paid_deposit" class="form-control" step="0.01" name="row[paid_deposit]" type="number" value="<?php echo $row['paid_deposit']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Settlement_status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($settlementStatusList) || $settlementStatusList instanceof \think\Collection || $settlementStatusList instanceof \think\Paginator): if( count($settlementStatusList)==0 ) : echo "" ;else: foreach($settlementStatusList as $key=>$vo): ?>
            <label for="row[settlement_status]-<?php echo $key; ?>"><input id="row[settlement_status]-<?php echo $key; ?>" name="row[settlement_status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['settlement_status'])?$row['settlement_status']:explode(',',$row['settlement_status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Preferential_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-preferential_type" class="form-control selectpicker" name="row[preferential_type]">
                <?php if(is_array($preferentialTypeList) || $preferentialTypeList instanceof \think\Collection || $preferentialTypeList instanceof \think\Paginator): if( count($preferentialTypeList)==0 ) : echo "" ;else: foreach($preferentialTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['preferential_type'])?$row['preferential_type']:explode(',',$row['preferential_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Preferential_info'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-preferential_info" class="form-control" name="row[preferential_info]" type="text" value="<?php echo $row['preferential_info']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_preferential'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_preferential" class="form-control" step="0.01" name="row[price_preferential]" type="number" value="<?php echo $row['price_preferential']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Settlemented_admin_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-settlemented_admin_id" data-rule="required" data-source="settlemented/admin/index" class="form-control selectpage" name="row[settlemented_admin_id]" type="text" value="<?php echo $row['settlemented_admin_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Remark_content'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-remark_content" class="form-control editor" rows="5" name="row[remark_content]" cols="50"><?php echo $row['remark_content']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Settlement_remark_content'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-settlement_remark_content" class="form-control editor" rows="5" name="row[settlement_remark_content]" cols="50"><?php echo $row['settlement_remark_content']; ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Optional_service'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-optional_service" class="form-control" name="row[optional_service]" type="number" value="<?php echo $row['optional_service']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Optional_service_info'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-optional_service_info" class="form-control" name="row[optional_service_info]" type="text" value="<?php echo $row['optional_service_info']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_optional_service'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_optional_service" class="form-control" step="0.01" name="row[price_optional_service]" type="number" value="<?php echo $row['price_optional_service']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Daily_rent_detailed_info'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-daily_rent_detailed_info" class="form-control" name="row[daily_rent_detailed_info]" type="text" value="<?php echo $row['daily_rent_detailed_info']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_overtime'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_overtime" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[price_overtime]" type="text" value="<?php echo datetime($row['price_overtime']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_car_damage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_car_damage" class="form-control" step="0.01" name="row[price_car_damage]" type="number" value="<?php echo $row['price_car_damage']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_violation'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_violation" class="form-control" step="0.01" name="row[price_violation]" type="number" value="<?php echo $row['price_violation']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_oil'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_oil" class="form-control" step="0.01" name="row[price_oil]" type="number" value="<?php echo $row['price_oil']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_oil_agency'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_oil_agency" class="form-control" step="0.01" name="row[price_oil_agency]" type="number" value="<?php echo $row['price_oil_agency']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_other'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_other" class="form-control" step="0.01" name="row[price_other]" type="number" value="<?php echo $row['price_other']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_designated_driving'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_designated_driving" class="form-control" step="0.01" name="row[price_designated_driving]" type="number" value="<?php echo $row['price_designated_driving']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_different_office'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_different_office" class="form-control" step="0.01" name="row[price_different_office]" type="number" value="<?php echo $row['price_different_office']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_take_car'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_take_car" class="form-control" step="0.01" name="row[price_take_car]" type="number" value="<?php echo $row['price_take_car']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_return_car'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_return_car" class="form-control" step="0.01" name="row[price_return_car]" type="number" value="<?php echo $row['price_return_car']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Address_take_car'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-address_take_car" class="form-control" name="row[address_take_car]" type="text" value="<?php echo $row['address_take_car']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Address_return_car'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-address_return_car" class="form-control" name="row[address_return_car]" type="text" value="<?php echo $row['address_return_car']; ?>">
        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>