/**
 * Created by ad on 2016/8/24.
 */
window.onload=function() {
    var code = document.getElementById('code');
    code.onclick = function () {
        this.src = 'code.php?tm=' + Math.random();
    };
    var fm = document.getElementsByTagName('form')[0];
    fm.onsubmit = function() {
        if (fm.content.value.length < 10 || fm.content.value.length > 200) {
            alert('消息内容必须大于10位小于200位！');
            fm.content.focus();
            return false;
        }
        if (fm.valid.value.length !=4){
            alert('注意：验证码格式必须为4位！');
            fm.valid.value = '';
            fm.valid.focus();
            return false;
        }
    }
};
