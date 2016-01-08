/**
 * This is the JavaScript file to load initial WordList 
 * and for manipulate operations on the WordList 
 */



$( document ).ready(function() {
	
$.ajax({
		
		type:"POST",
		url:"Administration.php",
		data:"GetWordlist",
		datatype:"json",
		success:function(data){
			console.log(data);
			var allPropertyNames = Object.keys(data);
			for (var j=0; j<allPropertyNames.length; j++) {
			    var name = allPropertyNames[j];
			    var table = document.getElementById('wordlistTable');
	    		table.insertRow();
	    		var x = document.getElementById("wordlistTable").rows.length;
	    		console.log(x);
			    var value = data[name];
			    for (var i=0;i<value.length;i++)
			    	{
			    		var table = document.getElementById('wordlistTable');
			    		//console.log(name);
			    		var row = document.getElementById("wordlistTable").rows[j];
			    		//console.log(row);
			    		var col = row.insertCell(i);
			    		col.innerHTML = value[i];
			    		if(i > 0)
			    		col.contentEditable = "TRUE";
			    	}
			}
			

		}
	}); // end of Ajax call
      // Click on get Wordlist ends here

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
	var tbl = $('table#wordlistTable tr').map(function() {
		  return $(this).find('td').map(function() {
		    return $(this).text();
		  }).get();
		}).get();
	console.log(tbl);
	
/*	var table = document.getElementById("wordlistTable");
	var data = [];
	var headers=[];
	for (var i=0; i<table.rows[0].cells.length; i++) {
		 headers[i] = i;
		} 
	for (var i=0; i<table.rows.length; i++) {
		var tableRow = table.rows[i]; var rowData = {};
		for (var j=0; j<tableRow.cells.length; j++) {
		rowData[ headers[j] ] = tableRow.cells[j].innerHTML;
		} data.push(rowData);
		}
		console.log(JSON.stringify(data)); */
	
	$.ajax({
		
		type:"POST",
		url:"WordlistUpdate",
		datatype:"json",
		data: { 
		      loadProds: 1,
		      test: JSON.stringify(tbl) // look here!
		    },
		success:function(data){
			alert(data);
		}});
	}); 
	
	
	
});




