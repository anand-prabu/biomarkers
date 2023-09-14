<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Biomarkers Search</title>
  <link rel="stylesheet" href="https://lhncbc.nlm.nih.gov/assets/uswds-2.4.0/css/uswds.min.css" />
  <link rel="stylesheet" href="https://lhncbc.nlm.nih.gov/assets/stylesheets/LHC_main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
 <link rel="stylesheet" href="https://lhncbc.nlm.nih.gov/ii/assets/stylesheets/II_main.css"> 
<style>
table, tr, td {
    border: none !important; 
    border-collapse: collapse !important;
}
</style>
</head>

<body>
  <div class="usa-overlay"></div>
  <header class="usa-header usa-header--extended insertheader">
  
  <div class="usa-nav-layout grid-row">
     <div class="usa-logo grid-col-10" id="extended-logo">

      <div class="header-logo" style="line-height:1rem;">
        <div class="display-flex flex-row flex-align-center">
            <div>
              <a href="https://www.nih.gov" alt="link to NIH homepage"><img src="https://lhncbc.nlm.nih.gov/assets/images/logo-NIH-block.png" alt="NIH logo chevron"></a>
            </div>    
            <div class="display-flex flex-column">
              <a href="https://www.nlm.nih.gov" alt="link to National Library of Medicine homepage">
                <img src="https://lhncbc.nlm.nih.gov/assets/images/logo-NLM-block.png" alt="portion of logo that reads National Library of Medicine">
              </a>
              <a href="https://lhncbc.nlm.nih.gov/index.html" alt="link to Lister Hill National Center for Biomedical Communications homepage">
                <img src="https://lhncbc.nlm.nih.gov/assets/images/logo-LHC-block.png" alt="portion of logo that reads Lister Hill National Center for Biomedical Communications">
              </a>
            </div>
        </div>

      </div>
    </div>
    <div class="LHC-menu grid-col-2 display-flex flex-row flex-justify-end flex-align-center">
      <button class="usa-menu-btn" aria-label="menu button"><i class="fas fa-bars fa-2x"></i></button>
    </div>
  </div>

  <nav aria-label="Primary navigation" class="usa-nav">
      <div class="usa-nav__inner">
        <button class="usa-nav__close"><img src="https://lhncbc.nlm.nih.gov/assets/images/close.svg" alt="close"></button>
        <div class="nav-container">
          <ul class="usa-nav__primary usa-accordion">

            <li class="usa-nav__primary-item">
              <a class="usa-nav__link" href="../index.html"><span class="subproject-navtitle">PubMed&nbsp;Search&nbsp;Tools&#58;</span></a>
            </li>

            <li class="usa-nav__primary-item">
              <button class="usa-accordion__button usa-nav__link" aria-expanded="false"
                aria-controls="extended-nav-section-one"><span>PubMed&nbsp;for&nbsp;Handhelds</span>
              </button>

              <ul id="extended-nav-section-one" class="usa-nav__submenu" hidden>
                <li class="usa-nav__submenu-item">
                <a class="usa-nav__link" href="../pico/index.php">PICO</a>
                </li>

                <li class="usa-nav__submenu-item">
                <a class="usa-nav__link" href="../ask/index.php">askMEDLINE</a>
                </li>

                <li class="usa-nav__submenu-item">
                <a class="usa-nav__link" href="../pico/consensus.php">Consensus&nbsp;Abstracts</a>
                </li>

                <li class="usa-nav__submenu-item">
                  <a class="usa-nav__link" href="../medline/index.php">MEDLINE/PubMed</a>
                </li>

              </ul>
            </li>

            <li class="usa-nav__primary-item">
              <a class="usa-nav__link" href="../ebm/index.php"><span class="subproject-navtitle">Evidence&nbsp;Based&nbsp;Medicine</span></a>
            </li>

            <li class="usa-nav__primary-item usa-current">
              <a class="usa-nav__link usa-current" href="../biomarkers/index.php"><span class="subproject-navtitle">Biomarkers</span></a>
            </li>

            <li class="usa-nav__primary-item">
              <a class="usa-nav__link" href="../babelmesh/index.php"><span class="subproject-navtitle">BabelMeSH</span></a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
