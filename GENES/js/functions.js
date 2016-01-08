/**
 * 
 */

//var index= 0;
function verify(currentword){
	
	var children=$('#wordArea').children();
	var flag =0;
	for(var i=0;i<firstword.length;i++)
		{
		
		if(firstword[i].toUpperCase() == children[i].value)
			flag = 1;
	else 
		{
			flag =0;
			break;
		}
}
	return flag;
}

/*function buyLetter(firstword){
	console.log(firstword);
	$("#letterSelection").show();
	var letter='';
	
	document.addEventListener('keydown', function(event) {
	    if(event.keyCode==56)
	    	letter = moveRight();
	    if(event.keyCode ==57)
	    	{
	    	if(index == 1 || index == 0)
	    	{
	    		$($("#letterlist").children()[0]).css("color","black");
	    		index=27;
	    	}
	    	index--;
	    	$($("#letterlist").children()[index-1]).css("color","blue");
	    	$($("#letterlist").children()[index]).css("color","black");
	    	letter = $($("#letterlist").children()[index-1]).text();
	    	console.log(letter);
	    	}
	    if(event.keyCode == 27)
	    	{
	    		$($("#letterlist").children()[index-1]).css("color","black");
	    		$("#letterSelection").hide();
	    		index=0;
	    	}
	    if(event.keyCode == 65)
	    	{
	    	//$("#letterSelection").modal('close');
	    	var children=$('#wordArea').children();
	    	//var ip = 
	    	for(var i=0;i<firstword.length;i++)
	    		{
	    		console.log(letter,firstword[i]);
	    		if(firstword[i].toUpperCase() == letter.toUpperCase())
	    			{
	    			console.log(firstword[i]);
	    			children[i].value=letter;
	    			children[i].disabled =true;
	    			console.log(this.value,i);
	    			}
	    		
	    	    
	    		}
	    		$($("#letterlist").children()[index-1]).css("color","black");
	    		$("#letterSelection").hide();
	    		index=0;
	    		
	    	}
	    //else
	    	//alert("Use 8 to Scroll up and 9 to Scroll down\n use 1 to select the word");
	});
}

function moveRight(){
	if(index == 26)
	{
		$($("#letterlist").children()[25]).css("color","black");
		index=0;
		
	}
	index++;
	console.log(index);
	$($("#letterlist").children()[index-1]).css("color","blue");
	$($("#letterlist").children()[index-2]).css("color","black");
	var letter = $($("#letterlist").children()[index-1]).text();
	//index =0;
	console.log(letter);
	return letter;
	
}*/


