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
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('Name')},
                        {field: 'gender', title: __('Gender'), visible:false, searchList: {"0":__('Gender 0'),"1":__('Gender 1'),"2":__('Gender 2')}},
                        {field: 'gender_text', title: __('Gender'), operate:false},
                        {field: 'identity_type', title: __('Identity_type'), visible:false, searchList: {"1":__('Identity_type 1'),"2":__('Identity_type 2'),"3":__('Identity_type 3')}},
                        {field: 'identity_type_text', title: __('Identity_type'), operate:false},
                        {field: 'identity_id', title: __('Identity_id')},
                        // {field: 'identity_image', title: __('Identity_image'), formatter: Table.api.formatter.image},
                        {field: 'telephone', title: __('Telephone')},
                        // {field: 'user_id', title: __('User_id')},
                        {field: 'nationality', title: __('Nationality')},
                        {field: 'birthday', title: __('Birthday'), operate:'RANGE', addclass:'datetimerange'},
                        // {field: 'residence_address', title: __('Residence_address')},
                        // {field: 'now_address', title: __('Now_address')},
                        // {field: 'user_type', title: __('User_type'), visible:false, searchList: {"1":__('User_type 1'),"2":__('User_type 2')}},
                        // {field: 'user_type_text', title: __('User_type'), operate:false},
                        // {field: 'emergency_contact', title: __('Emergency_contact')},
                        // {field: 'emergency_telephone', title: __('Emergency_telephone')},
                        // {field: 'driver_license', title: __('Driver_license')},
                        // {field: 'driver_license_type', title: __('Driver_license_type'), visible:false, searchList: {"1":__('Driver_license_type 1'),"2":__('Driver_license_type 2'),"3":__('Driver_license_type 3'),"4":__('Driver_license_type 4'),"5":__('Driver_license_type 5'),"6":__('Driver_license_type 6')}},
                        // {field: 'driver_license_type_text', title: __('Driver_license_type'), operate:false},
                        // {field: 'driver_license_time', title: __('Driver_license_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'driver_license_expire_time', title: __('Driver_license_expire_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'driver_license_image', title: __('Driver_license_image'), formatter: Table.api.formatter.image},
                        {field: 'total_consumption', title: __('Total_consumption'), operate:'BETWEEN'},
                        {field: 'score', title: __('Score')},
                        // {field: 'use_score', title: __('Use_score')},
                        {field: 'invite_code', title: __('Invite_code')},
                        // {field: 'invited_code', title: __('Invited_code')},
                        // {field: 'max_renting_cars', title: __('Max_renting_cars'), visible:false, searchList: {"4) unsigne":__('4) unsigne')}},
                        // {field: 'max_renting_cars_text', title: __('Max_renting_cars'), operate:false},
                        {field: 'isblack', title: __('Isblack'), visible:false, searchList: {"0":__('Isblack 0'),"1":__('Isblack 1')}},
                        {field: 'isblack_text', title: __('Isblack'), operate:false},
                        // {field: 'black_reason', title: __('Black_reason')},
                        // {field: 'violation_score', title: __('Violation_score')},
                        // {field: 'violation_penalty', title: __('Violation_penalty')},
                        // {field: 'accident', title: __('Accident'), visible:false, searchList: {"2) unsigne":__('2) unsigne')}},
                        // {field: 'accident_text', title: __('Accident'), operate:false},
                        // {field: 'company_name', title: __('Company_name')},
                        // {field: 'company_address', title: __('Company_address')},
                        // {field: 'company_telephone', title: __('Company_telephone')},
                        // {field: 'unfreeze_time', title: __('Unfreeze_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin_id', title: __('Admin_id')},
                        {field: 'admin.username', title: __('Admin.username')},
                        // {field: 'office_id', title: __('Office_id')},
                        {field: 'office.shortname', title: __('Office.shortname')},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'user.username', title: __('User.username')},
                        // {field: 'user.mobile', title: __('User.mobile')},
                        // {field: 'user.token', title: __('User.token')},
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