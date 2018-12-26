<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"F:\phpStudy\WWW\newproject\public/../application/admin\view\order\order\index.html";i:1545356222;s:69:"F:\phpStudy\WWW\newproject\application\admin\view\layout\default.html";i:1532420613;s:66:"F:\phpStudy\WWW\newproject\application\admin\view\common\meta.html";i:1529292885;s:68:"F:\phpStudy\WWW\newproject\application\admin\view\common\script.html";i:1529292885;}*/ ?>
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
                                <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <title>Alisms短信发送示例</title>
        <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.fastadmin.net/assets/css/frontend.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="//cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="well" style="margin-top:30px;">
                <form class="form-horizontal" action="<?php echo addon_url('alisms/index/send'); ?>" method="post">
                    <fieldset>
                        <legend>阿里大于短信发送</legend>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">手机号</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="mobile" placeholder="手机号">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">消息模板</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="template" placeholder="消息模板">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">签名</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="sign" placeholder="消息模板(可以留空)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">消息参数</label>
                            <div class="col-lg-10">
                                <textarea name="param" class="form-control" cols="30" rows="10" placeholder="必须是JSON字符串"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">发送</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function () {

            });
        </script>
    </body>
</html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>