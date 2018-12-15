<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:86:"F:\phpStudy\WWW\newproject\public/../application/admin\view\vehicle\fee\plan\edit.html";i:1543538847;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Vehicle_model_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-vehicle_model_id" data-rule="required" data-source="vehicle/model/index" data-field="vehicle_model" class="form-control selectpage" name="row[vehicle_model_id]" type="text" value="<?php echo $row['vehicle_model_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-office_id" data-rule="required" data-source="office/index" data-field="fullname" class="form-control selectpage" name="row[office_id]" type="text" value="<?php echo $row['office_id']; ?>">
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_default_online_normal'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_default_online_normal" data-rule="required" class="form-control" name="row[price_default_online_normal]" type="number" value="<?php echo $row['price_default_online_normal']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_default_online_weekend'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_default_online_weekend" data-rule="required" class="form-control" name="row[price_default_online_weekend]" type="number" value="<?php echo $row['price_default_online_weekend']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_default_office_normal'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_default_office_normal" data-rule="required" class="form-control" name="row[price_default_office_normal]" type="number" value="<?php echo $row['price_default_office_normal']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_default_office_weekend'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_default_office_weekend" data-rule="required" class="form-control" name="row[price_default_office_weekend]" type="number" value="<?php echo $row['price_default_office_weekend']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_week'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_week" data-rule="required" class="form-control" name="row[price_week]" type="number" value="<?php echo $row['price_week']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_month'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_month" data-rule="required" class="form-control" name="row[price_month]" type="number" value="<?php echo $row['price_month']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_special_festivals_month'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_special_festivals_month" data-rule="required" class="form-control" name="row[price_special_festivals_month]" type="number" value="<?php echo $row['price_special_festivals_month']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_sunday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_sunday" data-rule="required" class="form-control" name="row[price_sunday]" type="number" value="<?php echo $row['price_sunday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_monday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_monday" data-rule="required" class="form-control" name="row[price_monday]" type="number" value="<?php echo $row['price_monday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_tuesday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_tuesday" data-rule="required" class="form-control" name="row[price_tuesday]" type="number" value="<?php echo $row['price_tuesday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_wednesday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_wednesday" data-rule="required" class="form-control" name="row[price_wednesday]" type="number" value="<?php echo $row['price_wednesday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_thirsday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_thirsday" data-rule="required" class="form-control" name="row[price_thirsday]" type="number" value="<?php echo $row['price_thirsday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_friday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_friday" data-rule="required" class="form-control" name="row[price_friday]" type="number" value="<?php echo $row['price_friday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_saturday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_saturday" data-rule="required" class="form-control" name="row[price_saturday]" type="number" value="<?php echo $row['price_saturday']; ?>">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_1" data-rule="required" class="form-control" name="row[price_festival_1]" type="number" value="<?php echo $row['price_festival_1']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_2" data-rule="required" class="form-control" name="row[price_festival_2]" type="number" value="<?php echo $row['price_festival_2']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_3" data-rule="required" class="form-control" name="row[price_festival_3]" type="number" value="<?php echo $row['price_festival_3']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_4" data-rule="required" class="form-control" name="row[price_festival_4]" type="number" value="<?php echo $row['price_festival_4']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_5" data-rule="required" class="form-control" name="row[price_festival_5]" type="number" value="<?php echo $row['price_festival_5']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_6" data-rule="required" class="form-control" name="row[price_festival_6]" type="number" value="<?php echo $row['price_festival_6']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_7'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_7" data-rule="required" class="form-control" name="row[price_festival_7]" type="number" value="<?php echo $row['price_festival_7']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_8'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_8" data-rule="required" class="form-control" name="row[price_festival_8]" type="number" value="<?php echo $row['price_festival_8']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_9'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_9" data-rule="required" class="form-control" name="row[price_festival_9]" type="number" value="<?php echo $row['price_festival_9']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price_festival_10'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price_festival_10" data-rule="required" class="form-control" name="row[price_festival_10]" type="number" value="<?php echo $row['price_festival_10']; ?>">
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Festival_prices'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-festival_prices" data-rule="required" class="form-control" name="row[festival_prices]" type="text" value="<?php echo $row['festival_prices']; ?>">
        </div>
    </div> -->
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
            <!-- <button type="button" class="btn btn-info btn-embossed btn-accept" data-url=""><?php echo __('New add'); ?></button> -->
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