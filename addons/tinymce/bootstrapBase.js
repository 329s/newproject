require.config({
    paths: {
        'tinymce': '../addons/tinymce/js/tinymce.min'
    },
});
require(['form', 'upload'], function (Form, Upload) {
    var _bindevent = Form.events.bindevent;
    Form.events.bindevent = function (form) {
        _bindevent.apply(this, [form]);
        try {
            //绑定summernote事件
            if ($(".tinymce,.editor", form).size() > 0) {
                require(['tinymce'], function () {
                    tinymce.init({
                        selector: ".tinymce,.editor",//容器可以是id也可以是class
                        language: '{language}',//语言
                        //language: 'zh_CN',//语言
                        theme: 'modern',//主体默认主题
                        //width: 600,
                        // height: 250,
                        plugins: ['{plugins}'],//所含插件
                        //content_css: 'css/content.css',//设置样式
                        toolbar: '{toolbar}',//工具栏
                       //图像上传处理
                        convert_urls:false,//关闭url自动检测
                        images_upload_handler: function (blobInfo, success, failure) {
                            Upload.api.send(blobInfo.blob(), function (data) {
                                var url = Fast.api.cdnurl(data.url);
                                success( url);
                                return;
                            },function (data,ret) {
                                failure(ret.msg);
                                return;
                            });
                        },
                    //     contextmenu: false,
                        browser_spellcheck: '{browser_spellcheck}',//浏览器检查拼写
                        spellchecker_callback: function(method, text, success, failure) {
                            var words = text.match(this.getWordCharPattern());
                            if (method == "spellcheck") {
                                var suggestions = {};
                                for (var i = 0; i < words.length; i++) {
                                    suggestions[words[i]] = ["First", "Second"];
                                }
                                success(suggestions);
                            }
                        }
                    });
                    $(document).on("click", "{subDom}", function () {
                        tinymce.triggerSave();
                    });
                });
            }
        } catch (e) {

        }

    };
});