</header>

  <div class="front_page">
    <div class="usa-layout padding-y-4">
      <div class="grid-row grid-gap">
  
        <div class="desktop:grid-col-9">
<p>BIOMARKERS</p>
<h2>Molecular Biopsy of Human Tumors</h2>
<h3>-	a resource for Precision Medicine<a href="/biomarkers/references.php" target=new> *</a></h3>
  
   
  
            <div class="grid-container pt-2 px-0">
              <div class="grid-row pt-2">

<div>

<?php
require "header.php";
require "xmlclass.php";
require "ForSum.php";
require "stopwords.php";
	
$homepage = '';
	
$readdata = $_SERVER["QUERY_STRING"];
parse_str($readdata);

if ($page =='') {
	$page = htmlentities($_POST['page']);
} else {
  $page = htmlentities($page);
}
  
if ( ($_POST["Oterm"]== '') &&  (( trim($_POST["intervention"]) != '') || ( trim($_POST["sideeffect"]) != '')) ) {
	$term = trim($_POST["intervention"])." ".trim($_POST["sideeffect"]);
	$ooterm = $term;
}
?>
<script>
function showAbstract(ab, arrayid, pmid) {
    // Assign DIV
	abdiv1 = 'Ab_' + arrayid;
 	abdiv = 'AbLabel_' + arrayid;
	pro = 'pro_'+arrayid;
	hide = 'hide_'+arrayid;
	forms = 'form_' + arrayid;

    // Manipulate innerHTML
    if (document.getElementById(abdiv).innerHTML == '' || document.getElementById(abdiv).innerHTML == '<p>Loading Abstract...</p>') {
        document.getElementById(abdiv).innerHTML = '<p>Loading Abstract...</p>';
    }
		
    document.getElementById(abdiv).innerHTML = ab;

    // Manipulate display
    var x = document.getElementById(abdiv).style.display;
    var y;
    if (x == 'block') {
        y = 'none';
    } else if (x == 'none') {
        y = 'block';     
    }
    document.getElementById(abdiv).style.display = y;
}

function showTbl(ab, arrayid, pmid) {
    // Assign DIV
    abdiv1 = 'T_' + arrayid;
    abdiv = 'TLabel_' + arrayid;

    // Manipulate innerHTML
    if (document.getElementById(abdiv).innerHTML == '' || document.getElementById(abdiv).innerHTML == '<p>Loading Abstract...</p>') {
        document.getElementById(abdiv).innerHTML = '<p>Loading TBL...</p>';
    }
		
    document.getElementById(abdiv).innerHTML = ab;

    // Manipulate display
    var x = document.getElementById(abdiv).style.display;
    var y;
    if (x == 'block') {
        y = 'none';
    } else if (x == 'none') {
        y = 'block';     
    }
    document.getElementById(abdiv).style.display = y;
}
</script>

<?php
function searchQue($query) {

  global $Count, $QueryKey, $WebEnv,  $ncbi_key;
 
  $utils = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils";
  $esearch = "$utils/esearch.fcgi?" .
                "db=pubmed&usehistory=y&db=pubmed&tool=pmhh&email=pubmedhh@nlm.nih.gov&api_key=$ncbi_key".$query;				
  $esearch_result = file_get_contents($esearch);


  preg_match("|<Count>(.*?)</Count>|m",$esearch_result,$hcount);
  preg_match("|<QueryKey>(.*)</QueryKey>|m",$esearch_result,$hkey);
  preg_match("|<WebEnv>(.*)</WebEnv>|m",$esearch_result,$hweb);
  
  $Count    = $hcount[1];
  $QueryKey = $hkey[1];
  $WebEnv   = $hweb[1];
}

