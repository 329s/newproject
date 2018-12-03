define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'vehicle/fee/plan/index',
                    add_url: 'vehicle/fee/plan/add',
                    edit_url: 'vehicle/fee/plan/edit',
                    // del_url: '',//'vehicle/fee/plan/pseudoDel',
                    del_url: 'vehicle/fee/plan/del',
                    multi_url: 'vehicle/fee/plan/multi',
                    table: 'vehicle_fee_plan',
                }
            });

            var table = $("#table");

            //搜索文本框默认显示内容
            $.fn.bootstrapTable.locales[Table.defaults.locale]['formatSearch'] = function(){return "车辆型号";};

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
                        {field: 'vehiclemodel.vehicle_model', title: __('Vehiclemodel.vehicle_model')},
                        {field: 'office.fullname', title: __('Office.fullname')},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0'),"1":__('Status 1')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'price_default_online_normal',operate:false, title: __('Price_default_online_normal')},
                        {field: 'price_default_online_weekend',operate:false,  title: __('Price_default_online_weekend')},
                        {field: 'price_default_office_normal',operate:false,  title: __('Price_default_office_normal')},
                        {field: 'price_default_office_weekend',operate:false,  title: __('Price_default_office_weekend')},
                        {field: 'price_week', title: __('Price_week'),operate:false},
                        {field: 'price_special_festivals_month', title: __('Price_special_festivals_month'),operate:false},
                        {field: 'price_month', title: __('Price_month'),operate:false},
                        {field: 'admin.username', title: __('Admin.username'),operate:false},
                        // {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), operate:false, addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {
                            field: 'operate',
                            width: "120px",
                            title: __('Operate'),
                            table: table,
                            events: Table.api.events.operate,
                            buttons:[
                                {
                                    name: 'ajax',
                                    title: __('PseudoDel'),
                                    classname: 'btn btn-xs btn-primary btn-magic btn-ajax',
                                    icon: 'fa fa-close',
                                    url: 'vehicle/fee/plan/pseudoDel',
                                    success: function (data, ret) {
                                        Layer.alert(ret.msg + ",返回数据：" + JSON.stringify(data));
                                        //如果需要阻止成功提示，则必须使用return false;
                                        //return false;
                                    },
                                    error: function (data, ret) {
                                        console.log(data, ret);
                                        Layer.alert(ret.msg);
                                        return false;
                                    }
                                },
                            ],
                            formatter: Table.api.formatter.operate
                        }
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
            $(document).on("click", ".btn-accept", function(){
                alert(11);
                Fast.api.ajax("vehicle/fee/plan/ces", function(){
                    parent.window.$("#table").bootstrapTable('refresh');
                    Fast.api.close();
                });
            });
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