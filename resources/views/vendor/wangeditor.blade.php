<script src="/js/wangEditor.js"></script>
<script>
    var E = window.wangEditor;
    var editor = new E('#contents');
    editor.customConfig.uploadImgServer = '/uploads';
    editor.customConfig.uploadFileName = 'file'
    editor.customConfig.customAlert = function (info) {
        $.smallBox({
            title : "操作提示",
            content : "<i class='fa fa-clock-o'></i> <i>"+info+"</i>",
            color : "#C26565",
            iconSmall : "fa fa-check fa-2x fadeInRight animated",
            timeout : 3000
        });
    }
    editor.customConfig.onchange = function (html) {
        $("input[name=content]").val(html);
    }
    editor.customConfig.uploadImgMaxLength = 1
    editor.create()
</script>