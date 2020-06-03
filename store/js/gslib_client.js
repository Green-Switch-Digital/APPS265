var GSVersion="v.1.2.2";
var GSState="running";
var GSRecentUpdate="22 January 2020";
var SHORT=1,MEDIUM=3,LONG=3

var loop=function(init,max,func_ion){
for(var i=init;i<=max;i++){
func_ion(i)
}
}

var css={
animations:"including animations",
buttons:"buttons",
menu:"data"
}

//the main method.
function get(id){
if(id.split("")[0]=="." || id.split("")[0]=="#"){

var ele=document.querySelector(id)
setProperties(ele)
return ele
}

var element=document.getElementById(id)
setProperties(element)
return element
}
//append element to child
function set(obj,child){
get(obj).appendChild(child)
}
function setAlpha(obj,v){
get(obj).style.opacity=v
}function setOpacity(obj,v){
get(obj).style.opacity=v
}

function getValue(id){
var element=document.getElementById(id).value
return element
}

function getText(id){
var element=document.getElementById(id).innerHTML
return element
}


function setTransition(obj,effect){
//make smooth transition with code, works 100%
get(obj).style.transition=effect+"ms"
get(obj).style.webkitTransition= effect+"ms"
}

var slide=function(obj,pixels,delay){
var ok=get(obj)
setTransition(obj,delay)
ok.style.width=pixels
}

var slideObj=function(obj,pixels,delay){
obj.style.transition=delay
obj.style.webkitTransition=delay+"ms"
obj.style.width=pixels
}

var slideExcept=function(pos,pnode,rate,delay){
for(var i=0;i<pnode.length;i++){
if(i==pos){continue}
else{
pnode[i].style.transition=delay+"ms"
pnode[i].style.width=rate
}
}
}

function scale(obj,effect){
  get(obj).style.transform="scaleX("+effect+")"
get(obj).style.webkitTransform="scaleX("+effect+")"

}

function setBg(obj,color,transition){
setTransition(obj,transition)
get(obj).style.backgroundColor=color
}

function printf(message){
document.write(message)
}

function fadeIn(obj,transition,func){
setTransition(obj,transition)
get(obj).style.opacity=1
setTimeout(transition,func)
}

function fadeOut(obj,transition,func){
setTransition(obj,transition)
get(obj).style.opacity=0
setTimeout(transition,func)
}

function setValue(obj,str){
get(obj).innerHTML=str
get(obj).value=str
} 

function show(obj){
get(obj).style.display="block"
}

function display(obj){
get(obj).style.display="block"
}

function setHeight(obj,value){
get(obj).style.height=value
}

function setWidth(obj,value){
get(obj).style.width=value
}

function hide(obj){
get(obj).style.display="none"
}

function destroy(obj){
get(obj).style.display="none"
}

function setImage(obj,loc){
get(obj).src=loc
}

function setBackgroundImage(obj,imgSrc){
get(obj).style.backgroundImage=imgSrc
}

function setX(obj,pos){
get(obj).style.transform="translateX("+pos+")"
get(obj).style.webkitTransform="translateX("+pos+")"
}


function marginLeft(obj,value){
get(obj).style.marginLeft=value
}

function marginRight(obj,value){
get(obj).style.marginRight=value
}

function marginTop(obj,value){
get(obj).style.marginTop=value
}

function paddingLeft(obj,value){
get(obj).style.paddingLeft=value
}

function paddingRight(obj,value){
get(obj).style.paddingRight=value
}

function paddingTop(obj,value){
get(obj).style.paddingTop=value
}

function delay(sec,func){
	
setTimeout(func(),1000*sec)
}

// function top(obj,value){
// try{
// get(obj).style.top=value
// }catch(er){}
// }

// function left(obj,value){
// try{
// get(obj).style.left=value
// }catch(er){

// }
// }

function ab(value){
if(value<0){
value=value*-1
}
return value
}

function randomInt(min,max){
var ra=Math.floor(Math.random()*max)+min
return ra
}

function random(min,max){
var ra=(Math.random()*max)+min
return ra
}

//this storage plugin was designed from kodi studio and ported to green switch
//all rights reserved


var Storage=function(){
//this is for cookie or local storage
this.write=function(dataKey,dataValue){
localStorage.setItem(dataKey, dataValue)
}//end fn
,
this.read=function(dataKey){
var dkey=localStorage.getItem(dataKey)
return dkey
},
this.writeCookie=function(dataKey,dataValue){
document.cookie=dataKey+"="+dataValue
},
this.readCookie=function(dataKey){
var cks=document.cookie

}
}

//this js library connects to any database server or java pages, written in js

