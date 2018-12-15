<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"F:\phpStudy\WWW\newproject\public/../application/admin\view\user\member\edit.html";i:1543909563;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-name" data-rule="required" class="form-control" name="row[name]" type="text" value="<?php echo $row['name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Gender'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-gender" data-rule="required" class="form-control selectpicker" name="row[gender]">
                <?php if(is_array($genderList) || $genderList instanceof \think\Collection || $genderList instanceof \think\Paginator): if( count($genderList)==0 ) : echo "" ;else: foreach($genderList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['gender'])?$row['gender']:explode(',',$row['gender']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Identity_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-identity_type" data-rule="required" class="form-control selectpicker" name="row[identity_type]">
                <?php if(is_array($identityTypeList) || $identityTypeList instanceof \think\Collection || $identityTypeList instanceof \think\Paginator): if( count($identityTypeList)==0 ) : echo "" ;else: foreach($identityTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['identity_type'])?$row['identity_type']:explode(',',$row['identity_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Identity_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-identity_id" data-rule="required"  class="form-control " name="row[identity_id]" type="text" value="<?php echo $row['identity_id']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Identity_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-identity_image" class="form-control" size="50" name="row[identity_image]" type="text" value="<?php echo $row['identity_image']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-identity_image" class="btn btn-danger plupload" data-input-id="c-identity_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-identity_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-identity_image" class="btn btn-primary fachoose" data-input-id="c-identity_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-identity_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-identity_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Telephone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-telephone" data-rule="required;mobile" class="form-control" name="row[telephone]" type="text" value="<?php echo $row['telephone']; ?>">
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-user_id" data-rule="required"  data-field="nickname" class="form-control selectpage" name="row[user_id]" type="text" value="<?php echo $row['user_id']; ?>">
        </div>
    </div> -->
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Nationality'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-nationality" class="form-control" name="row[nationality]" type="text" value="<?php echo $row['nationality']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Birthday'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-birthday" class="form-control datetimepicker" data-date-format="YYYY-MM-DD" data-use-current="true" name="row[birthday]" type="text" value="<?php echo $row['birthday']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Residence_address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-residence_address" class="form-control" name="row[residence_address]" type="text" value="<?php echo $row['residence_address']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Now_address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-now_address" class="form-control" name="row[now_address]" type="text" value="<?php echo $row['now_address']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('User_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-user_type" class="form-control selectpicker" name="row[user_type]">
                <?php if(is_array($userTypeList) || $userTypeList instanceof \think\Collection || $userTypeList instanceof \think\Paginator): if( count($userTypeList)==0 ) : echo "" ;else: foreach($userTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['user_type'])?$row['user_type']:explode(',',$row['user_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Emergency_contact'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-emergency_contact" class="form-control" name="row[emergency_contact]" type="text" value="<?php echo $row['emergency_contact']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Emergency_telephone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-emergency_telephone" class="form-control" name="row[emergency_telephone]" type="text" value="<?php echo $row['emergency_telephone']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Driver_license'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-driver_license" class="form-control" name="row[driver_license]" type="text" value="<?php echo $row['driver_license']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Driver_license_type'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-driver_license_type" class="form-control selectpicker" name="row[driver_license_type]">
                <?php if(is_array($driverLicenseTypeList) || $driverLicenseTypeList instanceof \think\Collection || $driverLicenseTypeList instanceof \think\Paginator): if( count($driverLicenseTypeList)==0 ) : echo "" ;else: foreach($driverLicenseTypeList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['driver_license_type'])?$row['driver_license_type']:explode(',',$row['driver_license_type']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Driver_license_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-driver_license_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[driver_license_time]" type="text" value="<?php echo !empty($row['driver_license_time'])?$row['driver_license_time']|datetime:''; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Driver_license_expire_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-driver_license_expire_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[driver_license_expire_time]" type="text" value="<?php echo !empty($row['driver_license_expire_time'])?$row['driver_license_expire_time']|datetime:''; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Driver_license_image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-driver_license_image" class="form-control" size="50" name="row[driver_license_image]" type="text" value="<?php echo $row['driver_license_image']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-driver_license_image" class="btn btn-danger plupload" data-input-id="c-driver_license_image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-driver_license_image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-driver_license_image" class="btn btn-primary fachoose" data-input-id="c-driver_license_image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-driver_license_image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-driver_license_image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Total_consumption'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-total_consumption" class="form-control" readonly="true" step="0.01" name="row[total_consumption]" type="number" value="<?php echo $row['total_consumption']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-score" class="form-control" readonly="true"  name="row[score]" type="number" value="<?php echo $row['score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Use_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-use_score" class="form-control" readonly="true" name="row[use_score]" type="number" value="<?php echo $row['use_score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Invite_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-invite_code" class="form-control" readonly="true"  name="row[invite_code]" type="text" value="<?php echo $row['invite_code']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Invited_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-invited_code" class="form-control" name="row[invited_code]" type="text" value="<?php echo $row['invited_code']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Max_renting_cars'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-max_renting_cars" class="form-control" name="row[max_renting_cars]" type="text" value="<?php echo $row['max_renting_cars']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Isblack'); ?>:</label>
        <div class="col-xs-12 col-sm-8">

            <select  id="c-isblack" class="form-control selectpicker" name="row[isblack]">
                <?php if(is_array($isblackList) || $isblackList instanceof \think\Collection || $isblackList instanceof \think\Paginator): if( count($isblackList)==0 ) : echo "" ;else: foreach($isblackList as $key=>$vo): ?>
                    <option value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['isblack'])?$row['isblack']:explode(',',$row['isblack']))): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Black_reason'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-black_reason" class="form-control" name="row[black_reason]" type="text" value="<?php echo $row['black_reason']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Violation_score'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-violation_score" class="form-control" name="row[violation_score]" type="number" value="<?php echo $row['violation_score']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Violation_penalty'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-violation_penalty" class="form-control" name="row[violation_penalty]" type="number" value="<?php echo $row['violation_penalty']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Accident'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-accident" class="form-control" name="row[accident]" type="number" value="<?php echo $row['accident']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Company_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-company_name" class="form-control" name="row[company_name]" type="text" value="<?php echo $row['company_name']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Company_address'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-company_address" class="form-control" name="row[company_address]" type="text" value="<?php echo $row['company_address']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Company_telephone'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-company_telephone" class="form-control" name="row[company_telephone]" type="text" value="<?php echo $row['company_telephone']; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Unfreeze_time'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-unfreeze_time" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[unfreeze_time]" type="text" value="<?php echo !empty($row['unfreeze_time'])?$row['unfreeze_time']|datetime:''; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Office_id'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-office_id" data-rule="required" data-source="office/index" data-field="fullname" data-params='{"custom[parentid]":"1","custom[status]":"0"}' data-pagination="true" data-page-size="5" data-order-by="id asc,areaid" class="form-control selectpage" name="row[office_id]" type="text" value="<?php echo $row['office_id']; ?>">
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