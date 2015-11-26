<html>

<header>

<body>


<%

 

  Set dbConn   = Server.CreateObject ("ADODB.Connection")

  dbConn.open "Driver={SQL Server}; Server=bamsql2; UID=Genes; PWD=Genes12; Database=Genes;"


  'response.write sql

sql1 = "select * from info"


 ' on error resume next

dbConn.Execute(sql1)

'if err<>0 then

 '' Response.Write("Not updated")

'else

 '' Response.Write("updated")

'end if 

dbConn.close

%>

<strong> Thank You for your registration. You may close this window now. </strong>

</body>

</header>

</html>

