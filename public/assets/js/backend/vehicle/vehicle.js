define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'vehicle/vehicle/index',
                    add_url: 'vehicle/vehicle/add',
                    edit_url: 'vehicle/vehicle/edit',
                    del_url: 'vehicle/vehicle/del',
                    multi_url: 'vehicle/vehicle/multi',
                    table: 'vehicle',
                }
            });

            var table = $("#table");
            //搜索文本框默认显示内容
            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "请输入车牌搜索";};


            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                showToggle:false,
                showColumns:false,
                striped:true,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id'), operate:false},
                        {field: 'plate_number', title: __('Plate_number')},
                        {field: 'vehiclemodel.vehicle_model', title: __('Vehicle_model_id')},
                        {field: 'status', title: __('Status'), visible:false, searchList: {" 0":__('Status  0'),"1":__('Status 1'),"2":__('Status 2'),"3":__('Status 3'),"4":__('Status 4')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'belongoffice.shortname', title: __('Belong_office_id')},
                        {field: 'stopoffice.shortname', title: __('Stop_office_id')},
                        {field: 'engine_number', title: __('Engine_number')},
                        {field: 'vehicle_number', title: __('Vehicle_number')},
                        {field: 'color', title: __('Color'), operate:false, visible:false, searchList: {"0":__('Color 0'),"1":__('Color 1'),"2":__('Color 2'),"3":__('Color 3'),"4":__('Color 4'),"5":__('Color 5'),"6":__('Color 6'),"7":__('Color 7'),"8":__('Color 8'),"9":__('Color 9'),"10":__('Color 10'),"11":__('Color 11'),"12":__('Color 12'),"13":__('Color 13')}},
                        {field: 'color_text', title: __('Color'), operate:false},
                        {field: 'cur_kilometers', title: __('Cur_kilometers'), operate:false},
                        {field: 'vehicle_property', title: __('Vehicle_property'), visible:false, searchList: {"1":__('Vehicle_property 1'),"2":__('Vehicle_property 2'),"3":__('Vehicle_property 3')}},
                        {field: 'vehicle_property_text', title: __('Vehicle_property'), operate:false},
                        {field: 'isactivity', title: __('Isactivity'), visible:false, searchList: {"0":__('Isactivity 0'),"1":__('Isactivity 1')}},
                        {field: 'isactivity_text', title: __('Isactivity'), operate:false,visible:false},
                        {field: 'annual_inspection_time', title: __('Annual_inspection_time'), visible:false,  operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'tci_renewal_time', title: __('Tci_renewal_time'), visible:false,  operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'vci_renewal_time', title: __('Vci_renewal_time'), visible:false,  operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'insurance', title: __('Insurance'), visible:false, searchList: {"1":__('Insurance 1'),"2":__('Insurance 2')}},
                        {field: 'insurance_text', title: __('Insurance'), operate:false, visible:false, },
                        {field: 'upkeep_mileage_interval', title: __('Upkeep_mileage_interval'), visible:false, operate:false},
                        {field: 'next_upkeep_mileage', title: __('Next_upkeep_mileage'), visible:false, operate:false},
                        {field: 'upkeep_time_interval', title: __('Upkeep_time_interval'), visible:false, operate:false},
                        {field: 'next_upkeep_time', title: __('Next_upkeep_time'), visible:false,  operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'baught_time', title: __('Baught_time'), visible:false, operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'total_price', title: __('Total_price'), operate:false},
                        {field: 'baught_price', title: __('Baught_price'), visible:false, operate:false},
                        {field: 'baught_tax', title: __('Baught_tax'), visible:false, operate:false},
                        {field: 'compulsory_insurance', title: __('Compulsory_insurance'), visible:false, operate:false},
                        {field: 'commercial_insurance', title: __('Commercial_insurance'), visible:false, operate:false},
                        {field: 'license_plate_fee', title: __('License_plate_fee'), visible:false, operate:false},
                        {field: 'location', title: __('Location'), visible:false, operate:false},
                        {field: 'location_number', title: __('Location_number'), visible:false , operate:false},
                        {field: 'admin.nickname', title: __('Admin_id'),operate:false},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ],
                rowStyle:function(row,index){
                    if (index % 2 !== 0) {
                        var style = {css:{'background':'#d8e0e6'}};
                        return style;
                    }
                    return {};
                },
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