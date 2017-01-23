/**
 * Created by ad on 2016/8/24.
 */

window.onload = function(){
    var code=document.getElementById('code');
    code.onclick = function(){
        this.src='code.php?tm='+Math.random();
    };
    var send = document.getElementsByName('message');
    for(var i= 0;i<send.length;i++){
        send[i].onclick= function(){
            windowOpen('message.php?username='+this.title,'message',360,360);
        }
    }
    var friend = document.getElementsByName('friend');
    for(var n= 0;n<send.length;n++){
        friend[n].onclick= function(){
            windowOpen('friend.php?username='+this.title,'friend',360,360);
        }
    }
    var flower = document.getElementsByName('flower');
    for(var m= 0;m<send.length;m++){
        flower[m].onclick= function(){
            windowOpen('flower.php?username='+this.title,'flower',360,360);
        }
    }

    //var ids =document.getElementsByTagName('input');
    //    for (var r=0;r<ids.length;r++) {
    //        ids[r].onclick= function(){
    //        windowOpen('flower_back.php?username='+this.title, 'flower', 360, 360);
    //    }
    //}
};
function windowOpen(url,name,height,width){
    var top = (screen.height - height)/2;
    var left = (screen.width - width)/2;
    window.open(url,name,"height="+height+",width="+width+",left="+left+",top="+top);
}
