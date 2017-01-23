/**
 * Created by ad on 2016/8/31.
 */
window.onload = function(){
    var input = document.getElementsByTagName('input');
    //alert(input[1]);
    for (var i=0;i<input.length;i++){
        if ((i)%3 == 0){
            input[i].onclick = function(){
                window.location.href = 'photo_modify.php?album='+this.name;
            }
        }
        if ((i)%3 == 1){
            input[i].onclick = function(){
                windowOpen( 'photo_add.php?album='+this.name,'photo_add',200,500);
            }
        }
        if ((i)%3 == 2){
            input[i].onclick = function(){
				if(confirm("你确定要删除此相册吗？")){
					window.location.href = 'photo.php?action=delete&album='+this.name;
				}
            }
        }
    }
};
function windowOpen(url,name,height,width){
    var top = (screen.height - height)/2;
    var left = (screen.width - width)/2;
    window.open(url,name,"height="+height+",width="+width+",left="+left+",top="+top);
}