<?php
//Session Started
$session_start=\session_start();
//establishing database connection
include_once("config.php");
include_once("common_functions.php");
include_once("check_session.php");
$dept=$_SESSION['EmployeeDepartment'];
?>
<!-- Html Started -->
<html>
<head>
<link rel='stylesheet' type='text/css' href='CSS/BIS.css'/>
<link href="CSS/menu.css" media="screen" rel="stylesheet" type="text/css" />
<!--<link href="CSS/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="CSS/dropdown/themes/flickr.com/default.ultimate.css" media="screen" rel="stylesheet" type="text/css" />-->
<link rel='stylesheet' type='text/css' href='CSS/bootstrap.min.css'/>
<link rel='stylesheet' type='text/css' href='CSS/crumb.css'/>
<!-- css for Table generator and body constraints -->
<style>
body{
    //overflow: auto;
    height:auto;
    //background:linear-gradient(slategray, #1e90ff, #6ca6cd, slateblue);
    background: radial-gradient(at 50% 50%, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 0%, rgb(246, 246, 246) 81%);  
    font-family: Times-New-Roman;
}
#BISBody{
   font-family:times-new-roman;
   height:auto;!important;
   min-height:74.5%;
   /*margin-top:auto;*/
   //overflow:scroll;
   background-color:#FFFFFF;
}
#BISHeader {
background-color:#FFFFFF;
}
#BISFooter {
background-color:#FFFFFF;
}
.CSSTableGenerator{
    width:90%;!important;
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
		height:35px;
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
    padding-top:0px;
    display: inline-block;  
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
</head>
<body>
<!-- BIS title -->
<?php include_once 'header.php'; ?>
<?php include_once 'menu_bar.php'; ?>
<div id="breadcrumb">
			<ul class="crumbs">
                            <li class="first"><a href="department_index.php" style="z-index:9;">Home</a></li>
                            <li><a href="#" style="z-index:8;">Manage</a></li> 
                            <li><a href="#" style="z-index:7;">Edit Standards</a></li>  
                                
			</ul>
    
</div>
 <center><h3> Edit Documents </h3></center>
<!-- End of BIS title -->
<div id='BISBody'>
   
<table border=0 width=100% >
            <tr>
                <td width="5%"><td><td width="0%"><label><b>Search By  :</b><td width="5%"></td>
                <td width="18%">
                    <form action="department_EditDelete_Stndrds.php" method="post">
                        <select name="CommitteeName" style="width:180px;" required onChange="this.form.submit();" class="form-control">
                        <option value='' >Technical Committee</option>
                        <?php //Fetching the Committee Name Respective to the Departments  
                        $result=mysqli_query($sql,"Select * from TechCommittees where DepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY CommitteeNumber ") ;
                        while($row1=mysqli_fetch_array($result)){ ?>
                        <option value='<?php echo $row1[ID];?>'><?php echo $_SESSION['EmployeeDepartment'].' '.$row1['CommitteeNumber'];?></option>			
                        <?php }?>
                    </select>
                    </form>
              </td>
                <td width="19%">
                <form action="department_EditDelete_Stndrds.php" method="post">
                <select name="StageName" class="form-control" style="width:180px;" required onChange="this.form.submit();">
                    <option id="0" value=""> Select Stage </option>
                    <option id="1" value="2"> Project Approval </option>
                    <option id="2" value="3"> P-Draft Stage </option>
                    <option id="3" value="4"> WC-Draft Stage </option>
                    <option id="4" value="5"> Finalization Stage </option>
                    <option id="5" value="6"> F-Draft Stage </option>
                </select>
                </form>
              </td>
                <td width="18%" >
                <form action="department_EditDelete_Stndrds.php" method="post">
                <select name="DocumentType"  class="form-control" style="width:180px;" required onChange="this.form.submit();">
                    <option id="0" value=""> Select Document Type </option>
                    <option id="1" value="1"> New Documents </option>
                    <option id="2" value="2"> Revised Documents </option>
                    <option id="3" value="3"> Amendments </option>
                    <option id="4" value="4"> Standards </option>
                </select>
                </form>
              </td>
                <td width="39%">
                <form name="form5" action='department_EditDelete_Stndrds.php' method="post">
                    <input type="text" id="tfq" class="tftextinput41 " style="width:180px;" name="SearchBy" size="8" maxlength="4" placeholder="Search Document / Enter four  digit number " title="Please enter four digit number only." pattern="(^(000[1-9]|00[1-9][0-9]|0[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$)" required  />
                    <input name="SearchByISNO" type="submit" class="tfbutton41" value="" />
                </form>
              </td>
            </tr>
</table>
<?php if($_GET['itemDelete']==ItemDeleted){
echo "<div align=center style:color=red;><font color=red size=5>Successfully Deleted</font></div>"; ?>
<meta http-equiv="Refresh" content="2; url='department_EditDelete_Stndrds.php'">
<?php } ?>
<!--<div align="right" style="margin-right:30px;"><form name="form5" action="department_EditDelete_Stndrds.php" method="post"><input type="text" id="tfq" class="tftextinput41" name="SearchBy" size="8" maxlength="4" placeholder="Search Document / Enter four  digit number " title="Please enter four digit number only." pattern="(^(000[1-9]|00[1-9][0-9]|0[1-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$)" required  />
<input name="SearchByISNO" type="submit" class="tfbutton41" value="" /></form>
</div>-->
<center>
<div class="CSSTableGenerator" >
<table width="100%" border="0" class="table-hover">
    <tr>
    	<td width="03%" align="center"  >Sl. No</td>
    	<td width="00%" align="center"  >Document Number</td>
	<td width="43%" align="center"  ><div align="center">Title</div></td>
	<td width="06%" align="center"  >Document<br/>
	  Type</td>
	<td width="05%" align="center"  >Priority </td>
   	<td width="000" align="center"  >Aspects</td>
	<td width="000" align="center"  >Date of Upload</td>
	<td width="000" align="center"  >Stage</td>
	<td width="12%" align="center"  >Action</td>
    </tr>

<?php
//pagination
############################################# Query to Fetch the All the Standards According to department ######################################################
$count=1;
//pagination
// How many adjacent pages should be shown on each side
$adjacents = 3;
//Get total number of Rows
 //total number of Rows

$targetpage="department_EditDelete_Stndrds.php"; //target page 

$startLimit = 0;
$displayRecords = 15; //total number of Records per page 
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
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo='".$_POST['SearchBy']."'");
} else if(isset($_POST['CommitteeName'])){
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%'"); 
} else if(isset($_POST['StageName'])){
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND StandardStatus  LIKE '%".$_POST['StageName']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
} else if(isset($_POST['DocumentType'])){
    
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
    if($_POST['DocumentType']=='1'){ 
    $result = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='N' ");
    }
    if($_POST['DocumentType']=='2'){ 
    $result = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='R'");
    }
    if($_POST['DocumentType']=='3'){ 
    $result = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='A'");
    }
    if($_POST['DocumentType']=='4'){ 
    $result = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType!='A'");
    } 
} else {
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY ModifiedOn Desc ");
}
/*
if($_POST){
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo='".$_POST['SearchBy']."'");
}
else
{
$result  = mysqli_query($sql,"select FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY ModifiedOn Desc");
}*/
$total = mysqli_num_rows($result);

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
        