function display($begin) { 
  $utils = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils";
  $db    = "pubmed";
  $report = "abstract";

  global $Count, $QueryKey, $WebEnv, $page, $from, $logterm, $ooterm, $outid, $proj, $lang,  $stopwords,  $ncbi_key;
	global $max_id;
	$max_id = array();
	
  $retstart = 0;
  if (($Count == "")||($Count==0))
    {
	  $Count = 0;
	  $key = date("G")*7 + date("z")*111;
	  echo "No results ";

	  return;
  }

  print "$Count results: <hr>";

  $efetch = "$utils/efetch.fcgi?".
               "rettype=$report&retmode=xml&retstart=$begin&retmax=20&".
               "db=$db&query_key=$QueryKey&WebEnv=$WebEnv&tool=pmhh&email=pubmedhh@nlm.nih.gov&api_key=$ncbi_key";  

  $getxml = new parXML();
  $getxml->everything($efetch);
	
	$a = new summ();
	$a->sethowmany(1);
	$a->set_last_limit(2);
			
	for ($retstart = 0; $retstart < 20; $retstart++) {
	$au = $getxml->final[$retstart]["author"];
	$ti = $getxml->final[$retstart]["atitle"];
	$pd = $getxml->final[$retstart]["pdate"];
	$ab = $getxml->final[$retstart]["abtext"];
	$pmid = trim($getxml->final[$retstart]["pmid"]);
	$pinfo = $getxml->final[$retstart]["pinfo"];
	$ta = $getxml->final[$retstart]["jtitle"];
  
	$tbl = '';
	if ($ab != "") {		
			$b = $a->abTBL($ab);
			for($temp=0; $temp<sizeof($b); $temp++) {	        
					$tbl .= $b[$temp]." ";
			}
			unset($b);
	}	
	
  $index = $begin + $retstart + 1;

  if (($index == $Count) || ($Count == "0")) {
	  $retstart = $begin+20;
  }

  if ($proj == '') {
  $termarray = array();
  $termarray = explode(" ", str_replace( array('P(', 'I(','C(','O(',')', ' OR ', ' AND ', ', ', '/' ), " ", trim(urldecode($ooterm))));
  
  $titemp = $ti;  
  $tbltemp = $tbl;
  $abtemp= $ab;
  
  $ii = 0;
 
  
  for ($i=0; $i<sizeof($termarray); $i++) {
	$testterm = trim(strtolower($termarray[$i]));
	$newtemp = ' '.trim($titemp).' ';
	if ( (in_array(strtolower($testterm), $stopwords) == false) && ($testterm !='') && (strlen($testterm) > 2)  ) { // begin non-stop word
		
		if (($ii%5)==0) {
			$titemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#ffff66\">".strtolower($termarray[$i])."</B>", $newtemp);$tbltemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#ffff66\">".strtolower($termarray[$i])."</B>", " ".$tbltemp." ");
			$abtemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#ffff66\">".strtolower($termarray[$i])."</B>", " ".$abtemp." ");					
		}
		elseif (($ii%5)==1) {
			$titemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#00FF00\">".strtolower($termarray[$i])."</B>", $newtemp);
			$tbltemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#00FF00\">".strtolower($termarray[$i])."</B>", " ".$tbltemp." ");
			$abtemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#00FF00\">".strtolower($termarray[$i])."</B>", " ".$abtemp." ");
		}
		elseif (($ii%5)==2) {
			$titemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#3399FF\">".strtolower($termarray[$i])."</B>", $newtemp);
			$tbltemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#3399FF\">".strtolower($termarray[$i])."</B>", " ".$tbltemp." ");
			$abtemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#3399FF\">".strtolower($termarray[$i])."</B>", " ".$abtemp." ");
		}
		elseif (($ii%5)==3){
			$titemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#66CCFF\">".strtolower($termarray[$i])."</B>", $newtemp);
			$tbltemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#66CCFF\">".strtolower($termarray[$i])."</B>", " ".$tbltemp." ");
			$abtemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#66CCFF\">".strtolower($termarray[$i])."</B>", " ".$abtemp." ");
		}
		else {
			$titemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#CC9900\">".strtolower($termarray[$i])."</B>", $newtemp);
			$tbltemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#CC9900\">".strtolower($termarray[$i])."</B>", " ".$tbltemp." ");
			$abtemp = preg_replace('/'.$testterm.'/i', "<B style=\"color:black;background-color:#CC9900\">".strtolower($termarray[$i])."</B>", " ".$abtemp." ");
		}
		$ii++;
	} // end non-stop word
  }
	$titemp = trim($titemp);
	$tbl = trim($tbltemp);
	$ab = trim($abtemp);
	
	print "<p><li>$index. "."$titemp<br>";
} // end if proj == parhi
else {	
  print "<p><li>$index. "."$ti<br>";
}

	array_push($max_id, $pmid);

  if ($au!="") {
    print "$au<br>";
  }
  print "$ta; ";
  print "$pd; $pinfo. PubMed ID: $pmid<br>";
  if ($ab == "")
  {
	 	 print "[No Abstract]  &nbsp;&nbsp;";
  }
  else
  {
		if ($proj == "par") {
		   echo "[<a href=\"/app_abstract_useful.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>TBL</a>] ";
		   echo "[<a href=\"/app_abstract_full_useful.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>Abstract</a>] ";
		}
		elseif ($proj == "parhi") {	
			
		   $jurl_open = "/app_abstract_useful_hi.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm));
			 $jurl_open2 = "/app_abstract_full_useful_hi.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm));
		    echo "<span  style=\"cursor: pointer; cursor: hand; color:#0000FF;\" onClick=\"newPopup('$jurl_open');\">[<u>TBL</u>]</span> "; 
			echo "<span  style=\"cursor: pointer; cursor: hand; color:#0000FF;\" onClick=\"newPopup('$jurl_open2');\">[<u>Abstract</u>]</span> ";
		}
		
		else {
		  echo "[<a href=\"#\" style=\"text-decoration:none\" onclick=\"showTbl('".htmlentities(addslashes($tbl))."', '".$index."', '".$pmid."'); return false;\">";		
		echo "TBL</a>]</font> ";		
		echo "<font color=\"#3333CC\"><div id=\"T_".$index."\" style=\"display: none;\"></div></font>";
		echo "<font color=\"#3333CC\"><div id=\"TLabel_".$index."\" style=\"display: none;\"></div></font>";
		echo "[<a href=\"#\" style=\"text-decoration:none\" onclick=\"showAbstract('".htmlentities(addslashes($ab))."', '".$index."', '".$pmid."'); return false;\">";
		echo "Abstract</a>]</font>";
		
		echo "<font color=\"#3333CC\"><div id=\"Ab_".$index."\" style=\"display: none;\"></div></font>";
		echo "<font color=\"#3333CC\"><div id=\"AbLabel_".$index."\" style=\"display: none;\"></div></font>";
		}

  }
	if ($outid != '') {
			echo " [<a href=\"http://pubmedhh.nlm.nih.gov/fulltext.php?pmid=$pmid&outid=$outid\" target=new>Get Full Text</a>]";
	}
	else {
	  echo " [<a href=https://www.ncbi.nlm.nih.gov/entrez/eutils/elink.fcgi?cmd=prlinks&dbfrom=pubmed&id=$pmid&retmode=ref target=new>Full Text</a>]";
	}
  echo " [<a href=".$_SERVER['PHP_SELF']."?id=$pmid&mod=related&page=1&from=$from&outid=$outid&proj=$proj target=blank>Related</a>]&nbsp;&nbsp;";
	echo "<br>";

  print "</p>";
  }

  unset($a);	
  unset($getxml);  
} //end func display