function KMOConnect(value,loader) {
	try{show(loader)}catch(err){}
	var ajax = new XMLHttpRequest();
	var url=value;
	var responseData=""
	ajax.open("GET", url, false);
	
	ajax.onreadystatechange = function(){
		if (ajax.readyState==3) {
			//the document is processing the data and isnt ready for view
			responseData="connectando"
			try{show(loader)}catch(err){}
		}
		else if (ajax.readyState==0) {
			//alert("Connection not initialised")
			responseData="connection not started"
			
		}
		else if (ajax.readyState==1) {
			responseData="url error"
			try{show(loader)}catch(err){}
		}
		else if (ajax.readyState==2) {
			responseData="no connection data"
			try{show(loader)}catch(err){}
		}
		else if (ajax.readyState==4) {
			//creating post has been successfull
			if (ajax.status!=200) {
				responseData="no headers"
				try{show(loader)}catch(err){}
				}
			else{
				var data=ajax.responseText
				responseData=data
				try{show(loader)}catch(err){}
			}
		}

	};
	
	ajax.send(null)
	return responseData
}

function connect(link,loader,error_bool,func_){
var respond=""
var e=error_bool
try{
//script originality from kmoscript
respond=KMOConnect(link,loader)
try{hide(loader)}catch(err){}
}
catch(err){
respond="Bad Connection : "+err
try{hide(loader)}catch(err){}
}

if(respond=="no headers"){
if(e== true){
respond="<b style='color:red;width:100%;position:fixed;float:left;'>GS-could not locate the file [ "+link+" ]<br><ul>"+
"<li>try checking network</li>"+
"<li>check file name carefully</li>"+
"</ul> </b>"
}
else{
respond=""
}
}
func_(respond)
return respond
}



function create(otype){
var obj=document.createElement(otype)
setProperties(obj)
return obj
}

//will catch all errors and store them

var GSErrors=function(){
//catch errors and log them
this.logErrors=false,
//log panel is the div that displays the errors
this.logPanel="default_panel",
//array holding errors
this.errors=null,
//insert errors to errors
this.addError=function(err){
errors[errors.length]=err;
//appended at the end
},
this.showError=function(){
//show error on logPanel
}
}


var append=function(obj,elem){

}

//import method
var include=function(type){
if(type=="css.animations"){
var cssanimations="@keyframes gsstoprotate{from{transform:rotate(0deg);-webkit-transform:rotate(0deg);}to{transform:rotate(0deg);-webkit-transform:rotate(0deg);}} @keyframes gsrotate{from{transform:rotate(0deg);-webkit-transform:rotate(360deg);}to{transform:rotate(0deg);-webkit-transform:rotate(360deg);}}@-webkit-keyframes gsrotate{from{transform:rotate(0deg);-webkit-transform:rotate(0deg);}to{transform:rotate(0deg);-webkit-transform:rotate(360deg);}}@keyframes gsrotateinverse{from{transform:rotate(350deg);-webkit-transform:rotate(360deg);}to{transform:rotate(0deg);-webkit-transform:rotate(0deg);}}@-webkit-keyframes gsrotateinverse{from{transform:rotate(360deg);-webkit-transform:rotate(360deg);}to{transform:rotate(0deg);-webkit-transform:rotate(0deg);}}"

printf("<style>"+cssanimations+"</style>")

}
}


//library has loaded
window.onload=function(){
try{
_ready()
}catch(err){
//dismiss errors
try{
_main()
}catch(err){
//dismiss error 2
}
}
}

//custom loader, needs gslib.css
var GSLoader=function(){
this.lo,
this.bgColor="#ccc",
this.pointerColor="grey",
this.thickness="20",
this.width="100px"
this.setLoader=function(obj){
var oj=document.getElementById(obj)
this.lo=oj;
oj.style.width=this.width
oj.style.height=this.width
oj.style.border=this.thickness+"px dotted "+this.bgColor
oj.style.borderTop=this.thickness+"px solid "+this.pointerColor
oj.style.borderRadius="50%"
},
this.start=function(){
this.lo.style.animation="gsrotate 1s linear infinite"
this.lo.style.webkitAnimation="gsrotate 1s linear infinite"
},
this.startReverse=function(){
this.lo.style.animation="gsrotateinverse 1s linear infinite reverse"
this.lo.style.webkitAnimation="gsrotateinverse 1s linear infinite reverse"
},
this.update=function(){
this.ol.style.width=this.width
this.ol.style.height=this.width
this.ol.style.border=this.thickness+"px solid "+this.bgColor
this.ol.style.borderTop=this.thickness+"px solid "+this.pointerColor
this.ol.style.borderRadius="50%"
}
}

var createLoader=function(obj){
var id=obj.id;
var w=obj.width || "50px";
var t=obj.thickness || 5;
var bc=obj.bgColor || "white";
var pc=obj.pointerColor || "orange";
var style=obj.style || "solid";

var oj=get(id)
oj.style.width=w
oj.style.height=w
oj.style.border=t+"px "+style+" "+bc
oj.style.borderTop=t+"px "+style+" "+pc
oj.style.borderRadius="50%"

oj.style.animation="gsstoprotate 1s linear infinite"
oj.style.webkitAnimation="gsstoprotate 1s linear infinite"
}

