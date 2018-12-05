define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'user/member/index',
                    add_url: 'user/member/add',
                    edit_url: 'user/member/edit',
                    del_url: 'user/member/del',
                    multi_url: 'user/member/multi',
                    table: 'user_member',
                }
            });

            var table = $("#table");
            //搜索文本框默认显示内容
            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "请输入姓名、手机号、身份证号码、邀请码";};

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                showToggle:false,
                showColumns:false,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'identity_type', title: __('Identity_type'), visible:false, searchList: {"1":__('Identity_type 1'),"2":__('Identity_type 2'),"3":__('Identity_type 3')}},
                        {field: 'identity_type_text', title: __('Identity_type'), operate:false},
                        {field: 'identity_id', title: __('Identity_id')},
                        // {field: 'identity_image', title: __('Identity_image'), formatter: Table.api.formatter.image},
                        {field: 'telephone', title: __('Telephone')},
                        // {field: 'user_id', title: __('User_id')},
                        {field: 'birthday', title: __('Birthday'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'total_consumption', title: __('Total_consumption'), operate:'BETWEEN'},
                        {field: 'score', title: __('Score')},
                        // {field: 'use_score', title: __('Use_score')},
                        {field: 'invite_code', title: __('Invite_code')},
                        // {field: 'invited_code', title: __('Invited_code')},
                        // {field: 'max_renting_cars', title: __('Max_renting_cars'), visible:false, searchList: {"4) unsigne":__('4) unsigne')}},
                        // {field: 'max_renting_cars_text', title: __('Max_renting_cars'), operate:false},
                        {field: 'isblack', title: __('Isblack'), visible:false, searchList: {"0":__('Isblack 0'),"1":__('Isblack 1')}},
                        {field: 'isblack_text', title: __('Isblack'), operate:false},
                        // {field: 'admin_id', title: __('Admin_id')},
                        {field: 'admin.username', title: __('Admin_id'),operate:false},
                        {field: 'office_id', title: __('Office_id'),visible:false,searchList:$.getJSON("office/selectOffice/?parentid=1")},
                        {field: 'office.shortname', title: __('Office.shortname'),operate:false},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
            // 绑定TAB事件
            $('.panel-heading a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var field = $(this).closest("ul").data("field");
                var value = $(this).data("value");
                var options = table.bootstrapTable('getOptions');
                options.pageNumber = 1;
                options.queryParams = function (params) {
                    var filter = {};
                    if (value !== '') {
                        filter[field] = value;
                    }
                    params.filter = JSON.stringify(filter);
                    return params;
                };
                table.bootstrapTable('refresh', {});
                return false;
            });
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});