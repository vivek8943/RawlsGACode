
/**
 * 
 */



function getcurrentWord(wordList){
	
	if(wordList[0] != null)
		{
	var currentWord = wordList[0].split('');
	wordList.shift();
	return currentWord;
		}
	else 
		return 0;
}

function getLetterList(letterlist){
	var currentWordLetterList = new Array();
	for(var i =0; i< 26;i++)
	{
	currentWordLetterList[i]= letterlist[0];
	letterlist.shift();
	}
	return currentWordLetterList;
}


function fillWordArea(currentWord){
	
	$("#wordArea").empty();
	for(i=0;i<currentWord.length;i++)
	{
		if(currentWord[i] !=' ')
			{
			var html = "<input class='box' type='text' id='"+i+"' value='' size='20'/>"+" ";
			document.getElementById('wordArea').innerHTML +=html;
			}
		else 
			document.getElementById('wordArea').innerHTML +="<br><br>"
			
	}

}


$(document).ready(function() {
	var temp=0;

	$("#letterSelection").hide();
	$("#winNotice").hide();
	$("#loseNotice").hide();
	$("#buttons").show();
	var balance = 10;
	balance = +balance.toFixed(2);
	var id = new Array();
	var wordList= new Array();
	var letterlist = new Array();
	var currentWord =new Array();
	var currentWordLetterList = new Array();
	var subjectId;
	var currenttime;
	$("#balance").append("<h4> Current Balance : </h4>");
$.ajax({
		
		type:"POST",
		url:"WordGuessProcessordemo.php",
		data:"GetWordlist",
		datatype:"json",
		success:function(data){
			var allPropertyNames = Object.keys(data);	
			
			for (var i = 0 ; i< allPropertyNames.length; i++)
				{
				if(allPropertyNames[i] == "subjectID")
						{
							var name = allPropertyNames[i];
							subjectId = data[name];
							$("#SubjectId").append(" Subject Id : "+subjectId+" ");
							$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
						}
				else
					{
					var name = allPropertyNames[i];
					var value = data[name];
					wordList.push(value[1]);
					for (var j = 2 ; j < value.length;j++)
						letterlist.push(value[j]);
					}
				}
		}
	}) // end of Ajax call
	//var firstword= word[0].val();

	.done(function( data ) {
	if ( console && console.log ) {
	currentWord=getcurrentWord(wordList)
	console.log(letterlist);
	console.log(currentWord);
	fillWordArea(currentWord);
	console.log(letterlist.length);
	currentWordLetterList= getLetterList(letterlist);
	console.log(currentWordLetterList);
	console.log(letterlist.length);
	currenttime = (new Date()).getTime();
	}
	});

var click=0

document.addEventListener('keydown', function(event) {
	if(event.keyCode == 49 ){
		if( temp==0){
			click=click+1;
			$.ajax({
	        url: 'test.php',
	        type: 'POST',
	       //dataType: 'text',
	        data: {response:click,currentWord:currentWord},
	        success: function(response) {
	     
	           
	          },
	          error: function(xhr) {
	          	   
	            //Do Something to handle error
	        	  console.log('error')
	          }
	        
	        
		})
	
	var restime = (new Date()).getTime() - currenttime;
	
	
	
	console.log(currentWordLetterList);
	var letter = buyLetter(currentWordLetterList);
	balance = balance - 0.10;
	balance = +balance.toFixed(2);
	$("#balance").empty();
	$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
	$("#baughtLetters").append(letter + " ");
	console.log(currentWordLetterList);
	var children=$('#wordArea').children();
	for(var i=0;i<currentWord.length;i++)
	{
	console.log(letter,currentWord[i]);
	if(currentWord[i].toUpperCase() == letter.toUpperCase())
		{
		children[i].value=letter;
		children[i].disabled =true;
		}
	
	}
	var flag = wordCheck();
	if(flag == 0)
		{
		var verify = verifyWord(children,currentWord);
		if (verify ==0)
		{
		$("#letterSelection").hide();
		$("#baughtLetters").empty();
		balance = balance + 1;
		balance = +balance.toFixed(2);
		$("#balance").empty();
		$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
		temp=0;
		$("#buttons").show();
		
		$("#winNotice").show().fadeOut(4000);
		currentWord=getcurrentWord(wordList)
		console.log(currentWord);
		fillWordArea(currentWord);
		console.log(letterlist.length);
		currentWordLetterList= getLetterList(letterlist);
		console.log(currentWordLetterList);
		console.log(letterlist.length);
		}
		else 
		{
			$("#letterSelection").hide();
			$("#baughtLetters").empty();
			balance = balance - 0.50;
			balance = +balance.toFixed(2);
			$("#balance").empty();
			$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
			$("#loseNotice").show().fadeOut(4000);
			temp=0;
			$("#buttons").show();
			
			currentWord=getcurrentWord(wordList)
			console.log(currentWord);
			fillWordArea(currentWord);
			console.log(letterlist.length);
			currentWordLetterList= getLetterList(letterlist);
			console.log(currentWordLetterList);
			console.log(letterlist.length);
			}
		}
	}}
	
	///////////////////////////////////////////
	else if (event.keyCode== 50)

		{
		
	
		$("#buttons").hide();
			if(temp==0){
temp=1;
		var children=$('#wordArea').children();
		// var restime = (new Date()).getTime() - currentitme;
		// responseWriter(subjectId,"enterWordStart",restime);
		var id = setFocus(children);
		$("#letterSelection").show();
		var letter='';
		var index= 0;
		document.addEventListener('keydown', function(event) {
		    if(event.keyCode==50)
		    	{
		    	
		    	//var listItems = $("#letterlist");
		    	if(index == 26)
		    	{
		    		$($("#letterlist").children()[25]).css({"font-size":"23px"});
		    		index=0;
		    		
		    	}
		    	index++;
		    	
		    	$($("#letterlist").children()[index-1]).css({"font-size":"40px"});
		    	$($("#letterlist").children()[index-2]).css({"font-size":"23px"});
		    	letter = $($("#letterlist").children()[index-1]).text();
		    	//document.getElementById(letter).style.color="blue";
		    	console.log(letter);
		    	}
		    else if(event.keyCode ==49)
		    	{
		    	if(index == 1 || index == 0)
		    	{
		    		$($("#letterlist").children()[0]).css({"font-size":"23px"});
		    		index=27;
		    	}
		    	index--;
		    	$($("#letterlist").children()[index-1]).css({"font-size":"40px"});
		    	$($("#letterlist").children()[index]).css({"font-size":"23px"});
		    	letter = $($("#letterlist").children()[index-1]).text();
		    	console.log(letter);
		    	}
		    else if(event.keyCode == 27)
		    	{
		    		$($("#letterlist").children()[index-1]).css({"font-size":"23px"});
		    		$("#letterSelection").hide();
		    		index=0;
		    	}
		    else if(event.keyCode == 51)
		    	{
		    	// var restime = (new Date()).getTime() - currentitme;
		    	// responseWriter(subjectId,"EnteredLetter",restime);
		    			children[id].value=letter;
		    			children[id].style.borderColor = "#C8C8C8";
		    			var flag = wordCheck();
		    			if(flag == 0)
		    			{
		    				var verify = verifyWord(children,currentWord);
		    				if (verify ==0)
		    				{
		    				$("#letterSelection").hide();
		    				$("#baughtLetters").empty();
		    				balance = balance + 1;
		    				balance = +balance.toFixed(2);
		    				$("#balance").empty();
		    				$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
		    				temp=0;
		    				
		    				
		    				$("#winNotice").show().fadeOut(4000);
		    				$("#buttons").show();
		    				currentWord=getcurrentWord(wordList)
		    				console.log(currentWord);
		    				fillWordArea(currentWord);
		    				console.log(letterlist.length);
		    				currentWordLetterList= getLetterList(letterlist);
		    				console.log(currentWordLetterList);
		    				console.log(letterlist.length);
		    				}
		    				else 
		    				{
		    					$("#letterSelection").hide();
			    				$("#baughtLetters").empty();
			    				balance = balance - 0.50;
			    				balance = +balance.toFixed(2);
			    				$("#balance").empty();
			    				$("#balance").append("<h4> Current Balance : "+balance+" </h4>");
			    				$("#loseNotice").show().fadeOut(4000);
			    				temp=0;
			    				$("#buttons").show();
			    				currentWord=getcurrentWord(wordList)
			    				console.log(currentWord);
			    				fillWordArea(currentWord);
			    				console.log(letterlist.length);
			    				currentWordLetterList= getLetterList(letterlist);
			    				console.log(currentWordLetterList);
			    				console.log(letterlist.length);
			    				}
		    				
		    				
		    				
		    			}
		    			else
		    			id = setFocus(children);
		    		$($("#letterlist").children()[index-1]).css({"font-size":"23px"});
		    		
		    		index=1;
		    		
		    	}
		
		});
		}
}});
	
});

