/**
 * 
 */
function tableAddRow(id, word) {
    var rownum = getrows();
    var table = document.getElementById("wordlistTable");
    var row = table.insertRow(rownum);
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	cell1.innerHTML =id ;
	cell1.setAttribute('contentEditable', 'true');
	cell2.innerHTML = word ;
	cell2.setAttribute('contentEditable', 'true');
	cell3.innerHTML = "<button type=\"button\" id=\"delete\"> <span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"> </span></button>";
 
}

function getrows(){
	var rows = document.getElementById("wordlistTable").getElementsByTagName("tr").length;
	return rows;
}

$("#save").click(function(){
	//alert("saving");
	var table_id = new Array();
	$("#wordlistTable thead tr td:nth-child(1)").each(function(i){
	       table_id.push($(this).text());
	    });
	var table_word =new Array();
	$("#wordlistTable tr td:nth-child(2)").each(function(i){
	       table_word.push($(this).text());
	    });
	var index =0;
	var table = document.getElementById("wordlistTable");
	console.log(table_id[0],table_id[1]);
	console.log(table_word[0],table_word[1]);
	
	$.ajax({
		
		type:"POST",
		url:"Administration",
		datatype:"json",
		data:"save",
		success:function(data){
		for (var i =0 ;i < data.id.length;i++)
			tableAddRow(data.id[i],data.word[i]);
		}
	}); 
	
	
	
});



$( document ).ready(function() {
//console.log( "ready!" );
	//$('#wordlistTable').dataTable();
	
	
	
	
$("#getWordList").click(function(){
	$.ajax({
		
		type:"POST",
		url:"Administration",
		data:"GetWordlist",
		datatype:"json",
		success:function(data){
		for (var i =0 ;i < data.id.length;i++)
			tableAddRow(data.id[i],data.word[i]);
		}
	}); // end of Ajax call
 });      // Click on get Wordlist ends here

		$("#addRows").click(function(){
		    var word=prompt("Enter the Word to be added to list","");
		    if(word.length == 0)
			{
			alert("Please provide a word");
			word=prompt("Enter the Word to be added to list");
			}
		    if (word !=null){
		    	var rownum = getrows()-1;
		    	tableAddRow(getrows(),word);
		    	
		    	alert(word + "is added to the list at id = "+rownum );
		   }
		});
		
		$("#delete").click(function(){
			
			alert("Delete Initiated");
			
		});
	
		
		

}); // document.ready function ends here 
