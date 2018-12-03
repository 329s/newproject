define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'general/festival/index',
                    add_url: 'general/festival/add',
                    edit_url: 'general/festival/edit',
                    del_url: 'general/festival/del',
                    multi_url: 'general/festival/multi',
                    table: 'festival_holiday',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'start_date', title: __('Start_date'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'end_date', title: __('End_date'), operate:'RANGE', addclass:'datetimerange'},
                        {field: 'is_full_required', title: __('Is_full_required'), visible:false, searchList: {"0":__('Is_full_required 0'),"1":__('Is_full_required 1')}},
                        {field: 'is_full_required_text', title: __('Is_full_required'), operate:false},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0'),"1":__('Status 1'),"2":__('Status 2')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'admin.username', title: __('Admin_id')},
                        // {field: 'admin_id', title: __('Admin_id')},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin.id', title: __('Admin.id')},
                        // {field: 'admin.nickname', title: __('Admin.nickname')},
                        // {field: 'admin.password', title: __('Admin.password')},
                        // {field: 'admin.salt', title: __('Admin.salt')},
                        // {field: 'admin.avatar', title: __('Admin.avatar')},
                        // {field: 'admin.email', title: __('Admin.email')},
                        // {field: 'admin.loginfailure', title: __('Admin.loginfailure')},
                        // {field: 'admin.logintime', title: __('Admin.logintime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin.createtime', title: __('Admin.createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin.updatetime', title: __('Admin.updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin.token', title: __('Admin.token')},
                        // {field: 'admin.status', title: __('Admin.status'), formatter: Table.api.formatter.status},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
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