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
                        {field: 'admin.username', title: __('Admin_id')},
                        // {field: 'office_id', title: __('Office_id')},
                        {field: 'office.shortname', title: __('Office.shortname')},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
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