/**
 * Created by ad on 2016/8/31.
 */
window.onload = function(){
    var pre = document.getElementById('left');
    var next = document.getElementById('right');
    var fm = document.getElementsByTagName('form')[0];
    pre.onclick = function(){
        fm.childNodes[1].value--;
        fm.submit();
    };
    next.onclick = function(){
        fm.childNodes[1].value++;
        fm.submit();
    }

};