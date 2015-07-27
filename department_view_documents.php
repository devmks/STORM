<?php 
$session_start = \session_start();
include_once("config.php"); //database connection 
include_once("check_session.php"); //check BIS employee 
include_once("common_functions.php");//funciton file
$dept=$_SESSION['EmployeeDepartment']; //get employee department 
?>
<!-- HTML Started -->
<html>
<head>
<script type='text/javascript' src='Javascript/UserReg.js'></script>
<link rel='stylesheet' type='text/css' href='CSS/BIS.css'/>
<link href="CSS/menu.css" media="screen" rel="stylesheet" type="text/css" />
<!--<link href="CSS/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="CSS/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />-->
<script type="text/javascript">
function show_alert(){
    var msg = "Waiting for Approval";
    alert(msg);
}
</script>
<script>
   function popitup(url) 
   {
    newwindow=window.open(url,'name','height=200,width=400,screenX=450,screenY=150');
    if (window.focus) {newwindow.focus()}
    return false;
   }
</script>
<style>    
body{
    height:auto;
    background:#FFF;
    //background: radial-gradient(at 50% 50%, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 0%, rgb(246, 246, 246) 81%);
}
#BISBody{
   font-family:times-new-roman;
   height:auto;!important;
   min-height:81%;
   /*margin-top:auto;*/
   //overflow:scroll;
   //background: radial-gradient(at 50% 50%, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 0%, rgb(246, 246, 246) 81%);
   background-color:#FFFFFF;
}
#BISHeader {
background-color:#FFFFFF;
}
#BISFooter {
background-color:#FFFFFF;
}
 
#tfheader{
		//background-color:none;
	}
	#tfnewsearch{
		float:right;
		padding:20px;
	}
	.tftextinput4{
		margin: 0;
		padding: 6px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
	}
	.tfbutton4 {
		margin: 0;
		padding: 0;
		width:30px;
		height:30px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		font-weight:bold;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
		background: #438db8 url('tf-search-icon.png');
	}
	/* Fixes submit button height problem in Firefox */
	.tfbutton4::-moz-focus-inner {
	  border: 0;
	}
	.tfclear{
		clear:both;
	}
.tfbutton41 {		margin: 0;
		padding: 0;
		width:30px;
		height:30px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		font-weight:bold;
		outline: none;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		color: #ffffff;
		border: solid 1px #0076a3; border-right:0px;
		border-top-right-radius: 5px 5px;
		border-bottom-right-radius: 5px 5px;
		background: #438db8 url('tf-search-icon.png');
		position:absolute;
}
.tftextinput41 {		margin: 0;
		padding: 6px 15px;
		font-family: Arial, Helvetica, sans-serif;
		font-size:14px;
		color:#666;
		border:1px solid #0076a3; border-right:0px;
		border-top-left-radius: 5px 5px;
		border-bottom-left-radius: 5px 5px;
}
div.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: #000099;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #000099;

	color: #000;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
#menu{
    width:100%;
    padding-top:-1px;
    margin-top:-5px;
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
<script type="text/javascript" src="js/css-pop.js"></script>
</head>
<body>
<!-- Header Started --->
<?php include_once 'header.php'; ?>
<?php include_once 'menu_bar.php'; ?>
<!--- End of Header ---->
<div id='BISBody'>
   <center><h2><?php $res=mysqli_query($sql,"Select * from TechnicalDepartments where ID='".$_SESSION['EmployeeDepartmentID']."'"); $resVal=mysqli_fetch_array($res); echo 'Standards Under Development';?>&nbsp;(<?php echo $_SESSION['EmployeeDepartment']; ?>)</h2></center>
	 <table border=0 width=100% >
            <tr>
                <td ></td>
                <td width=45%><form action="department_view_documents.php" method="post"><label><b>Search By :</b></label>
                
                <select name="CommitteeName" required onChange="this.form.submit();">
                        <option value='' >Technical Committee</option>
                        <?php //Fetching the Committee Name Respective to the Departments  
                        $result=mysqli_query($sql,"Select * from TechCommittees where DepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY CommitteeNumber ") ;
                        while($row1=mysqli_fetch_array($result)){ ?>
                        <option value='<?php echo $row1[ID];?>'><?php echo $_SESSION['EmployeeDepartment'].' '.$row1['CommitteeNumber'];?></option>			
                        <?php }?>
                </select>
                </form>
                </td>
                <td>
                <form action="department_view_documents.php" method="post">
                
                <select name="StageName" style="margin-left:-350px;" required onChange="this.form.submit();">
                    <option id="0" value=""> Select Stage </option>
                    <option id="1" value="2"> Project Approval </option>
                    <option id="2" value="3"> P-Draft Stage </option>
                    <option id="3" value="4"> WC-Draft Stage </option>
                    <option id="4" value="5"> Finalization Stage </option>
                    <option id="5" value="6"> F-Draft Stage </option>
                </select>
                </form></td>
                
                <td>
                <form action="department_view_documents.php" method="post">
                
                <select name="DocumentType"  style="margin-left:-220px;"  required onChange="this.form.submit();">
                    <option id="0" value=""> Select Document Type </option>
                    <option id="1" value="1"> New Documents </option>
                    <option id="2" value="2"> Revised Documents </option>
                    <option id="3" value="3"> Amendments </option>
                    <option id="4" value="4"> Standards </option>
                </select>
                </form></td>

         <td  height=100%><div align="right" style="margin-right:30px;"><form name="form5" action='department_view_documents.php' method="post"><input type="text" id="tfq" class="tftextinput41" name="SearchBy" size="8" maxlength="4" placeholder="Search Document / Enter four  digit number " title="Please enter four digit number only." pattern="(^(000[1-9]|00[1-9][0-9]|0[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$)" required  />
