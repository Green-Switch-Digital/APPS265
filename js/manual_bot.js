//Manual BOT
function getResp(message) {
	var command=message.split(" ")[0]
	var argument=message.split(" ")[1]

	if (command=="get"){
		//get games from database
		var game_db=connect("http://localhost:8080/Web/gamesmalawi/data/bot.php?c=get")
		return game_db
	}
	else if(command=="show"){
		var game_db=connect("http://localhost:8080/Web/gamesmalawi/data/bot.php?c=show&g="+argument)
		return game_db	
	}

	else if (command=="delete"){
		return "Sorry, only ADMIN are supposed to Delete games. <br>send 'login' to be an admin"
	}

	else if(command=="register"){
		var name=message.split(" ")[1]
		var company=message.split(" ")[2]


		return "Welcome "+name+" to games Malawi send upload to start uploading games"
	}

	else if(command=="upload"){
		return "<input type=\"file\" name=\"file\" action=\"\" method=\"POST\"/>"
	}

	else if(command=="hi" || command=="Hi" || command=="Hello" || command=="Hey"){
		return "Hello, my name is JamesBot, the games agent from Games Malawi Team. How may i help you?"
	}

}