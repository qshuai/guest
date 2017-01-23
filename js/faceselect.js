window.onload=function() {
    var img=document.getElementsByTagName('img');
    for (i=0;i<img.length;i++){
        img[i].onclick=function(){
            select(this.alt);
        };
    }
};
function select(src) {
    opener.document.getElementById('faceimg').src=src;
    //下面的register为form的name；img为hidden的input的name
    opener.document.register.img.value=src;
}
