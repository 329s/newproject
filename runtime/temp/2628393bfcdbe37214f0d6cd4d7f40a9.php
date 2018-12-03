<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"F:\phpStudy\WWW\newproject\public/../application/admin\view\vehicle\model\add.html";i:1543384256;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_brand_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_brand_id" data-rule="required" data-source="vehicle/brand/index" data-params='{"custom[vehicle_brand_id]":"0"}' class="form-control selectpage" name="row[vehicle_brand_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Model_series_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-model_series_id" data-rule="required" data-source="vehicle/brand/index" data-params='' class="form-control selectpage" name="row[model_series_id]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_model" data-rule="required" class="form-control" name="row[vehicle_model]" type="text">
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-status" data-rule="required" class="form-control selectpicker" name="row[status]">
                <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div> -->
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"0"))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-vehicle_type" data-rule="required" class="form-control selectpicker" name="row[vehicle_type]">
                <?php if(is_array($vehicleTypeList) || $vehicleTypeList instanceof \think\Collection || $vehicleTypeList instanceof \think\Paginator): if( count($vehicleTypeList)==0 ) : echo "" ;else: foreach($vehicleTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_flag'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-vehicle_flag" data-rule="required" class="form-control selectpicker" multiple="" name="row[vehicle_flag][]">
                <?php if(is_array($vehicleFlagList) || $vehicleFlagList instanceof \think\Collection || $vehicleFlagList instanceof \think\Paginator): if( count($vehicleFlagList)==0 ) : echo "" ;else: foreach($vehicleFlagList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',""))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Carriage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-carriage" data-rule="required" class="form-control selectpicker" name="row[carriage]">
                <?php if(is_array($carriageList) || $carriageList instanceof \think\Collection || $carriageList instanceof \think\Paginator): if( count($carriageList)==0 ) : echo "" ;else: foreach($carriageList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"3"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Seat'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-seat" data-rule="required" class="form-control selectpicker" name="row[seat]">
                <?php if(is_array($seatList) || $seatList instanceof \think\Collection || $seatList instanceof \think\Paginator): if( count($seatList)==0 ) : echo "" ;else: foreach($seatList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"5"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Gearbox'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-gearbox" data-rule="required" class="form-control selectpicker" name="row[gearbox]">
                <?php if(is_array($gearboxList) || $gearboxList instanceof \think\Collection || $gearboxList instanceof \think\Paginator): if( count($gearboxList)==0 ) : echo "" ;else: foreach($gearboxList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"2"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Emission'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-emission" data-rule="required" class="form-control" name="row[emission]" type="number">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Oil_capacity'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-oil_capacity" data-rule="required" class="form-control" name="row[oil_capacity]" type="number">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Oil_label'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-oil_label" data-rule="required" class="form-control selectpicker" name="row[oil_label]">
                <?php if(is_array($oilLabelList) || $oilLabelList instanceof \think\Collection || $oilLabelList instanceof \think\Paginator): if( count($oilLabelList)==0 ) : echo "" ;else: foreach($oilLabelList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Air_intake_mode'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
                        
            <select  id="c-air_intake_mode" data-rule="required" class="form-control selectpicker" name="row[air_intake_mode]">
                <?php if(is_array($airIntakeModeList) || $airIntakeModeList instanceof \think\Collection || $airIntakeModeList instanceof \think\Paginator): if( count($airIntakeModeList)==0 ) : echo "" ;else: foreach($airIntakeModeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Poundage'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-poundage" data-rule="required" class="form-control" step="0.01" name="row[poundage]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Basic_service_charge'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-basic_service_charge" data-rule="required" class="form-control" step="0.01" name="row[basic_service_charge]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Rent_deposit'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-rent_deposit" data-rule="required" class="form-control" step="0.01" name="row[rent_deposit]" type="number" value="0.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Overtime_price_personal'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-overtime_price_personal" data-rule="required" class="form-control" step="0.01" name="row[overtime_price_personal]" type="number" value="30.00">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_logo_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_logo_image" data-rule="required" class="form-control" size="50" name="row[vehicle_model_logo_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_logo_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_logo_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_logo_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_logo_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_logo_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_logo_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_logo_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_main_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_main_image" class="form-control" size="50" name="row[vehicle_model_main_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_main_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_main_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_main_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_main_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_main_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_main_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_main_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_left_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_left_image" class="form-control" size="50" name="row[vehicle_model_left_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_left_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_left_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_left_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_left_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_left_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_left_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_left_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_right_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_right_image" class="form-control" size="50" name="row[vehicle_model_right_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_right_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_right_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_right_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_right_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_right_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_right_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_right_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_front_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_front_image" class="form-control" size="50" name="row[vehicle_model_front_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_front_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_front_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_front_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_front_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_front_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_front_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_front_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_back_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-vehicle_model_back_image" class="form-control" size="50" name="row[vehicle_model_back_image]" type="text">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-vehicle_model_back_image" class="btn btn-danger plupload" data-input-id="c-vehicle_model_back_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-vehicle_model_back_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-vehicle_model_back_image" class="btn btn-primary fachoose" data-input-id="c-vehicle_model_back_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-vehicle_model_back_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-vehicle_model_back_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Weight'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-weight" class="form-control" name="row[weight]" type="number">
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