<html>

<header>

<body>


<%

 

Set dbConn   = Server.CreateObject ("ADODB.Connection")
Set objRec = Server.CreateObject ("ADODB.Recordset")  

dbConn.open "Driver={SQL Server}; Server=bamsql2; UID=Genes; PWD=Genes12; Database=Genes;"
'set rs = Server.CreateObject("ADODB.recordset")
'rs.Open "SELECT * FROM info", dbConn


  'response.write sql

'sql1 = "select * from game2"

sql1="insert INTO dbo.game2  values(1,12,13,CURRENT_TIMESTAMP)"


 ' on error resume next

'dbConn.Execute(sql1)
'objrec.open SQL1, dbconn, 3
'
'if not objrec.eof then


''	 name=objrec("name")
''	 rnum=objrec("rnumber")	 
	
	' objrec.movenext
'else

 '' Response.Write(" not updated")

'end if 
'response.write sql1
'sql1="insert INTO info (name,rnumber) VALUES ('vive','12')"
dbConn.Execute(sql1)
'sql1 = "select * from info"
'dbConn.Execute(sql1)
'objrec.open SQL1, dbconn, 3

'name=objrec("name")
'rnum=objrec("rnumber")	 
'Response.Write("updated record for "&rnum&"  "&name)
'do until rs.EOF
  'for each x in rs.Fields
    'Response.Write(x.name)
    'Response.Write(" = ")
   '' Response.Write(x.value & "<br>")
  'next
  'Response.Write("<br>")
 '' rs.MoveNext
'loop

'rs.close
'conn.close

%>

<strong> Thank You for your registration. You may close this window now. </strong>

</body>

</header>

</html>

