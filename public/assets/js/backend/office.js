define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'office/index',
                    add_url: 'office/add',
                    edit_url: 'office/edit',
                    del_url: 'office/del',
                    multi_url: 'office/multi',
                    table: 'office',
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
                        {field: 'fullname', title: __('Fullname')},
                        {field: 'shortname', title: __('Shortname')},
                        {field: 'officeimages', title: __('Officeimages'), formatter: Table.api.formatter.images},
                        {field: 'manager', title: __('Manager')},
                        {field: 'telephone', title: __('Telephone')},
                        {field: 'mobile', title: __('Mobile')},
                        {field: 'open_time', title: __('Open_time'),visible:false, operate:false},
                        {field: 'close_time', title: __('Close_time'), visible:false,operate:false},
                        {field: 'address', title: __('Address')},
                        {field: 'lng', title: __('Lng'), visible:false,operate:false},
                        {field: 'lat', title: __('Lat'),visible:false, operate:false},
                        {field: 'status', title: __('Status'), visible:false, searchList: {"0":__('Status 0'),"1":__('Status 1'),"2":__('Status 2')}},
                        {field: 'status_text', title: __('Status'), operate:false},
                        {field: 'isactivity', title: __('Isactivity'), visible:false, searchList: {"0":__('Isactivity 0'),"1":__('Isactivity 1')}},
                        {field: 'isactivity_text', title: __('Isactivity'), operate:false},
                        {field: 'cityarea.address', title: __('Cityid'),operate: '=',formatter:Table.api.formatter.search},
                        {field: 'areaid', title: __('Areaid'),visible:false, operate:false/*,formatter:Table.api.formatter.search*/},
                        // {field: 'parentid', title: __('Parentid'), searchList: $.getJSON("office/parentidselect")},
                        {field: 'office_parent_name.shortname', title: __('Parentid'),operate:'='},
                        {field: 'admin.username', title: __('Edit_userid'), operate: '='},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'updatetime', title: __('Updatetime'), operate:'RANGE', addclass:'datetimerange', formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ],
                /*queryParams: function (params) {
                    console.log(params.filter);
                    params.filter = JSON.stringify({status: 2});
                    params.op = JSON.stringify({status: '<'});
                    return params;
                },*/
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
                // var code = $("#c-cityid").val();
                // var citypicker = $("#c-cityidname").data("citypicker");
                // var address = citypicker.getByDistrict('2103043');
                // alert(address);


                // var address = '浙江省/金华市/金东区';
                // $("#c-cityidname").attr("value",address);
                //所属城市
                $("#c-cityidname").on("cp:updated", function() {
                  var citypicker = $(this).data("citypicker");
                  var code = citypicker.getCode("district") || citypicker.getCode("city") || citypicker.getCode("province");
                  $("#c-cityid").val(code);
                });
                //所属区域
                $("#c-areaidname").on("cp:updated", function() {
                  var citypicker = $(this).data("citypicker");
                  var code = citypicker.getCode("district") || citypicker.getCode("city") || citypicker.getCode("province");
                  $("#c-areaid").val(code);
                });
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});