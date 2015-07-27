<?php 
$session_start=session_start();
include_once 'config.php';
include_once 'common_functions.php';
error_reporting(1);
?>
<!-- HTML Started -->
<html>
<head>
<link rel='stylesheet' type='text/css' href='CSS/BIS.css'/>
<link rel='stylesheet' type='text/css' href='CSS/Style.css'/>
<link rel='stylesheet' type='text/css' href='keyboard.css'/>
<script src="keyboard.js"></script>
<link href="CSS/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="CSS/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="CSS/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<style>    
body{
    overflow: auto;
    height:auto;
    background: radial-gradient(at 50% 50%, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 0%, rgb(246, 246, 246) 81%);
    //background:linear-gradient(slategray, #1e90ff, #6ca6cd, slateblue);
    font-family:inherit;
}
#BISBody {
    font-family:monospace;
    height:auto;!important;
    min-height:90%;
    /*margin-top:auto;*/
    
    background-color:#FEFCFF;!important;
}
#BISHeader {
    background-color:#FEFCFF;!important;
}
#BISFooter {
    background-color:#FEFCFF;!important;
    height:6%;
}
#menuhead {
    background-color:#B7B7B7;
    border: #000000;
    width:99%;
    height:30px;
    margin: 5px 5px 5px 7px;
}
.subMenu{
    width:49.3%;
    //height:4.5%;
    //margin: .7em .4em .6em .7em;
    margin-bottom: auto;
    margin-left: auto;
    margin-right: auto;
    margin-top: auto;
    background-color:#B7B7B7;
    //border-radius: 5px;
    border: #000000;
}
.Box{
    width:49.3%;
    height:auto;
    min-height:250px;
    
}
.Boxx{
    width:99%;
    height:auto;
    min-height:5%;
    align:centre;
}
#AmendmentBox{
    width: 99%;
    margin: 5px 5px 5px 7px; 
    
}
.text{
    color:#FEFCFF;
    font-family:"HelveticaNeue-Light", "Helvetica Neue", Helvetica, Arial, sans-serif;
    margin-left: 10px;
    //margin-top:-5px;
    //margin-bottom: 2px;
    padding-top: 7px;
    // padding: .1em .3em;
}
label {
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  border: none;
  font: normal 14px/1 "amaranth", Arial, sans-serif;
  color: #00900;
  text-align: center;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  padding-left: 2px;
}
select{
    height:26px;
    width:auto;
}
.CSSTableGenerator{
    border: #FFFFFF;
    box-shadow:none;
}
input[type=text]{
    height:26px;
    //width:30%;
}
.textbox{
    width:120px;
}
input[type=file]{
    margin-left:20px;
    //width:20%;
}
.datepicker{
    width:20%;!important;
}
.style16 {
	color: #FF0000;
	font-size: 18px;
}
#menu{
    width:100%;
    padding-top:7px;
    resize:none;
        
}
.CSSTableGenerator{
      box-shadow: none;
}
.circle
{
width:12px;
height:12px;
border-radius:50%;
font-size:9px;
color:#fff;
line-height:12px;
text-align:center;
background:#FF0000;
}
</style>
<script>
  $('#111').on('click', function() {
     window.location = $(this).val();
});
  </script>
