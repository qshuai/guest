/**
 * Created by ad on 2016/8/18.
 */
window.onload=function(){
    var faceimg=document.getElementById('faceimg');
    var code=document.getElementById('code');
    faceimg.onclick=function(){
        window.open('face.php','face','width=400,height=400,top=0,left=0,scrollbars=1');
    };
    code.onclick = function(){
            this.src='code.php?tm='+Math.random();
    };

    //这里必须要加一个[0],不然会出错，原因未明
    var fm = document.getElementsByTagName('form')[0];
    fm.onsubmit = function(){
        if (fm.username.value.length <2 || fm.username.value.length >20){
            alert('用户名不得小于两位或大于20位！');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }
        if (/[<>'\"\/\\ ]/.test(fm.username.value)){
            alert('注意：用户名不能含有特殊字符！');
            fm.username.value = '';
            fm.username.focus();
            return false;
        }
        if (fm.password.value.length < 6){
            alert('密码不能小于6位！');
            fm.password.value = '';
            fm.password.focus();
            return false;
        }
        if (fm.repassword.value != fm.password.value){
            alert('两次输入的密码不一致！');
            fm.repassword.value = '';
            fm.repassword.focus();
            return false;
        }
        if (fm.tip.value.length <2 || fm.tip.value.length >20){
            alert('注意：密码提示不能小于两位或者大于20位');
            fm.tip.value = '';
            fm.tip.focus();
            return false;
        }
        if (/[<>'\"\/\\ ]/.test(fm.tip.value)){
            alert('注意：密码提示不能含有特殊字符！');
            fm.tip.value = '';
            fm.tip.focus();
            return false;
        }
        if (fm.ans.value.length <2 || fm.ans.length >20){
            alert('注意：提示答案不能小于两位或者大于20位');
            fm.ans.value = '';
            fm.ans.focus();
            return false;
        }
        if (fm.ans.value == fm.tip.value){
            alert('密码提示和提示答案不能相同！');
            fm.ans.value = '';
            fm.ans.focus();
            return false;
        }
        if (!/^([\w-\.]{2,20})@([\w]{2,6})\.([\w\.]{2,10})$/.test(fm.email.value)){
            alert('注意：邮箱格式不符合！');
            fm.email.value = '';
            fm.email.focus();
            return false;
        }
        if (fm.qq.value != ''){
            if (!/^[1-9][\d]{4,12}$/.test(fm.qq.value)){
                alert('注意：QQ格式不符合！');
                fm.qq.value = '';
                fm.qq.focus();
                return false;
            }
        }
        if (fm.url.value != ''){
            if (!/^(http[s]?:\/\/)?[\w\.-]+\.[\w]+$/.test(fm.url.value)){
                alert('注意：网址格式不符合！');
                fm.url.value = '';
                fm.url.focus();
                return false;
            }
        }
        if (fm.valid.value.length !=4){
            alert('注意：验证码格式必须为4位！');
            fm.valid.value = '';
            fm.valid.focus();
            return false;
        }
    }
};