<input name="SearchByISNO" type="submit" class="tfbutton41" value="" /></form>
</div></td>
            </tr>
         </table>
<?php 
//Pagination 


// How many adjacent pages should be shown on each side
$adjacents = 3;
//Get total number of Rows
 //total number of Rows

$targetpage="department_view_documents.php"; //target page 

$startLimit = 0;
$displayRecords = 8; //total number of Records per page 
$count=1;
//Records  to show per page 
$page = $_GET['page'];
if(!empty($_GET['page']))
{
	$startLimit = ($_GET['page']-1)*$displayRecords; //total number of records 
        if($_GET['page']==1){ $count=1;} else { $count=(($_GET['page']-1)*$displayRecords)+1; } // get count for starting index
        
}
$limit=8;

if(isset($_POST['SearchByISNO'])){
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
}
else if(isset($_POST['CommitteeName'])){
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%')  ");
}
else if(isset($_POST['DocumentType'])){
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
    if($_POST['DocumentType']=='1'){ 
    $sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='N' ");
    }
    if($_POST['DocumentType']=='2'){ 
    $sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='R'");
    }
    if($_POST['DocumentType']=='3'){ 
    $sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='A'");
    }
    if($_POST['DocumentType']=='4'){ 
    $sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType!='A'");
    }
}else if(isset($_GET['tci'])){
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_GET['tci']."%')  ");
}
else 
{
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY ModifiedOn limit $startLimit, $displayRecords");
 $sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."'");
}
$total = mysqli_num_rows($sqlCount);

/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
		else
			$pagination.= "<span class=\"disabled\"><< previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) {
        $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
    } else {
        $pagination.= "<span class=\"disabled\">next >></span>";
    $pagination.= "</div>\n";		
    }  }
        ?>
    <!-- Table Header Started --->
<div class="CSSTableGenerator" >
<table width="100%" border="2" class="CSSTableGenerator">
  <tr>
    <td   rowspan="2" align="center" class="PromptFont" >Sl.<br> No</td>
    <td   rowspan="2" class="PromptFont" >Document Number</td>
    <td   rowspan="2" align="center" class="PromptFont" >Title</td>
    <td   rowspan="2" align="center" class="PromptFont" >Doc<br>Type</td>
    <td   rowspan="2" align="center" class="PromptFont" >Priority</td>
    <td   rowspan="2" align="center" class="PromptFont" >Aspects</td>
    <td   rowspan="2" align="center" class="PromptFont" >Remarks</td>
    <td   rowspan="2" align="center" class="PromptFont" >Stage</td>
    <td   colspan="5" align="center" class="PromptFont" >Staged With Date of Upload</td>
 </tr>
  <tr>
   <td width="07%" align="center" class="PromptFont" >Date of <br>
      Project Approval<br></td>
   <td width="07%" align="center" class="PromptFont" >P-Draft<br>
      Upload-Date<br></td>
   <td width="07%" align="center" class="PromptFont" >WC-Draft<br>
      Upload Date </td>
   <td width="07%" align="center" class="PromptFont" >Finalization<br>
      Upload Date </td>
   <td width="07%" align="center" class="PromptFont" >F-Draft<br>
      Upload Date </td>
 </tr>
