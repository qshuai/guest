/**
 * Created by ad on 2016/8/30.
 */
window.onload = function(){
   var type =document.getElementsByName('type');
   var pas =document.getElementById('pas');
   type[0].onclick = function(){
	   pas.style.display = 'none';
   }
   type[1].onclick = function(){
	   pas.style.display = 'block';
   }
}