function _ready() {
	onVisible("#install",function(p,t){
		if(!p){
			
		}
	})

}

function searching() {
	var keyword=get("s").value
	var e=keyword.split("")
	var m=get(".searching-panel")
	if(e.length>0){
		//search this word
		m.style.height="70%"
		setValue("#search_filter","Searching : "+keyword)
		connect("data/search.php?g="+keyword,"",false,myfunc)
	}else{
		m.style.height="0%"
	}
}


function myfunc(data) {
	if(data==""){
		setValue("#search_filter","Results not found")
		get(".games").innerHTML=""
	}else{
		
		var games=data.split(":")
		setValue("#search_filter",(games.length-1)+" results found")
		var i=0
		get(".games").innerHTML=""
		for(i=0;i<games.length-1;i++){
			var div=create("a")
			div.href="game/?gameid="+games[i].split(",")[0]
			div.title=games[i].split(",")[1]
			div.className="game-holder-search"
			var img=create("img")
			img.id="game-icon"
			img.src="img/game_"+games[i].split(",")[0]+"_icon.png"
			div.appendChild(img)
			get(".games").appendChild(div)
			//append this game to the UI
		}

	}
}

function rate_this_game(v1,v2) {
	var data={}
	data.gameid=v1
	data.gamerating=v2

	connect("../data/rate_this_game.php?data="+JSON.stringify(data),"",false,function(result){
		Toast(result)
	})
}

function show_preview(data_){

	scale(".image-preview",1)
	setImage("prv_image",data_)
}