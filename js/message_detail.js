/**
 * Created by ad on 2016/8/24.
 */
window.onload=function(){
    var del = document.getElementById('delete');
    var back = document.getElementById('back');
    del.onclick = function(){
        if (confirm('您确定要删除此条消息吗？')){
            location.href = '?action=delete&id='+this.name;
        }
    };
    back.onclick = function(){
            location.href = 'message_view.php';
    }
};