var createEvent=function(obj,event,func){
var g=get(obj)
g.addEventListener(event,function(evt){
evt.preventDefault()
func(evt,g)
},true)
}


var Animate=function(obj){
this.changeBgColor=function(color){
setTransition(obj.id,"300")
obj.style.backgroundColor=color
},
this.hide=function(){
//hide stuff
}
}

var Animator=function(){
}

var onVisible=function(obj,func){
window.addEventListener("scroll",function(){
var element=get(obj)
var pos=element.getBoundingClientRect();
var h=pos.height
var c=pos.top
var mainHeight=window.screen.height
var pcn=(c/mainHeight)*100
//set("debug",c+" of "+mainHeight)
if(c<mainHeight && (c+h)>0){
func(true,pcn)
}
else{
func(false,pcn)
}
})
}


var createProgress=function(obj){
var id=obj.id;
var title=obj.title;
var subtitle=obj.subtitle;
var titleEnabled=obj.titleEnabled || false;
var bgColor=obj.bgColor || "#eee";
var progressColor=obj.progressColor || "#a50080";
var value=obj.value;
var maxValue=obj.max || 100;
var thickness=obj.thickness || 15;
var z=get(id);
setValue(id,"")
var canvas=create("canvas")
canvas.id="cid"
canvas.style.width="100%"
canvas.style.float="left"
canvas.style.backgroundColor=bgColor;
z.appendChild(canvas)
z.style.overflow="hidden"
if(titleEnabled){
var ty=document.createElement("h3")
ty.innerHTML=title
ty.style.width="100%"
ty.style.float="left"
ty.style.textAlign="left"
ty.style.backgroundColor="transparent"
z.appendChild(ty)
}

//setup the view and progressBars
var ctx= canvas.getContext("2d");
ctx.clearRect(0,0,canvas.width,canvas.height)

var total=Math.PI*2
var a=(value/maxValue)*total
ctx.beginPath();
ctx.arc(70,70,50,0,total)
ctx.strokeStyle="#eee"
ctx.lineWidth=thickness
ctx.stroke()
var vz=0;
//animate the progress
setTimeout(function(){
drawIt(ctx,progressColor,thickness,vz,a)
},24)


var h=obj
obj.update=function(){
var id=obj.id;
var bgColor=obj.bgColor || "#eee";
var progressColor=obj.progressColor || "#a50080";
var value=obj.value;
var maxValue=obj.max || 100;
var thickness=obj.thickness || 15;
var z=get(id);
setValue(id,"")
var canvas=create("canvas")
canvas.id="cid"
canvas.style.width="100%"
canvas.style.float="left"
canvas.style.backgroundColor=bgColor;
z.appendChild(canvas)


if(titleEnabled){
var ty=document.createElement("h3")
ty.innerHTML=title
ty.style.width="100%"
ty.style.backgroundColor="transparent"
z.appendChild(ty)
}

//setup the view and progressBars
var ctx= canvas.getContext("2d");
ctx.clearRect(0,0,canvas.width,canvas.height)

var total=Math.PI*2
var a=(value/maxValue)*total
ctx.beginPath();
ctx.arc(70,70,50,0,total)
ctx.strokeStyle="#eee"
ctx.lineWidth=thickness
ctx.stroke()



setTimeout(function(){

drawIt(ctx,progressColor,thickness,vz,a)
},24)

}

}

function drawIt(ctx,progressColor,thickness,vz,a){

ctx.beginPath();
ctx.arc(70+1,70,50,0,vz)
ctx.strokeStyle=progressColor
ctx.lineWidth=thickness+2
ctx.stroke()

if(vz<=a){
vz=vz+0.055
setTimeout(function(){
drawIt(ctx,progressColor,thickness,vz,a)
},24)
}
}

function setProperties(obj){
obj.setText=function(txt){
try{this.innerHTML=txt}catch(e){
this.value=txt
}
}

obj.set=function(obj){
	this.appendChild(obj)
}

obj.getChild=function(pos){
	return this.children[pos]
}

obj.getLastChild=function(){
	return this.children[this.children.length]
}

obj.animate=function(anim_name){
	this.style.animation=anim_name
	this.style.webkitAnimation=anim_name
}

obj.setColor=function(c){
this.style.color=c
}

obj.marginLeft=function (a) {
	this.style.marginLeft=a
}
obj.setBgColor=function(c){
this.style.backgroundColor=c
}

obj.hide=function(){
this.style.display="none"
}

obj.show=function(){
this.style.display="block"
}

obj.slide=function(a,d){
this.style.transition=d
this.style.webkitTransition=d
this.style.width=a
}

obj.getWidth=function(){
var wid=this.getBoundingClientRect.width || this.style.width
return wid
}

obj.getHeight=function(){
var wid=this.getBoundingClientRect.height || this.style.height
return wid
}

obj.fadeIn=function(){
this.style.transition="300ms"
this.style.webkitTransition="300ms"
this.style.opacity=1
}

obj.fadeOut=function(){
this.style.transition="300ms"
this.style.webkitTransition="300ms"
this.style.opacity=0
}

obj.setHeight=function(w){
this.style.height=w
}

obj.setText=function(s){
	try{
	this.innerHTML=s
	}catch(err){
		this.value=s
	}
}

}

