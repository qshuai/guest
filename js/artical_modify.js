/**
 * Created by ad on 2016/8/29.
 */
window.onload = function(){
    var sel = document.getElementById('select');
    var opt = document.getElementsByTagName('option');
    //var index = select.selectedIndex;
    //var value = select.options[index].value;
    //alert(value);
    //alert(sel.title);
    //alert(opt[1].selected);
    for (var i=0;i<opt.length;i++){
        if (opt[i].value == sel.title){
                opt[i].selected = true;
        }
    }
    var code=document.getElementById('code');
    code.onclick = function(){
        this.src='code.php?tm='+Math.random();
    };
};
var editor;
KindEditor.ready(function(K) {
    editor = K.create('textarea[name="content"]', {
        allowFileManager : true
    });
});