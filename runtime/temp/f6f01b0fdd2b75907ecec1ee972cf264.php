<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"F:\phpStudy\WWW\newproject\public/../application/admin\view\office\add.html";i:1543993209;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Fullname'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-fullname" data-rule="required" class="form-control" name="row[fullname]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Shortname'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-shortname" data-rule="required" class="form-control" name="row[shortname]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Manager'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-manager" data-rule="required" class="form-control" name="row[manager]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Telephone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-telephone" data-rule="required" class="form-control" name="row[telephone]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Mobile'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-mobile" data-rule="required" class="form-control" name="row[mobile]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Cityid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-cityid" data-rule="required" class="form-control" name="row[cityid]" type="hidden" value="" >
            <input id="c-cityidname"  class="form-control"  type="text" value="" data-toggle="city-picker" data-level="city" placeholder="请选择省/市">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Areaid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-areaid" data-rule="required" class="form-control" name="row[areaid]" type="hidden" value="">
            <input id="c-areaidname"  class="form-control"  type="text" value=""   data-toggle="city-picker">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Open_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-open_time" data-rule="required" class="form-control "  data-use-current="true" name="row[open_time]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Close_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-close_time" data-rule="required" class="form-control " data-use-current="true" name="row[close_time]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-address" data-rule="required" class="form-control" name="row[address]" type="text" value=""  data-toggle="addresspicker" data-input-id="c-address" data-lat-id="c-lng" data-lng-id="c-lat">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Lng'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-lng" data-rule="required" class="form-control" name="row[lng]" type="text" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Lat'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-lat" data-rule="required" class="form-control" name="row[lat]" type="text" value="">
        </div>
    </div>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Isactivity'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-isactivity" data-rule="required" class="form-control selectpicker" name="row[isactivity]">
                <?php if(is_array($isactivityList) || $isactivityList instanceof \think\Collection || $isactivityList instanceof \think\Paginator): if( count($isactivityList)==0 ) : echo "" ;else: foreach($isactivityList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"1"))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>

    <!-- <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Parentid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-parentid" data-rule="required" class="form-control" name="row[parentid]" type="number" value="0">
        </div>
    </div> -->
    <div class="form-group">
        <label for="c-parentid" class="control-label col-xs-12 col-sm-2"><?php echo __('Parentid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select id="c-parentid" data-rule="required" class="form-control selectpicker" name="row[parentid]">
                <?php if(is_array($parentList) || $parentList instanceof \think\Collection || $parentList instanceof \think\Paginator): if( count($parentList)==0 ) : echo "" ;else: foreach($parentList as $key=>$vo): ?>
                <option  class="" value="<?php echo $key; ?>" <?php if(in_array(($key), explode(',',"0"))): ?>selected<?php endif; ?>><?php echo $vo['fullname']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Officeimages'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-officeimages" data-rule="required" class="form-control" size="50" name="row[officeimages]" type="text" value="">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-officeimages" class="btn btn-danger plupload" data-input-id="c-officeimages" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-officeimages"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-officeimages" class="btn btn-primary fachoose" data-input-id="c-officeimages" data-mimetype="image/*" data-multiple="true"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-officeimages"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-officeimages"></ul>
        </div>
    </div>
   <!--  <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Edit_userid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-edit_userid" data-rule="required" class="form-control" name="row[edit_userid]" type="number" value="0">
        </div>
    </div> -->
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