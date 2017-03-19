<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="utf-8" />
   <title>Week 4 Form</title>
</head>

 <body>
<script>
                        function show_history(event)
                        {
				word=event.target.value;
                		console.log(event.target.value);
                                var xmlHttpReg = null;
                                if(window.ActiveXObject)
                                {
                                        xmlHttpReg = new ActiveXObject("Microsoft.XMLHTTP");

                                }
                                else if(window.XMLHttpRequest)
                                {
                                        xmlHttpReg = new XMLHttpRequest();
                                }
                                if(xmlHttpReg != null)
                                {
                                        
                                        xmlHttpReg.open("get", "word2.php?word="+word, true);
                                        xmlHttpReg.send(null);
                                        xmlHttpReg.onreadystatechange = doResult;
                                }
				function doResult()
                                {
                                        if(xmlHttpReg.readyState==4)
                                        {
                                                if(xmlHttpReg.status==200)
                                                {
                                                       document.getElementById("words").innerHTML=xmlHttpReg.responseText;
                                                	console.log(xmlHttpReg.responseText);
						}
                                        }

                                }                       
                        }
                </script>
<form action="word.php" method="POST">
<p>Searching<input name="key_word" value="" oninput="show_history(event)" list="words"></p>
<datalist id="words">
</datalist>
<p>submit<input type="submit"></p>

</form>
 </body>
 </html>

