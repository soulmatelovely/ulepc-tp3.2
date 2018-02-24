/**
 * Created by moko1988 on 15/12/1.
 */
define([
    'backbone',
    'models/youleGame/add',
    'text!templets/youleGame/add.html',
    'uploadify',
    'utils/ueditorUtil'
], function(
    BackBone,
    Model,
    Tpl
) {
    var view = Backbone.View.extend({
        el: '#CONTENT',
        events: {
            'click [role=seve]': 'saveFun', //保存
            'click [role=jump2list]': 'jump2list'//返回列表
        },
        /*初始化*/
        initialize: function() {


            $(this.el).html(Tpl);
            $(this.el).off();

            $('#cc').html(Tpl);

            this.rander();
            this.uploadifyMultiIni();

        },
        rander:function(){
            this.uploadifyIni();
             this.UMinit();
            // this.renderCategory();
        },
        UMinit:function(){
            var style = '<link href="'+ ROOT_PATH +'/Public/admin/js/libs/umeditor1_2_2-utf8-php/themes/default/css/umeditor.min.css" type="text/css" rel="stylesheet">';
            $(this.el).append(style);
            try {UM.getEditor('content').destroy();UM.getEditor('content');}catch (e){console.log(e);}
        },
        /*保存*/
        saveFun: function() {
            var _this = this,
                $form = $('#myform'),
                subBtn = $('button[role=seve]'),
                isOK = this.checkForm();
            if (isOK) {
                subBtn.html('正在提交..').prop('disabled', true);
                Model.save({
                    type: 'post',
                    data: $form.serialize(),
                    success: function() {
                        subBtn.html('提 交').prop('disabled', false);
                        jAlert('提交成功', function() {
                            _this.jump2list();
                        })
                    }
                })
            }
        },
        /*验证*/
         checkForm: function() {
            var $form = $('#myform'),
                $name = $form.find('input[name=name]'),
                $apkname = $form.find('input[name=apkname]');
                $apk_size = $form.find('input[name=apk_size]');
                $people = $form.find('input[name=people]');
                $versioninfo = $form.find('input[name=versioninfo]');
                $developer = $form.find('input[name=developer]');

                $apptype1 = $form.find('input[name=apptype1]').is(':checked');
                $apptype2 = $form.find('input[name=apptype2]').is(':checked');
                $apptype3 = $form.find('input[name=apptype3]').is(':checked');
                $apptype4 = $form.find('input[name=apptype4]').is(':checked');
                
                $introduce = $form.find('textarea[name=introduce]');


                if(!($apptype1||$apptype2||$apptype3||$apptype4)){
                    jAlert('请至少选择一种类别！');
                return false;
                }

            if ($name.val() == '') {
                jAlert('请填写名称！');
                return false;
            }else if($apkname.val() == ''){
                jAlert('请填写包名！');
                return false;
            }else if($apk_size.val() == ''){
                jAlert('请填写包大小！');
                return false;
            }else if($people.val() == ''){
                jAlert('请填写下载量！');
                return false;
            }else if($versioninfo.val() == ''){
                jAlert('请填写版本！');
                return false;
            }else if($developer.val() == ''){
                jAlert('请填写开发者！');
                return false;
            }else if($introduce.val() == ''){
                jAlert('请填写简介！');
                return false;
            }else{
                return true;
            }
        },
         /*编辑图片回显*/
        imgEcho: function($target, val) {
         
            var $wrap = $target.parent('[role=upimg]'),
                $info = $wrap.find('.file-info'),
                $val = $wrap.find('.file-val');

            $target.val(val);
            $info.addClass('hide');
            $val.removeClass('hide').find('img').attr('src', 'http://shihai.oss-cn-beijing.aliyuncs.com/' + val);
            $wrap.find('.uploadify').css('z-index', -1);
        },

        /*初始化uploadify上传按钮*/
        uploadifyIni: function() {
            var _this = this;
            this.cateInfo = {
                0: {
                    width: 640,
                    height: 330
                }
            };
            $('input[role=file-upload]').each(function() {
                var $this = $(this),
                    $wrap = $this.parents('[role=upimg]'),
                    $fileCanvas = $wrap.find('.file-canvas'),
                    $info = $fileCanvas.find('.file-info'),
                    $loading = $fileCanvas.find('.file-loading'),
                    $val = $fileCanvas.find('.file-val'),   //获取包裹图片的div
                    $valapk = $fileCanvas.find('#file-valapk'),   //获取包裹apk的div
                    $input = $wrap.find('input.file-input'),
                    index = $('[role=upimg]').index($wrap),
                    cateInfo = _this.cateInfo[index];
                $loading.html(loading2);
                // $info.html(cateInfo.width + " × " + cateInfo.height);
                $(this).attr('id', 'file-upload-' + index);

                $this.uploadify({
                    height: 23,
                    width: 43,
                    removeTimeout: 1,
                    buttonText: '上传',
                    fileTypeExts: '*',
                    fileSizeLimit: '2048MB', //上传文件大小限制
                    multi: false, //是否可以上传多个文件
                     swf: '/Public/admin/images/uploadify.swf', //上传flash地址（注意路径）
                    uploader: adminPath + '/index/uploadfile', //上传数据处理文件Ajax（注意路径）
                    /*开始上传之前触发*/
                    onUploadStart: function() {
                        //动态传递额外的参数
                        // $this.uploadify("settings", "formData", {
                        //     width: cateInfo.width,
                        //     height: cateInfo.height
                        // });
                        $info.addClass('hide');
                        $loading.removeClass('hide');
                        $wrap.find('.uploadify').css('z-index', -1);
                    },
                    /*上传完成之后触发*/
                    onUploadSuccess: function(file, data, response) {
                        if (response) {
                            data = $.parseJSON(data);
                            if (data.code == 1) {
                                $input.val(data.filename);
                                $val.removeClass('hide');
                                $val.find('img').attr('src', 'http://shihai.oss-cn-beijing.aliyuncs.com/' + data.filename);
                                $valapk.find('img').attr('src', 'http://shihai.oss-cn-beijing.aliyuncs.com/' + '1F414152K94R.jpg');
                                // $valapk.find('span').html('上传成功!!!');
                                $loading.addClass('hide');
                            } else {
                                jAlert(data.msg, function() {
                                    $info.removeClass('hide');
                                    $loading.addClass('hide');
                                    $wrap.find('.uploadify').css('z-index', 1);
                                });
                            }
                        }
                    }
                })
                /*鼠标经过上传完的图片隐藏展示删除按钮*/
                $val.hover(function() {
                    $(this).find('i').show();
                }, function() {
                    $(this).find('i').hide();
                });
                /*鼠标经过上传面板隐藏展示上传按钮*/
                $fileCanvas.hover(function() {
                    $(this).find('.uploadify-button ').show();
                }, function() {
                    $(this).find('.uploadify-button ').hide();
                });
                /*点击删除图片按钮*/
                $val.find('i').click(function() {
                    _this.resetfileCanvas($wrap);
                });
            })

        },
        /*还原上传面板*/
        resetfileCanvas: function($wrap) {
            $wrap.find('input.file-input').val('');
            $wrap.find('.file-val').addClass('hide');
            $wrap.find('.file-info').removeClass('hide');
            $wrap.find('.uploadify').css('z-index', 1);
        },

        /*初始化uploadify上传按钮(多图上传)*/
        

        uploadifyMultiIni: function() {
            var _this = this;

            $('input[role=file-upload-multi]').each(function() {
                var $this = $(this),
                    $wrap = $this.parents('[role=multiimg]'),
                    $fileCanvas = $wrap.find('.multi-file-canvas'),
                    $info = $fileCanvas.find('.file-info'),
                    $fileWrap = $wrap.find('.multi-warp'),
                    index = $('[role=multiimg]').index($wrap);
                $(this).attr('id', 'file-upload-multi-' + index);

                $this.uploadify({
                    height: 23,
                    width: 90,
                    removeTimeout: 1,
                    buttonText: '上传(可多图)',
                    fileTypeExts: '*',
                    fileSizeLimit: '2048MB', //上传文件大小限制
                    multi: true, //是否可以上传多个文件
                    swf: '/Public/admin/images/uploadify.swf', //上传flash地址（注意路径）
                    uploader: adminPath + '/index/uploadfile', //上传数据处理文件Ajax（注意路径）
                    /*开始上传之前触发*/
                    onUploadStart: function() {

                        //动态传递额外的参数
                        // $info.addClass('hide');
                        // $loading.removeClass('hide');
                        // $wrap.find('.uploadify').css('z-index', -1);
                    },
                    /*上传完成之后触发*/
                    onUploadSuccess: function(file, data, response) {
                        if (response) {
                            data = $.parseJSON(data);
                            if (data.code == 1) {
                                var imgList = '<div  style="width:140px; height:90px" class="img-list">';
                                imgList += '<input role="img-list"  name="screenshot[]"  type="hidden" value="'+ data.filename +'">';
                                imgList += '<img  style="width:140px; height:90px" src="' + 'http://shihai.oss-cn-beijing.aliyuncs.com/'  + data.filename + '">';
                                imgList += '<i title="删除"></i>';
                                imgList += '</div>';
                                $fileWrap.append(imgList);

                            }
                        }
                    } 
                })
                /*鼠标经过上传完的图片隐藏展示删除按钮*/
                $('.multi-warp').on('mousemove', '.img-list', function(){
                    $(this).find('i').show();
                });
                $('.multi-warp').on('mouseout', '.img-list', function(){
                    $(this).find('i').hide();
                });
                /*鼠标经过上传面板隐藏展示上传按钮*/
                //$fileCanvas.hover(function() {
                //    $(this).find('.uploadify-button ').show();
                //}, function() {
                //    $(this).find('.uploadify-button ').hide();
                //});
                /*点击删除图片按钮*/
                $('.multi-warp').on('click','.img-list i', function(){
                    var $wrapone = $(this).parent();
                    $wrapone.remove();
                })
            })

        },
        /*还原上传面板*/
        resetfileCanvas: function($wrap) {
            $wrap.find('input.file-input').val('');
            $wrap.find('.file-val').addClass('hide');
            $wrap.find('.file-info').removeClass('hide');
            $wrap.find('.uploadify').css('z-index', 1);
        },

        jump2list:function(){
            window.location.hash = "view/youleGame-list";
        },

         index: function(arr){
            var no = null;
            $.each(arr,function(i,o){
                if($(o).prop('checked')){
                    no = i;
                }
            })
            return no;
        }
    })
    return view;
})