<?php
if(isset($_POST['SearchByISNO'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
}
else if(isset($_POST['CommitteeName'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID  LIKE '%".$_POST['CommitteeName']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
}
else if(isset($_POST['StageName'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND StandardStatus  LIKE '%".$_POST['StageName']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
}
else if(isset($_POST['DocumentType'])){
    
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
    if($_POST['DocumentType']=='1'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='N' ");
    }
    if($_POST['DocumentType']=='2'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='R'");
    }
    if($_POST['DocumentType']=='3'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='A'");
    }
    if($_POST['DocumentType']=='4'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType!='A'");
    }
}else if(isset($_GET['tci'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID  LIKE '%".$_GET['tci']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
}
else 
{
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY ModifiedOn DESC limit $startLimit, $displayRecords");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."'");
}
//$total = mysqli_num_rows($sqlCount);
$ResCount=mysqli_num_rows($result);
if($ResCount==0){

echo "<tr><td colspan=13><center><font color=blue size=4px>No Records Found</font></center></td></tr>";

} else {
while($row = mysqli_fetch_array($result)){
$comm=mysqli_query($sql,"select CommitteeNumber from TechCommittees WHERE ID='".$row['TechCommitteeID']."'");
$ResComm=mysqli_fetch_array($comm);
$status=mysqli_query($sql,"SELECT * FROM Status Where Value='".$row['StandardStatus']."'");
$StaVal=mysqli_fetch_array($status);
$runQuery=mysqli_query($sql,"SELECT * FROM StandardsFormulation INNER JOIN StndrdsGazetteDetails ON StandardsFormulation.ID=StndrdsGazetteDetails.DocNo INNER JOIN StndrdsClassificationDetails ON StandardsFormulation.ID=StndrdsClassificationDetails.DocNo WHERE StandardsFormulation.ID='".$row['ID']."'");
$QueryRes=mysqli_fetch_array($runQuery);
?>
  <tr>
    <td  align="center" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><?php echo "$count" ?></td>
    <td  class="super_script" style="text-decoration:none; " <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><a <?php if($row['StandardStatus']==4){ if($row['WDraftStatus']==0) { ?> onClick="show_alert();" <?php } else { ?>href="redirect.php?id=<?php echo $row["ID"];?>"<?php } } else if($row['StandardStatus']==6){ if($row['FDraftStatus']==0) { ?> onClick="show_alert();" <?php } else { ?>href="redirect.php?id=<?php echo $row["ID"];?>"<?php } } else { ?>
href="redirect.php?id=<?php echo $row["ID"];?>" <?php } ?> target="_blank"  style="text-decoration:none;"><?php if($row['StandardStatus']==2) { echo $dept.' '.$ResComm['CommitteeNumber'].' '.'('.str_pad($row['DocNo'], 4, '0', STR_PAD_LEFT).')'; } else if($row['StandardStatus']==4) { echo $dept.' '.$ResComm['CommitteeNumber'].' '.'('.str_pad($row['DocNo'], 4, '0', STR_PAD_LEFT).')'; } else if($row['StandardStatus']==6) { echo $dept.' '.$ResComm['CommitteeNumber'].' '.'('.str_pad($row['DocNo'], 4, '0', STR_PAD_LEFT).')'; } else { echo $dept.' '.$ResComm['CommitteeNumber'].' '.'('.str_pad($row['DocNo'], 4, '0', STR_PAD_LEFT).')'; }  ?></a></td>
	<td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><span class="super_script"><?php echo preg_replace('/[^A-Za-z0-9\-]/',' ',$row['DocTitle']); ?></span></td>
        <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><span class="super_script"><?php if($row['DocType']=='N') { echo 'New';}  else if($row['DocType']=='R'){ echo 'Revision';} else { echo Amendment;} ?></span></td>
	<td align="center" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><center><?php echo $row['DocPriority']; ?></center></td>
	<td <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>
	<?php if($QueryRes['Aspect'] ==1 ){ ?>
	<span class=".super_script"><font  color="#FF0000"><b><?php echo "Product Specification"; ?></b></span>
	<?php } if($QueryRes['Aspect'] ==2 ){ ?>
	<span class="super_script"><?php echo "Code of Practice"; ?></span>
	<?php } if($QueryRes['Aspect'] ==3 ){ ?>
	<span class="super_script"><?php echo "Methods of tests"; ?></span>
	<?php } if($QueryRes['Aspect'] ==4 ){ ?>
	<span class="super_script"><?php echo "Terminology"; ?></span>
	<?php } if($QueryRes['Aspect'] ==5 ){ ?>
	<span class="super_script"><?php echo "Dimensions"; ?></span>
	<?php } if($QueryRes['Aspect'] ==6 ){ ?>
	<span class="super_script"><?php echo "System Standards"; ?></span>
	
	<?php } if($QueryRes['Aspect'] ==7 ) { ?>
	<span class="super_script"><?php echo "Others"; ?></span>
	
        <?php } if($row['DocType']=='A'){ echo NA;} ?>	</td>
    <td width="6%" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>&nbsp;<a href="#" onClick="return popitup('department_remarks.php?id=<?php echo $row["REMARKS"]; ?>')">View</a> </td>
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><span class="super_script"><?php echo getStatus($row['StandardStatus'],$sql); ?></span></td>    
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><span class="super_script"><?php if($QueryRes['ProjectApprovalDate']==NULL || $QueryRes['ProjectApprovalDate']=='0000-00-00'){ echo '<font color=red><strong>----</strong></font>'; } else { echo date("d-m-Y",strtotime($QueryRes['ProjectApprovalDate']));  } ?></span></td>
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>&nbsp;<span class="super_script"><?php if($QueryRes['PDraftDate']==NULL || $QueryRes['PDraftDate']=='0000-00-00'){ echo '<font color=red><strong>----</strong></font>'; } else { ?><a href="<?php if(!empty($row['PD_FOLDERNAME'])){ echo get_PDraft_file($row["ID"],$sql); } else { echo "#"; } ?>" <?php if(!empty($row['PD_FOLDERNAME'])){ echo "target=_blank";} ?> > <?php echo date("d-m-Y",strtotime($QueryRes['PDraftDate']));?></a>  <?php  } ?>
    </span></td>
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>&nbsp;<span class="super_script"><?php if($QueryRes['WCDraftDate']==NULL || $QueryRes['WCDraftDate']=='0000-00-00'){ echo '<font color=red><strong>----</strong></font>'; } else { if($row['WDraftStatus']==0){ echo '<font color=red><strong>Waiting For Approval</strong></font>';} else if($row['WDraftStatus']==1){ ?><a href="<?php if(!empty($row['WD_FOLDERNAME'])){echo get_WDraft_file($row["ID"],$sql); } ?>" <?php if(!empty($row['PD_FOLDERNAME'])){ echo "target=_blank";} ?>> <?php echo date("d-m-Y",strtotime($QueryRes['WCDraftDate'])); ?> </a> <?php } else { echo '<font color=red><strong>Rejected</strong></font>'; } }?>
	</span></td>
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>&nbsp;<span class="super_script"><?php if($QueryRes['FinalizationDate']==NULL || $QueryRes['FinalizationDate']=='0000-00-00'){ echo '<font color=red><strong>----</strong></font>'; } else { echo date("d-m-Y",strtotime($QueryRes['FinalizationDate']));  } ?>
    </span></td>
    <td align="center" class="super_script" <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>>&nbsp;<span class="super_script">&nbsp;<span class="super_script"><?php if($QueryRes['FinalDraftDate']==NULL || $QueryRes['FinalDraftDate']=='0000-00-00'){ echo '<font color=red><strong>----</strong></font>'; } else { if($QueryRes['FDraftStatus']==0){ echo '<font color=red><strong><center>Waiting For Approval</center></strong></font>';} else if($QueryRes['FDraftStatus']==1){ ?><a href="<?php echo  get_Fdraft_file($row["ID"],$sql); ?>" target="_blank"> <?php echo date("d-m-Y",strtotime($QueryRes['FinalDraftDate']));?></a> <?php } else { echo '<font color=red><strong><center>Rejected</center></strong></font>'; } }?>
	</span></td>
	</tr>
  
<?php $count++; } }?>
</table>
    <?php if(!($_POST['SearchByISNO'] || $_POST['DocumentType'] || $_POST['CommitteeName'] || $_POST['StageName'] || $_GET['tci'])){ ?><div align="center"><?=$pagination?></div> <?php } ?>
</div>
<!-- <table width="100%" border="0">
      <tr>
        <td><div align="center"><a href="department_index.php"><span class="style8"><button class="btnn">Back</button></span></div></a></td>
      </tr>
    </table>-->
</div>
    <div id="BISFooter">
      <table border="0" width="100%" height=100% >
	<tr>
            <td width="100%" colspan="3" class="BottomRibbon"><p>Designed & Developed by ITSD, BIS, NEW DELHI</p></td>
        </tr>
      </table>
    </div>
</body>
</html>