function Toast(message,delay){
	var h3=document.createElement("h3")
	delay=delay || MEDIUM
	h3.style.position="fixed"
	h3.style.width="30%"
	h3.style.marginLeft="35%"
	h3.innerHTML=message
	h3.style.top="0"
	h3.style.backgroundColor="rgba(17,17,17,0.7)"
	h3.style.color="white"
	h3.style.textAlign="center"
	h3.style.fontSize="14px"
	h3.style.transition="300ms"
	h3.style.zIndex="1000"
	h3.style.webkitTransition="300ms"
	h3.style.padding="5px"
	h3.style.paddingTop="10px"
	h3.style.paddingBottom="10px"
	h3.style.opacity="0"
	h3.addEventListener("mouseenter",function(){
		h3.style.transform="scale(1.2)"
	})
	h3.addEventListener("mouseleave",function(){
		h3.style.transform="scale(1)"
				setTimeout(shh2,100)
	})
	h3.style.borderRadius="15px"
	h3.onclick=function() {
		h3.style.display="none"
	}
	document.children[0].appendChild(h3)
	// h3.style.opacity="1"
	setTimeout(shhh,100)

	function shhh(argument) {
		h3.style.opacity="1"
		h3.style.transition="600ms"
		h3.style.webkitTransition="600ms"
		setTimeout(shh2,delay*1000)
		
	}
	function shh2(argument) {
			h3.style.opacity="0"	
			setTimeout(shc,delay*1000)
		}

		function shc()
		{
			document.children[0].removeChild(h3)
		}
}

function Alert(message,t,other){
	var div=create("div")
	var o=other.split("-") || ""
	var stt=""
	if(o[0]=="#b"){
		stt="<button style=\"width:auto;margin-left:2px;background:#ccc;border:0px;padding-top:10px;padding-bottom:10px;float:left;\">"+o[1]+"</button>"
	}
	var title=t||"Alert"
	div.style.width="100%"
	div.style.height="100%"
	div.style.position="fixed"

	div.style.zIndex="100"
	div.style.backgroundColor="rgba(0,0,0,0.5)"
	var other="<div style=\"animation:motion 4s infinite;width:40%;border-radius:0px;overflow:hidden;float:left;margin-left:30%;margin-right:30%;margin-top:200px;height:200px;background:white;color:black;\">"+
		"<h3 style=\"width:100%;float:left;padding-top:10px;padding-bottom:10px;margin:0px;background:rgba(0,0,0,0.9);color:white;\">"+title+"</h3>"+
		"<b style=\"width:100%;float:left;\">"+message+"</b>"+
		""
	+"</div><button onclick=\"document.children[0].removeChild(this.parentNode)\" style=\"margin-left:30%;width:90px;background:#ccc;border:0px;padding-top:10px;padding-bottom:10px;float:left;\">Ok</button>"+
	stt
	div.innerHTML=other
	document.children[0].appendChild(div)
	
}


function addEvent(obj,event_type,func_) {
	get(obj).addEventListener(event_type,function(){
		func_(e)
	},true)
}	

function animate(obj,animation) {
	get(obj).style.animation=animation
	get(obj).style.webkitAnimation=animation
}

var SignaturePane=function(pane){
	this.gsPane=null;
	this.canvas=create("canvas")
	this.canvas.style.backgroundColor="#ccc"
	this.canvas.style.width="600px"
	this.canvas.style.height="400px"
	this.canvas.title="Drag or Touch to draw Signature"
	set(pane,this.canvas)
	this.init=function() {
		Toast("Signature Pane Iniialised")
		var ctx,flag=false,
		ctx=this.canvas.getContext("2d");
		width=this.canvas.width
		height=this.canvas.height

		this.canvas.addEventListener("mousemove",function(e){
			e.preventDefault()
			var pX=e.clientX
			var pY=e.clientY
			ctx.strokeStyle="black"
			ctx.fillRect(pX,pY,2,2)
			ctx.stroke()
			Toast("X "+pX+" Y "+pY+ "<br> "+ctx,0.5)
		},false)
	}
}