function related($rid) {

  $utils = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils";
  $db     = "pubmed";
  $report = "abstract";
  global $ncbi_key;

  $elink = "$utils/elink.fcgi?" .
            "dbfrom=$db&id=$rid&cmd=neighbor&tool=pmhh&api_key=$ncbi_key&email=pubmedhh@nlm.nih.gov";
  $elink_result = file_get_contents($elink);

  $rest = $elink_result;
  $sbegin = strpos($rest,'<Id>');
	$end = strpos($rest,'</Id>',5);
	$rest =substr($rest,$end);
	$sbegin = strpos($rest,'<Id>');
  $i = 0;
  global $page, $from, $outid, $proj, $lang;
	global $max_id;
	$max_id = array();
	
  while (!($sbegin===false)) {	
	$end = strpos($rest,'</Id>',5);
	$len=$end-$sbegin-4;
	$tempID= substr($rest, ($sbegin + 4), $len);
	$IDs[$i] = $tempID;
	$rest =substr($rest,$end);
	$sbegin = strpos($rest,'<Id>');
	$i++;
  }

  $Count = $i-1;
 
  $Tpage=ceil($Count/20);

  if ($page > $Tpage) {
	$page = $Tpage;
  }
  if ($page <=0) {
	$page = 1;
  }

  print $Count." related articles for article (PubMed ID: ".$rid.")";
  print "<hr>";
	
  $begin = ($page-1)*20;
	$id = "";
  for ($j=$begin; $j<$begin+20; $j++) {
		$id .= $IDs[$j].",";
  }

  $efetch = "$utils/efetch.fcgi?" .
             "db=$db&id=$id&rettype=$report&retmode=xml&tool=pmhh&email=pubmedhh@nlm.nih.gov&api_key=$ncbi_key";
						 
 	$getxml = new parXML();
  $getxml->everything($efetch);
		
	$a = new summ();
	$a->sethowmany(1);
	$a->set_last_limit(2);

	for($j=0; $j<20; $j++) {
		$au = $getxml->final[$j]["author"];
	  $ti = $getxml->final[$j]["atitle"];
	  $pd = $getxml->final[$j]["pdate"];
	  $ab = $getxml->final[$j]["abtext"];
	  $pmid = trim($getxml->final[$j]["pmid"]);
	  $pinfo = $getxml->final[$j]["pinfo"];
	  $ta = $getxml->final[$j]["jtitle"];
		
    $index = $begin + $j+1;

    if (($index == $Count) || ($Count == "0"))
    {
		 	 $j = 20;
    }

    print "<p><li>$index. "."$ti<br>";
		array_push($max_id, $pmid);

    if ($au!="") {
      print "$au<br>";
    }
    print "$ta; ";
    print "$pd; $pinfo. PubMed ID: $pmid<br>";
    if ($ab == "")
    {
	print "[No Abstract]  &nbsp;&nbsp;";
    }
    else
    {
		  $tbl = '';
		  $b = $a->abTBL($ab);
			for($temp=0; $temp<sizeof($b); $temp++) {	        
					$tbl .= $b[$temp]." ";
			}
			unset($b);
		
		if ($proj == "par") {
		   echo "[<a href=\"/app_abstract_useful.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\" target=blank>TBL</a>] ";
		   echo "[<a href=\"/app_abstract_full_useful.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\" target=blank>Abstract</a>] ";
		}
		elseif ($proj == "nppar") {	
			echo "[<a href=\"/app_abstract_useful.php?id=$pmid&proj=$proj&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>TBL</a>] ";
		   echo "[<a href=\"/app_abstract_full_useful.php?id=$pmid&proj=$proj&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>Abstract</a>] ";

		}
		elseif ($proj == "parhi") {	
			$jurl_open = "/app_abstract_useful_hi.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm));
			$jurl_open2 = "/app_abstract_full_useful_hi.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm));
		    echo "<span  style=\"cursor: pointer; cursor: hand; color:#0000FF;\" onClick=\"newPopup('$jurl_open');\">[<u>TBL</u>]</span> "; 
			echo "<span  style=\"cursor: pointer; cursor: hand; color:#0000FF;\" onClick=\"newPopup('$jurl_open2');\">[<u>Abstract</u>]</span> ";

		}
		elseif ($proj == "crowd") {	
		   echo "[<a href=\"/abstract_useful_crowd.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>TBL</a>] ";
		   echo "[<a href=\"/abstract_full_useful_crowd.php?id=$pmid&lang=$lang&query=".urlencode(strtolower($logterm))."\" style=\"text-decoration:none\"  target=blank>Abstract</a>] ";
	
		}
		else {	
		echo "[<a href=\"#\" style=\"text-decoration:none\" onclick=\"showTbl('".addslashes($tbl)."', '".$pmid."', '".$pmid."'); return false;\">";
		echo "TBL</a>]</font> ";
		echo "<font color=\"#3333CC\"><div id=\"T_".$pmid."\" style=\"display: none;\"></div></font>";
		echo "<font color=\"#3333CC\"><div id=\"TLabel_".$pmid."\" style=\"display: none;\"></div></font>";
		echo "[<a href=\"#\" style=\"text-decoration:none\" onclick=\"showAbstract('".addslashes($ab)."', '".$pmid."', '".$pmid."'); return false;\">";
		echo "Abstract</a>]</font>";
		
		echo "<font color=\"#3333CC\"><div id=\"Ab_".$pmid."\" style=\"display: none;\"></div></font>";
		echo "<font color=\"#3333CC\"><div id=\"AbLabel_".$pmid."\" style=\"display: none;\"></div></font>";
		}
		
    }
		if ($outid != '') {
			echo " [<a href=\"http://pubmedhh.nlm.nih.gov/fulltext.php?pmid=$pmid&outid=$outid\" target=new>Get Full Text</a>]";
	  }
		else {
      echo "[<a href=https://www.ncbi.nlm.nih.gov/entrez/eutils/elink.fcgi?cmd=prlinks&dbfrom=pubmed&id=$pmid&retmode=ref target=new>Full Text</a>]";
		}
    echo " [<a href=".$_SERVER['PHP_SELF']."?id=$pmid&mod=related&page=1&outid=$outid&proj=$proj target=blank>Related</a>]&nbsp;&nbsp;";
    print "<br></p>";

  } 

  $pre=$page-1;
  $next=$page+1;

  unset($a);
  unset($getxml); 
 
  if ($page != 1) {
    print "[<a href=".$_SERVER['PHP_SELF']."?id=$rid&mod=related&page=$pre&proj=$proj>Previous</a>] ";
    if ($page != $Tpage) {
			 print "&nbsp;";
			 print " [<a href=".$_SERVER['PHP_SELF']."?id=$rid&mod=related&page=$next&proj=$proj>Next</a>]";
    }
  }

  if($page == 1)
  {
  	print " [<a href=".$_SERVER['PHP_SELF']."?id=$rid&mod=related&page=$next&proj=$proj>Next</a>]";
  }

  print "&nbsp;&nbsp;&nbsp;&nbsp;[<a href=\"index.php\">New Search</a>]";

  print "<FORM ACTION=".$_SERVER['PHP_SELF']."?id=$rid&mod=relpager&proj=$proj METHOD=POST>";
  print "<INPUT type=\"submit\" value=\"page\">\n";
  print "<input type=\"text\" name=\"page\" size=\"5\" value=\"$page\">\n";
  print " of $Tpage.\n";
  print "</form>";
	
} // end func related

