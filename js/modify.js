/**
 * Created by ad on 2016/8/23.
 */
window.onload = function () {
    var code = document.getElementById('code');
    code.onclick = function () {
        this.src = 'code.php?tm=' + Math.random();
    };


    var fm = document.getElementsByTagName('form')[0];
    fm.onsubmit = function () {
        if (fm.username.value.length < 2 || fm.username.value.length > 20) {
            alert('用户名不得小于两位或大于20位！');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }
        if (/[<>'\"\/\\ ]/.test(fm.username.value)) {
            alert('注意：用户名不能含有特殊字符！');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }
        if (fm.password.value.length > 0) {
            if (fm.password.value.length < 6) {
                alert('密码不能小于6位！');
                fm.password.value = '';
                fm.password.focus();
                return false;
            }
        }

            if (!/^([\w-\.]{2,20})@([\w]{2,6})\.([\w\.]{2,10})$/.test(fm.email.value)) {
                alert('注意：邮箱格式不符合！');
                fm.email.value = '';
                fm.email.focus();
                return false;
            }
            if (fm.qq.value != '') {
                if (!/^[1-9][\d]{4,12}$/.test(fm.qq.value)) {
                    alert('注意：QQ格式不符合！');
                    fm.qq.value = '';
                    fm.qq.focus();
                    return false;
                }
            }
            if (fm.url.value != '') {
                if (!/^(http[s]?:\/\/)?[\w\.-]+\.[\w]+$/.test(fm.url.value)) {
                    alert('注意：网址格式不符合！');
                    fm.url.value = '';
                    fm.url.focus();
                    return false;
                }
            }
            if (fm.valid.value.length != 4) {
                alert('注意：验证码格式必须为4位！');
                fm.valid.value = '';
                fm.valid.focus();
                return false;
            }
        }
};

