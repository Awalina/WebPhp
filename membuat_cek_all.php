<SCRIPT LANGUAGE="JavaScript">
<!-- 

<!-- Begin
function CheckAll(chk)
{
for (i = 0; i < chk.length; i++)
chk[i].checked = true ;
}

function UnCheckAll(chk)
{
for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
}
// End -->
</script>

<form name="myform" action="" method="post">
<b>Scripts for Web design and programming</b><br>
<input type="checkbox" name="check_list" value="1">ASP<br>
<input type="checkbox" name="check_list" value="2">PHP<br>
<input type="checkbox" name="check_list" value="3">JavaScript<br>
<input type="checkbox" name="check_list" value="4">HTML<br>
<input type="checkbox" name="check_list" value="5">MySQL<br>

<input type="button" name="Check_All" value="Check All"
onClick="CheckAll(document.myform.check_list)">
<input type="button" name="Un_CheckAll" value="Uncheck All"
onClick="UnCheckAll(document.myform.check_list)">