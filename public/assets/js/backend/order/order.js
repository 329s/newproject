define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'order/order/index',
                    add_url: 'order/order/add',
                    edit_url: 'order/order/edit',
                    del_url: 'order/order/del',
                    multi_url: 'order/order/multi',
                    table: 'order',
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
                        {field: 'serial', title: __('Serial')},
                        {field: 'soure', title: __('Soure'), visible:false, searchList: {"1":__('Soure 1'),"2":__('Soure 2'),"3":__('Soure 3'),"4":__('Soure 4'),"5":__('Soure 5'),"6":__('Soure 6'),"7":__('Soure 7'),"8":__('Soure 8'),"9":__('Soure 9')}},
                        {field: 'soure_text', title: __('Soure'), operate:false},
                        {field: 'vehicle_model_id', title: __('Vehicle_model_id')},
                        {field: 'vehicle_id', title: __('Vehicle_id')},
                        {field: 'user_member_id', title: __('User_member_id')},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'usertype', title: __('Usertype'), visible:false, searchList: {"1":__('Usertype 1'),"2":__('Usertype 2')}},
                        {field: 'usertype_text', title: __('Usertype'), operate:false},
                        {field: 'start_time', title: __('Start_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'end_time', title: __('End_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'new_end_time', title: __('New_end_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'rent_days', title: __('Rent_days')},
                        {field: 'belong_office_id', title: __('Belong_office_id')},
                        {field: 'rent_office_id', title: __('Rent_office_id')},
                        {field: 'return_office_id', title: __('Return_office_id')},
                        {field: 'price_type', title: __('Price_type'), visible:false, searchList: {"1":__('Price_type 1'),"2":__('Price_type 2'),"3":__('Price_type 3'),"4":__('Price_type 4')}},
                        {field: 'price_type_text', title: __('Price_type'), operate:false},
                        {field: 'confirmed_time', title: __('Confirmed_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'dispatched_time', title: __('Dispatched_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'returned_time', title: __('Returned_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'settlemented_time', title: __('Settlemented_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'appointment_time', title: __('Appointment_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'appointment_end_time', title: __('Appointment_end_time'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'admin_id', title: __('Edit_admin_id')},
                        {field: 'vehicle_outbound_mileage', title: __('Vehicle_outbound_mileage')},
                        {field: 'vehicle_inbound_mileage', title: __('Vehicle_inbound_mileage')},
                        {field: 'total_amount', title: __('Total_amount'), operate:'BETWEEN'},
                        {field: 'paid_amount', title: __('Paid_amount'), operate:'BETWEEN'},
                        {field: 'pay_source', title: __('Pay_source'), visible:false, searchList: {"0":__('Pay_source 0'),"1":__('Pay_source 1'),"2":__('Pay_source 2'),"3":__('Pay_source 3'),"4":__('Pay_source 4'),"5":__('Pay_source 5'),"6":__('Pay_source 6'),"7":__('Pay_source 7'),"8":__('Pay_source 8')}},
                        {field: 'pay_source_text', title: __('Pay_source'), operate:false},
                        {field: 'rent_per_day', title: __('Rent_per_day'), operate:'BETWEEN'},
                        {field: 'price_rent', title: __('Price_rent'), operate:'BETWEEN'},
                        {field: 'price_poundage', title: __('Price_poundage'), operate:'BETWEEN'},
                        {field: 'price_basic_insurance', title: __('Price_basic_insurance'), operate:'BETWEEN'},
                        {field: 'price_deposit', title: __('Price_deposit'), operate:'BETWEEN'},
                        {field: 'price_deposit_violation', title: __('Price_deposit_violation'), operate:'BETWEEN'},
                        {field: 'deposit_pay_source', title: __('Deposit_pay_source'), visible:false, searchList: {"0":__('Deposit_pay_source 0'),"1":__('Deposit_pay_source 1'),"2":__('Deposit_pay_source 2'),"3":__('Deposit_pay_source 3'),"4":__('Deposit_pay_source 4'),"5":__('Deposit_pay_source 5'),"6":__('Deposit_pay_source 6'),"7":__('Deposit_pay_source 7'),"8":__('Deposit_pay_source 8')}},
                        {field: 'deposit_pay_source_text', title: __('Deposit_pay_source'), operate:false},
                        {field: 'paid_deposit', title: __('Paid_deposit'), operate:'BETWEEN'},
                        {field: 'settlement_status', title: __('Settlement_status'), visible:false, searchList: {"0":__('Settlement_status 0'),"1":__('Settlement_status 1'),"2":__('Settlement_status 2'),"3":__('Settlement_status 3'),"4":__('Settlement_status 4')}},
                        {field: 'settlement_status_text', title: __('Settlement_status'), operate:false},
                        {field: 'preferential_type', title: __('Preferential_type'), visible:false, searchList: {"4) unsigne":__('4) unsigne')}},
                        {field: 'preferential_type_text', title: __('Preferential_type'), operate:false},
                        {field: 'preferential_info', title: __('Preferential_info')},
                        {field: 'price_preferential', title: __('Price_preferential'), operate:'BETWEEN'},
                        {field: 'settlemented_admin_id', title: __('Settlemented_admin_id')},
                        {field: 'optional_service', title: __('Optional_service')},
                        {field: 'optional_service_info', title: __('Optional_service_info')},
                        {field: 'price_optional_service', title: __('Price_optional_service'), operate:'BETWEEN'},
                        {field: 'daily_rent_detailed_info', title: __('Daily_rent_detailed_info')},
                        {field: 'price_overtime', title: __('Price_overtime'), operate:'BETWEEN'},
                        {field: 'price_car_damage', title: __('Price_car_damage'), operate:'BETWEEN'},
                        {field: 'price_violation', title: __('Price_violation'), operate:'BETWEEN'},
                        {field: 'price_oil', title: __('Price_oil'), operate:'BETWEEN'},
                        {field: 'price_oil_agency', title: __('Price_oil_agency'), operate:'BETWEEN'},
                        {field: 'price_other', title: __('Price_other'), operate:'BETWEEN'},
                        {field: 'price_designated_driving', title: __('Price_designated_driving'), operate:'BETWEEN'},
                        {field: 'price_different_office', title: __('Price_different_office'), operate:'BETWEEN'},
                        {field: 'price_take_car', title: __('Price_take_car'), operate:'BETWEEN'},
                        {field: 'price_return_car', title: __('Price_return_car'), operate:'BETWEEN'},
                        {field: 'address_take_car', title: __('Address_take_car')},
                        {field: 'address_return_car', title: __('Address_return_car')},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        // {field: 'admin.id', title: __('Admin.id')},
                        {field: 'admin.username', title: __('Admin.username')},
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