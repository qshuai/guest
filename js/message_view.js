/**
 * Created by ad on 2016/8/24.
 */
window.onload = function () {
    var sel =document.getElementById('select');
    var del =document.getElementById('delete');
    var check =document.getElementById('check');
    var user =document.getElementById('user');
    var ids =document.getElementsByTagName('input');
    if (sel.value = "全选"){
        sel.onclick = function () {
            for (var i=0;i<(ids.length - 2);i++){
                ids[i].checked = this.checked;
            }
        }
    }
    del.onclick = function() {
        confirm('您确定要删除这批消息吗?');
    };

        for (var n = 0; n < (ids.length - 2); n++) {
            if (ids[n].parentNode.previousSibling.innerHTML == '请求您通过') {
            ids[n].parentNode.previousSibling.onclick = function () {
                if (confirm('您是否同意添加 ' + this.title + ' 为好友')) {
                    location.href = '?action=query&id=' + this.previousSibling.title;
                }
            };
        }
    }
};