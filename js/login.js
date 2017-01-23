/**
 * Created by ad on 2016/8/22.
 */
window.onload=function() {
    var code = document.getElementById('code');
    code.onclick = function () {
        this.src = 'code.php?tm=' + Math.random();
    };
};