<style type="text/css">
<!--
.style17 {color: #FF0000}
-->
</style>
</head>
<script src="Amendment.js" ></script>
<body>
<!-- Header Logo BIS Started -->
<div id='BISHeader'>
<table border=0 width=100% >
	 <tr>
             <td><img src='Images/opr.jpg' width=100% height='100'></td>
         <tr>
</table>
</div>
<?php  include_once 'menu_bar.php'; ?>
<!-- header ends -->
<!-- Main Body Started -->
<form method="post" action="department_upload_amd.01.php" enctype="multipart/form-data">
<div id='BISBody'><br>
    <center><h1> UPLOAD DOCUMENT </h1></center>
    <!-- Menu Bar Started -->
    <div id="menuhead"><h2 class="text">Select The Document You Want To Upload : <input style="margin-left:60px;" name="documentType" id="111" value="<?php echo "deptStdUpld.01.php";?>" onClick="window.location = 'deptStdUpld.01.php';" type="radio">&nbsp;&nbsp;Standards<input style="margin-left:60px;" name="documentType" id="112" type="radio" onClick="window.location = 'department_upload_amendments.php';" checked>
    &nbsp;&nbsp;Amendments </h2>
    </div>
    <!-- End of Menu Bar-->
    <!-- Sub menu Left Started -->
    <div class="subMenu" style="float:left; margin-left:7px; "><div class="text"><font size=4px;>Department Details</font></div></div>
    <!-- End of Left Sub menu -->
    <!-- Sub Menu Right Started -->
    <div class="subMenu" style="float:right;margin-right:7px;margin-bottom: 2px;"><div class="text"><font size=4px;>Amendments</font></div></div>
    <!-- End of Right Sub Menu -->
    <!-- Left Box Department Details Started -->
    <div class="Box" style="float:left; margin-left:7px; ">
       
        <table width="100%" >
            <tr height="28">
                <td width="50%" height="35"><label>Name of Technical Department : </label></td>
                <td width="50%"><label><?php if($_SESSION['EmployeeDepartment'])echo $_SESSION['EmployeeDepartment'];?></label>
                    <input type="hidden" name="techdepartment" value="<?php echo $_SESSION['EmployeeDepartment'];?>" >                </td>
            </tr>
            <tr height="28">
                <td bgcolor="#F3F3F3"><label>Select a Committee:<span class="style17">*</span></label></td>
                <td bgcolor="#F3F3F3">
                    <select name="CommitteeName" style="size:auto"  required onChange="loadStd(this.value);">
                        <option value='' >Select Technical Committee</option>
                        <?php //Fetching the Committee Name Respective to the Departments  
                        $result=mysqli_query($sql,"Select * from TechCommittees where DepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY CommitteeNumber ") ;
                        while($row1=mysqli_fetch_array($result)){ ?>
                        <option value='<?php echo $row1[ID];?>'><?php echo $_SESSION['EmployeeDepartment'].' '.$row1['CommitteeNumber'];?></option>			
                        <?php }?>
                    </select>
		    <input type="hidden" value="<?php echo $row1['CommitteeNumber']; ?>" name="TechComm">
                    <input type="hidden" value="<?php echo $_SESSION['EmployeeDepartmentID']; ?>" name="techdepartmentID">                </td>
            </tr>
            <tr height="25">
              <td ><label>Enter Document Number :</label><span class="style17">* </span></td>
                <td ><div id="alert"><input type="text" name="DocNo" required id="DocNo" maxlength="4" pattern="(^(000[1-9]|00[1-9][0-9]|0[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$)" OnChange="check_document_number(this.value);" size=5>
                <span class="style16">         <a href='#' data-tooltip="Enter number between 1-9999, eg: 1->0001; 99->0099, 999->0999" style="text-decoration:none;">(?)</a></span></div></td>
            </tr>
           
            <tr height="28">
              <td width="50%" bgcolor="#F3F3F3"><label>Select IS No &amp; Year</label>
                : <span class="style17">*</span></td>
                <td width="50%" bgcolor="#F3F3F3">
                    <select name="Standards" onChange="loadAmd(this.value);showAmendments(this.value);" id="Standards" >
                        <option value="">Select IS No </option>
                        <?php $result=mysqli_query($sql,"SELECT * FROM ISINDEX WHERE TECHCOMMITTEE LIKE '".$_SESSION['EmployeeDepartment']."%'") ;
                        while($row=mysqli_fetch_array($result)){?>
			<option value="<?php echo $row[ID];?>" id="<?php echo $row[ID];?>"><?php echo $row['DOCUMENTNUMBER'].' '.':'.''.$row['DOCUMENTYEAR']; ?></option> 
                        <?php } ?>
                    </select>                </td>
            </tr>
            <tr height="28">
              <td><label>Member Secretary : </label></td>
              <td><label>Under Development</label></td>
            </tr>
             <tr height="28">
               <td>Note : <span class="style17">[*]</span> Fields are required</td>
               <td>&nbsp;</td>
             </tr>
        </table>
    </div><!-- End of Left Box -->
    
    <!-- Right Main Box Amendments Started -->
    <div class="Box" style="float:right; margin-right:7px; ">
        <div id="Amendments">        
        <table class="CSSTableGenerator" cellspacing="0">
            <tr>
                <td>Sl.No</td>
                <td>Amendment No.</td>
                <td>Amendment Year</td>
            </tr>
            <tr>
                <td colspan="3"><center>No records to display.</center></td>
            </tr>
        </table>
        </div>
    </div><!-- End of Right Main Box -->
    
    <!-- Bottom Amendment box Started -->
    <div id="AmendmentBox">
        <div class="subMenu" style="float:left; margin-left:4px; "><div class="text"><font size=4px;>Amendment Details </font></div></div>
        <div class="subMenu" style="float:right; margin-right:5px; padding-left:5px; "><div class="text"><font size=4px;>Important Dates</font></div></div>
        <div class="Box" style="float:left; margin-left:5px;">
        <div id="LoadAmd"  style="float:left; margin-left:7px;width:100%; ">
        <table width="98%" cellspacing="0">
            <tr height="28">
                <td width="50%" height="35"><label>Amendment No. : </label></td>
                <td width="50%"><label></label></td>
            </tr>
            <tr height="28">
                <td bgcolor="#F3F3F3"><label>Title in English :</label></td>
                <td bgcolor="#F3F3F3"><input type="text"  name="TitleinEng" style="width:95%;"></td>
            </tr>
        </table>
        </div>
        <div id="LoadAmd2"  style="margin-left:7px;float:left;width:100%;">
        <table width="98%">
            <tr height="28">
              <td width="50%"><label>Title in Hindi :</label></td>
                <td ><script language="javascript">CreateCustomHindiTextBox("id 2","",37,false);
</script></td>
            </tr>
             <tr height="28">
                <td bgcolor="#F3F3F3"><label>Priority :</label></td>
                <td bgcolor="#F3F3F3"><input type="radio"  name="priority" value="1"><label>Priority I</label> &nbsp;&nbsp;<input type="radio" name="priority" value="2"><label>Priority II</label>&nbsp;&nbsp;<input type="radio" name="priority" value="3" checked><label>Priority III</label></td>
            </tr>
            <tr height="28">
                <td><label>Language : </label></td>
                <td><input checked="checked" name="Language" type="radio" value="E">
                <label> English</label>
                <input name="Language" type="radio" value="H">
                <label>Hindi </label>
                </td>
            </tr>
        </table>
    </div><!-- End of Left-->
   </div>
    <div class="Box" style="float:right; margin-left:5px; ">
        <table width="101%" >
            <tr height="28">
              <td width="40%" height="35"><label>Project Approval Date :  <span class="style17">*</span></label></td>
              <td width="60%"><input type="text"  id="pod" name="PADate" class="datepicker" required></td>
            </tr>
            <tr height="28">
                <td bgcolor="#F3F3F3" colspan="2"><input disabled type="checkbox" name="pwaver" id="pwaver" value=true>
                    <label><font color=blue><b>P-Draft Waiver</b></font></label></td>               
            </tr>
            <tr height="28">
                <td ><label>P-Draft Date :</label></td>
                <td ><input type="text"  id="pdraftdate" name="PDDate" class="datepicker" disabled><input type="file" name="pdf" id="pdf" disabled></td>
            </tr>
            <tr height="28">
                <td bgcolor="#F3F3F3" colspan="2"><input type="checkbox" name="wcwaver" id='wwaver'disabled>
                <label><font color=blue><b>WC-Draft Waiver</b></font></label></td> </td>
                <!--<td ><input type="text"  class="datepicker" id="wdraftdate" disabled><input type="checkbox" id='wwaver' style="margin-right:5px;" disabled><label>waver</label><input type="file" name="wdraftfile" id="wdf" style="margin-left:1px;"></td>-->
            </tr>
            <tr height="28">
                <td ><label>WC-Draft Date :</label></td>
                <td ><input type="text"  class="datepicker" id="wdraftdate" name="WCDate" disabled><input type="file" name="wdf" id="wdf" disabled></td>
            </tr>
            <tr height="25">
                <td  bgcolor="#F3F3F3" ><label>Time Duration (in days) :</label></td>
                <td  bgcolor="#F3F3F3">
                    <select name="duration" required>
                        <option>30</option>
                        <option>45</option>
                        <option>60</option>
                        <option>90</option>
                    </select>
                </td>
            </tr>   
             <tr height="28">
                <td bgcolor="#F3F3F3"><label>Finalization Date :</label></td>
                <td bgcolor="#F3F3F3"><input type="text"  name="finalDate" class="datepicker" id='finalizationdate' disabled></td>

            </tr>
            <tr height="28">
                <td ><label>Final Draft Date :</label></td>
                <td ><input type="text"  name="FDate" class="datepicker" id='fdraftdate' disabled ><input type="file" name="fdf" id="fdf" disabled></td>
            </tr>
      </table>
    </div><!-- End of Right-->
    
    
    <div class="Boxx" style="float:left; margin-left:7px; ">
        <center><input type="submit" value="Submit" class="btnn"><button class="btnn" onClick="location.reload();">Reset</button><button class="btnn" onClick="location.href = './'">Cancel</button></center>
    </div><!-- End of Left-->
    
    
    <!-- End of Right-->
<!--<div class="submenu">
    </div> --> 
    <!-- End of Amendment Box-->
</div><!-- BIS Body Ends Here ></div><!-- BIS Body Ends Here >
    </</div><!-- BIS -->
</form> 
    <!--<div class="Box" style="float:right;margin-right:7px;"><table><tr><td>dsd</td></tr></table></div>-->
<div id="BISFooter" style="padding-top:-15px;">
  <table border="0" width="100%" height=100% >
	<tr>
            <td width="100%" colspan="3" class="BottomRibbon"><p>Designed & Developed by ITSD, BIS, NEW DELHI</p></td>
        </tr>
    </table>
</div>
</body>
</html>