if (($id != "") && (($mod == "related") || ($mod == "relpager"))) {	
  call_user_func('related',$id);
} else {

if ($submit != "Y") {
	if (( trim($_POST["intervention"]) != '') || ( trim($_POST["sideeffect"]) != ''))  {
		$content = "BIOMARKERS LOG: " . get_client_ip() ." - [".date("j/M/Y: G:i:s")."] ";
		$content .= "IRAEs --- ";
		$content .= "Intervention: ".$_POST["intervention"];
		$content .= ". Side effect: ".$_POST["sideeffect"];
		$content .= "\r\n";
    $stderr = fopen('php://stderr', 'w');
    fwrite($stderr, $content);
		$content = "";
	}
	$term = str_replace("{{", "(", $term);
	$term = str_replace("}}", ")", $term);
 	$string = "&term=".urlencode($term);
	
	print "Terms: ".$_POST["Oterm"]." = ".$ooterm."<br>";
 	call_user_func ('searchQue',$string);

 	$beg = 0;
 	call_user_func ('display',$beg);
 	$page = 1;
} // end first search

else {
  if ($submit == "Y") {
     $Tpage=ceil($Count/20);
     if ($page > $Tpage) {
		   $page = $Tpage;
     }
     if ($page <=0) {
		   $page = 1;
     }
     $beg = ($page-1) * 20;
     call_user_func ('display', $beg);
  }
} //end else -- more pages

print "<hr>";
$pre=$page-1;
$next=$page+1;

$Tpage=ceil($Count/20);

if (($page > 1) && ($page <= $Tpage)){
  print "[<a href=".$_SERVER['PHP_SELF']."?submit=Y&page=$pre&Count=$Count&QueryKey=$QueryKey&WebEnv=$WebEnv&proj=$proj>Previous</a>] ";
  if ($page < $Tpage) {
	print "  &nbsp;";
  	print " [<a href=".$_SERVER['PHP_SELF']."?submit=Y&page=$next&Count=$Count&QueryKey=$QueryKey&WebEnv=$WebEnv&proj=$proj>Next</a>]";
  }
}

if (($page == 1) && ($page < $Tpage)) {
  print " [<a href=".$_SERVER['PHP_SELF']."?submit=Y&page=$next&Count=$Count&QueryKey=$QueryKey&WebEnv=$WebEnv&proj=$proj>Next</a>]";
}

print "<p>";

echo "<FORM ACTION=".$_SERVER['PHP_SELF']."?submit=Y&mod=pager&Count=$Count&QueryKey=$QueryKey&WebEnv=$WebEnv&from=$from METHOD=POST>";
print "<INPUT type=\"submit\" value=\"page\">\n";

print "<input type=\"text\" name=\"page\" size=\"5\" value=\"$page\">\n";

print " of $Tpage.\n";
print "</form>";
}

