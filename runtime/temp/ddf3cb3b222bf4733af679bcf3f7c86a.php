<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"F:\phpStudy\WWW\newproject\public/../application/admin\view\vehicle\vehicle\add.html";i:1541820680;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
                                <form id="add-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Plate_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-plate_number" data-rule="required" class="form-control" name="row[plate_number]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_model_id" data-rule="required" data-source="vehicle/model/index" data-field="vehicle_model" data-pagination="true" data-page-size="10"  class="form-control selectpage" name="row[vehicle_model_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Belong_office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-belong_office_id" data-rule="required" data-source="office/index" data-field="fullname" data-params='{"custom[parentid]":"1","custom[status]":"0"}' class="form-control selectpage" name="row[belong_office_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Stop_office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-stop_office_id" data-rule="required" data-source="office/index" data-field="fullname"  data-params='{"custom[parentid]":"1","custom[status]":"0"}' class="form-control selectpage" name="row[stop_office_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Engine_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-engine_number" data-rule="required" class="form-control" name="row[engine_number]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_number" data-rule="required" class="form-control" name="row[vehicle_number]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Color'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-color" data-rule="required" class="form-control selectpicker" name="row[color]">
                <?php if(is_array($colorList) || $colorList instanceof \think\Collection || $colorList instanceof \think\Paginator): if( count($colorList)==0 ) : echo "" ;else: foreach($colorList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cur_kilometers'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cur_kilometers" data-rule="required" class="form-control" name="row[cur_kilometers]" type="number" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_property'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-vehicle_property" data-rule="required" class="form-control selectpicker" name="row[vehicle_property]">
                <?php if(is_array($vehiclePropertyList) || $vehiclePropertyList instanceof \think\Collection || $vehiclePropertyList instanceof \think\Paginator): if( count($vehiclePropertyList)==0 ) : echo "" ;else: foreach($vehiclePropertyList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Isactivity'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-isactivity" data-rule="required" class="form-control selectpicker" name="row[isactivity]">
                <?php if(is_array($isactivityList) || $isactivityList instanceof \think\Collection || $isactivityList instanceof \think\Paginator): if( count($isactivityList)==0 ) : echo "" ;else: foreach($isactivityList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"0"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Annual_inspection_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-annual_inspection_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[annual_inspection_time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Tci_renewal_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-tci_renewal_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[tci_renewal_time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vci_renewal_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vci_renewal_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[vci_renewal_time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Insurance'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-insurance" class="form-control selectpicker" name="row[insurance]">
                <?php if(is_array($insuranceList) || $insuranceList instanceof \think\Collection || $insuranceList instanceof \think\Paginator): if( count($insuranceList)==0 ) : echo "" ;else: foreach($insuranceList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',""))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Upkeep_mileage_interval'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-upkeep_mileage_interval" class="form-control" name="row[upkeep_mileage_interval]" type="number" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Next_upkeep_mileage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-next_upkeep_mileage" class="form-control" name="row[next_upkeep_mileage]" type="number" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Upkeep_time_interval'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-upkeep_time_interval" class="form-control" name="row[upkeep_time_interval]" type="number" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Next_upkeep_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-next_upkeep_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[next_upkeep_time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Baught_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-baught_time" data-rule="required" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[baught_time]" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Total_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-total_price" class="form-control" name="row[total_price]" type="number" value="0">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Baught_price'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-baught_price" class="form-control" step="0.01" name="row[baught_price]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Baught_tax'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-baught_tax" class="form-control" step="0.01" name="row[baught_tax]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Compulsory_insurance'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-compulsory_insurance" class="form-control" step="0.01" name="row[compulsory_insurance]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Commercial_insurance'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-commercial_insurance" class="form-control" step="0.01" name="row[commercial_insurance]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('License_plate_fee'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-license_plate_fee" class="form-control" step="0.01" name="row[license_plate_fee]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Location'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-location" data-rule="required" class="form-control" name="row[location]" type="text">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Location_number'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-location_number" data-rule="required" class="form-control" name="row[location_number]" type="text">
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