function buyLetter(currentWordLetterList) {
	var letter = currentWordLetterList[0];
	currentWordLetterList.shift();
    return letter;              // the function returns the product of p1 and p2
}

function wordCheck(){
	var flag =0;
	var children=$('#wordArea').children();
	for(i=0;i<children.length;i++)
		{
			console.log(children[i].value);
			if(children[i].value =="")
				{
				flag =1;
				break;
				}
		}
	return flag;
}
function verifyWord(children,currentWord){
	var flag = 0;
	for (i=0;i<children.length;i++)
		{
			console.log(children[i].value.toUpperCase());
			if(children[i].value.toUpperCase() != currentWord[i].toUpperCase())
				{
				flag = 1;
				break;
				}
		}
	return flag;
}
function setFocus(children)
{
		var id =0;
		
		for (i=0;i<children.length;i++)
			if(children[i].value=="")
				{
					id = i;
					console.log(children[id].style.borderColor);
					children[id].style.borderColor = "#FF0000";
					//children[id].disabled =true;
					break;
				}
		return id;
}



function responseWriter(SubjectId,response,time){
	console.log("res");
	$(document).ready(function() {
	$.ajax({
        url: "WordGuessPc",
        type: 'POST',
       dataType: 'text',
        data: {"SubjectId":SubjectId,"response":response,"responsetime":time},
        success: function (data) {
        	return 1;
        }
	})
	});
}