?>
</div>

                </div>
              </div>

              
<div class="grid-container padding-top-4"></div>

</div>
          </div>
        </div>
      </div>

  <footer class="bg-primary text-white">
  <div class="container-fluid">
  <div class="container pt-5">
    <div class="row mt-3">
      <div class="col-md-3 col-sm-6 col-6">
        <p><a href="https://www.nlm.nih.gov/socialmedia/index.html" class="text-white">Connect with NLM</a></p>
        <ul class="list-inline social_media">
          <li class="list-inline-item"><a href="https://twitter.com/NLM_NIH"><img src="https://lhncbc.nlm.nih.gov/images/Twitter_W.svg" class="img-fluid" alt="Twitter"></a></li>
          <li class="list-inline-item"><a href="https://www.facebook.com/nationallibraryofmedicine"><img src="https://lhncbc.nlm.nih.gov/images/Facebook_W.svg" class="img-fluid" alt="Facebook"></a></li>
          <li class="list-inline-item"><a href="https://www.youtube.com/user/NLMNIH"><img src="https://lhncbc.nlm.nih.gov/images/YouTube_W.svg" class="img-fluid" alt="You Tube"></a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <p class="address_footer text-white"> National Library of Medicine <br>
          <a href="https://www.google.com/maps/place/8600+Rockville+Pike,+Bethesda,+MD+20894/@38.9959508,-77.101021,17z/data=!3m1!4b1!4m5!3m4!1s0x89b7c95e25765ddb:0x19156f88b27635b8!8m2!3d38.9959508!4d-77.0988323" class="text-white"> 8600 Rockville Pike <br>
          Bethesda, MD 20894 </a></p>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <p><a href="https://www.nlm.nih.gov/web_policies.html" class="text-white"> Web Policies </a><br>
          <a href="https://www.nih.gov/institutes-nih/nih-office-director/office-communications-public-liaison/freedom-information-act-office" class="text-white"> FOIA </a><br><a href="https://www.hhs.gov/vulnerability-disclosure-policy/index.html" class="text-white">HHS Vulnerability Disclosure</a></p>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <p><a class="supportLink text-white" href="//support.nlm.nih.gov?from="> NLM Support Center </a> <br>
          <a href="https://www.nlm.nih.gov/accessibility.html" class="text-white"> Accessibility </a><br>
          <a href="https://www.nlm.nih.gov/careers/careers.html" class="text-white"> Careers </a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <p class="mt-2 text-center"> <a class="text-white" href="//www.nlm.nih.gov/">NLM</a> | <a class="text-white" href="https://www.nih.gov/">NIH</a> | <a class="text-white" href="https://www.hhs.gov/">HHS</a> | <a class="text-white" href="https://www.usa.gov/">USA.gov</a></p>
      </div>
    </div>
  </div>
  </div>
  </footer>
<script src="https://www.nlm.nih.gov/scripts/jquery/jquery-latest.min.js"></script>
<script src="https://lhncbc.nlm.nih.gov/assets/javascript/popper-1.14.7.min.js"></script>
<script src="https://lhncbc.nlm.nih.gov/assets/uswds-2.4.0/js/uswds.min.js"></script>
<script src="https://lhncbc.nlm.nih.gov/assets/javascript/supportLink.js"></script>
<script src="https://www.nlm.nih.gov/core/nlm-notifyExternal/1.0/nlm-notifyExternal.min.js"></script>
</body>  
</html>