//fetch records according to technical department

  
if(isset($_POST['SearchByISNO'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo='".$_POST['SearchBy']."'");
} else if(isset($_POST['CommitteeName'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%'"); 
} else if(isset($_POST['StageName'])){
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND StandardStatus  LIKE '%".$_POST['StageName']."%')");
//$sqlCount = mysqli_query($sql,"SELECT FOUND_ROWS() from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo LIKE '%".$_POST['SearchBy']."%') ");
} else if(isset($_POST['DocumentType'])){
    
//$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus BETWEEN 2 AND 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND DocNo  LIKE '%".$_POST['SearchBy']."%')");
    if($_POST['DocumentType']=='1'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='N' ");
    }
    if($_POST['DocumentType']=='2'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='R'");
    }
    if($_POST['DocumentType']=='3'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType='A'");
    }
    if($_POST['DocumentType']=='4'){ 
    $result = mysqli_query($sql,"SELECT * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND (TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' AND TechCommitteeID LIKE '%".$_POST['CommitteeName']."%') AND DocType!='A'");
    } 
} else {
$result  = mysqli_query($sql,"select * from StandardsFormulation WHERE (StandardStatus !='1' AND StandardStatus <= 6) AND TechnicalDepartmentID='".$_SESSION['EmployeeDepartmentID']."' ORDER BY ModifiedOn Desc limit $startLimit,$displayRecords");
}
$ResCount=mysqli_num_rows($result);//find number of value
if($ResCount==0){

echo "<tr><td colspan=9><font color=blue size=4px>No Records Found</font></td></tr>";

} else {
while($row = mysqli_fetch_array($result)){ //while loop starts
$comm=mysqli_query($sql,"select CommitteeNumber from TechCommittees WHERE ID='".$row['TechCommitteeID']."'");
$ResComm=mysqli_fetch_array($comm); //storing the assoc array
#****************************** End of Query ************************##
?>

    <tr>
	<td align="center" ><?php echo "$count" ?></td>
	<td width="10%"   style="text-decoration:none; text-align:center;"><?php  echo $dept.' '.$ResComm['CommitteeNumber'].' '.'('.str_pad($row['DocNo'], 4, '0', STR_PAD_LEFT).')'; ?></td>
	<td align="center" ><?php echo $row['DocTitle']; ?></td>
	<td align="center"  <?php if($row['DocType']=='A'){  ?> bgcolor="#BDECB6" <?php } ?>><?php if($row['DocType']=='N') { echo 'New';}  else if($row['DocType']=='R'){ echo 'Revision';} else { echo Amendment;} ?></td>
	<td align="center" ><?php echo $row['DocPriority']; ?></td>
	<td width="8%">
	<?php if($row['Category'] ==1 ){ ?>
	<font  color="#FF0000"><b><?php echo "Product Specification"; ?></b>
	<?php } if($row['Category'] ==2 ){ ?>
	<?php echo "Code of Practice"; ?>
	<?php } if($row['Category'] ==3 ){ ?>
	<?php echo "Methods of tests"; ?>
	<?php } if($row['Category'] ==4 ){ ?>
	<?php echo "Terminology"; ?>
	<?php } if($row['Category'] ==5 ){ ?>
	<?php echo "Dimensions"; ?>
	<?php } if($row['Category'] ==6 ){ ?>
	<?php echo "System Standards"; ?>
	<?php } if($row['Category'] ==7 ) { ?>
	<?php echo "Others"; ?>
	<?php } if($row['DocType']=='A'){ echo NA;} ?></td>
    	<td width="6%"  align="center" ><?php echo date("d-m-y",strtotime($row['MScriptUploadDate'])); ?> </td>
	<td width="7%"  align="center" >&nbsp;<?php echo getStatus($row['StandardStatus'],$sql);?> </td>
        <td align=center>&nbsp;&nbsp;<a href="<?php if($row['DocType']==A){ ?>department_edit_amendments.php?id=<?php echo $row['ID']; } else { ?>deptStndrsEdit.php?id=<?php echo $row['ID']; } ?>" target="_blank" onClick="return confirm('Are you sure you want to edit this item?');"><Button class="btn-success" value="Edit">&nbsp;&nbsp;Edit&nbsp;&nbsp;</Button></a>&nbsp;&nbsp;<a href="department_delete_stndrds.php?id=<?php echo $row['ID']; ?>" onClick="return confirm('Are you sure you want to delete this item?');"><Button class="btn-warning" value="Delete">Delete</Button></a></td>
    </tr>
<?php $count++; } } ?>
</table>
</div>
    <div align="center" style="margin-top: 16px;"><span><?=$pagination?></span></div>
</div>
</div>
</center>
<div id="BISFooter">
<table border="0" width="100%" height="100%">
    <tr>
        <td width="100%" colspan="3" class="BottomRibbon"><p>Designed & Developed by ITSD, BIS, NEW DELHI</p></td>
    </tr>
</table>
</div>
</body>
</html>


