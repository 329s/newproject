define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init(
                {
                    extend: {
                        index_url: 'vehicle/model/index',
                        add_url: 'vehicle/model/add',
                        edit_url: 'vehicle/model/edit',
                        del_url: 'vehicle/model/del',
                        multi_url: 'vehicle/model/multi',
                        table: 'vehicle_model',
                    }
                },

                // // 设置颜色
                // {
                //     custom: {'0':'success','1':'gray','2':'danger'}
                // }
            );

            var table = $("#table");
            //搜索文本框默认显示内容
            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "请输入品牌,车系,车型搜索";};

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'weight',
                showToggle:false,
                showColumns:false,
                showRefresh:true,//刷新按钮
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'vehicle_model_logo_image', operate:false, title: __('Vehicle_model_logo_image'), formatter: Table.api.formatter.image},
                        {field: 'vehiclebrand.name', title: __('Vehicle_brand_id'),visible:false},
                        {field: 'vehicleseries.name', title: __('Model_series_id'),visible:false},
                        {field: 'vehicle_model', title: __('Vehicle_model')},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0'),"1":__('Status 1'),"2":__('Status 2')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'vehicle_type', title: __('Vehicle_type'), visible:false, searchList: {"1":__('Vehicle_type 1'),"2":__('Vehicle_type 2'),"3":__('Vehicle_type 3'),"4":__('Vehicle_type 4'),"5":__('Vehicle_type 5')}},
                        {field: 'vehicle_type_text', title: __('Vehicle_type'), operate:false},
                        {field: 'vehicle_flag', title: __('Vehicle_flag'), operate:false,  visible:false, /*searchList: {"1":__('Vehicle_flag 1'),"2":__('Vehicle_flag 2'),"4":__('Vehicle_flag 4'),"8":__('Vehicle_flag 8'),"16":__('Vehicle_flag 16'),"32":__('Vehicle_flag 32'),"64":__('Vehicle_flag 64')},*/ formatter: Table.api.formatter.flag},
                        {field: 'vehicle_flag_text', title: __('Vehicle_flag'),operate:false,formatter: Table.api.formatter.flag},
                        {field: 'carriage', title: __('Carriage'), operate:false, visible:false, searchList: {"1":__('Carriage 1'),"2":__('Carriage 2'),"3":__('Carriage 3')}},
                        {field: 'carriage_text', title: __('Carriage'), operate:false, visible:false},
                        {field: 'seat', title: __('Seat'), operate:false, visible:false, searchList: {"1":__('Seat 1'),"2":__('Seat 2'),"3":__('Seat 3'),"4":__('Seat 4'),"5":__('Seat 5'),"6":__('Seat 6')}},
                        {field: 'seat_text', title: __('Seat'), operate:false,visible:false},
                        {field: 'gearbox', title: __('Gearbox'), operate:false, visible:false, searchList: {"1":__('Gearbox 1'),"2":__('Gearbox 2')}},
                        {field: 'gearbox_text', title: __('Gearbox'), operate:false,visible:false},
                        {field: 'emission', title: __('Emission'), operate:false,visible:false},
                        {field: 'oil_capacity', title: __('Oil_capacity'), operate:false,visible:false},
                        {field: 'oil_label', title: __('Oil_label'), operate:false, visible:false, searchList: {"1":__('Oil_label 1'),"2":__('Oil_label 2'),"3":__('Oil_label 3'),"4":__('Oil_label 4'),"5":__('Oil_label 5')}},
                        {field: 'oil_label_text', title: __('Oil_label'), operate:false,visible:false},
                        {field: 'air_intake_mode', title: __('Air_intake_mode'), operate:false, visible:false, searchList: {"1":__('Air_intake_mode 1'),"2":__('Air_intake_mode 2')}},
                        {field: 'air_intake_mode_text', title: __('Air_intake_mode'), operate:false,visible:false},
                        {field: 'poundage', title: __('Poundage'), operate:false},
                        {field: 'basic_service_charge', title: __('Basic_service_charge'), operate:'BETWEEN', operate:false},
                        {field: 'rent_deposit', title: __('Rent_deposit'), operate:'BETWEEN', operate:false},
                        {field: 'overtime_price_personal', title: __('Overtime_price_personal'), operate:'BETWEEN', operate:false},
                        {field: 'vehicle_model_main_image', visible:false, operate:false, title: __('Vehicle_model_main_image'), formatter: Table.api.formatter.image},
                        {field: 'vehicle_model_left_image', visible:false, operate:false, title: __('Vehicle_model_left_image'), formatter: Table.api.formatter.image},
                        {field: 'vehicle_model_right_image', visible:false, operate:false, title: __('Vehicle_model_right_image'), formatter: Table.api.formatter.image},
                        {field: 'vehicle_model_front_image', visible:false, operate:false, title: __('Vehicle_model_front_image'), formatter: Table.api.formatter.image},
                        {field: 'vehicle_model_back_image', visible:false, operate:false, title: __('Vehicle_model_back_image'), formatter: Table.api.formatter.image},
                        {field: 'admin.nickname', title: __('Admin_id'), operate:false},
                        {field: 'weight', title: __('Weight')},
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
            $("#c-model_series_id").data("params",function(obj){
                return {custom: {vehicle_brand_id: $("#c-vehicle_brand_id").val()}};
            });

            $("#c-vehicle_model").data("value",function(obj){
                // return $("#c-vehicle_brand_id").val().$("#c-model_series_id").val()
            });
            Controller.api.bindevent();
        },
        edit: function () {
            $("#c-model_series_id").data("params",function(obj){
                return {custom: {vehicle_brand_id: $("#c-vehicle_brand_id").val()}};
            });
            // var vehicle_model = 'dfd';
            // $("#c-vehicle_model").val(vehicle_model);
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