<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Biomarkers</title>
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
   
  
            <div class="grid-container pt-2 px-0">
              <div class="grid-row pt-2">


<div>
<?php
require "header.php";

echo "<!-- Flush with 1024*256 spaces -->";

$readdata = $_SERVER["QUERY_STRING"];
parse_str($readdata);

$disease_array = array("breast cancer", "skin cancer", "lung cancer", "Leukemia", "colorectal cancer", "cervical cancer", 
"brain cancer", "liver cancer", "sarcomas", "thyroid cancer", "testicular cancer");
$disease = str_replace("+", " ", $term);

$dname = str_replace(" ", "_", $disease);

$file_name = dirname($_SERVER['SCRIPT_FILENAME'])."/bio_result/bio_".strtolower($dname).".txt";
$file_name2 = dirname($_SERVER['SCRIPT_FILENAME'])."/bio_result/biomaker_alias.txt";

if (trim($disease) != '') {
    $stderr = fopen('php://stderr', 'w');
		$content = "BIOMARKERS LOG: " . get_client_ip() ." - [".date("j/M/Y: G:i:s")."] ";
		$content .= "Main list: $disease ";
		if (!empty($subty) && trim($subty)) {
			$content .= " - ".$subty;
		} 
		$content .= "\r\n";
    fwrite($stderr, $content);
		$content = "";
}

if (file_exists($file_name)) {    
	$handle1 = fopen($file_name, "r");
} else {
	die("NO RESULT");
}

$word_array = array();
if (file_exists($file_name2)) {    
	$handle2 = fopen ($file_name2, "r");
	while (!feof($handle2)) {
		$buffer2 = fgets($handle2);
		$buffer2 = trim($buffer2);		
		$oneArray = explode("\t", $buffer2);
		if ($buffer2 != '' ) {
			for ($i=1; $i < sizeof($oneArray); $i++) {
				if ($oneArray[0] == $oneArray[$i] ) {
					$oneArray[$i] = '';
				}
			}
			array_push($word_array, $oneArray );			
		}	
	}
}

if (!empty($subty) && $subty !='') {
	echo "<p><b>Biomarkers for ".$disease.": $subty</b><p>";
	$disease = $subty;
} else {
	echo "<p><b>Biomarkers for ".$disease."</b><p>";
}

$index = 0;
$index_show = 0;

$string = "$disease AND human[mh] AND hasabstract";
while (!feof($handle1)) {
	$index++;
	$buffer = fgets($handle1);
	$buffer = trim($buffer);
	
	$part_string = '';
	$part_string0 = '';
	
	$alias = '';
	foreach ($word_array as $value) {
		if ($value[0] == $buffer) { 
			for($j=1; $j<sizeof($value); $j++){
				if (trim($value[$j]) != '') {
					$alias .= " ".$value[$j].", ";
					if ($part_string != '') {						
							$part_string .=  " OR \"".$value[$j]."\"[Title/Abstract]";
							$part_string0 .= ", ".$value[$j];						
					}
					else {						
							$part_string  = "\"".$value[$j]."\"[Title/Abstract]";
							$part_string0 .= $value[$j];						
					}					
				}
			}
		}
	}
	if ($part_string != '') {
		$string2 = urlencode($string." AND {{\"".$buffer."\"[Title/Abstract] OR $part_string }}");
		$part_string0 = urlencode("$disease AND ( $buffer, $part_string0)");
	} else {
		$string2 = urlencode($string." AND \"".$buffer."\"[Title/Abstract]");
		$part_string0 = urlencode("$disease AND $buffer");
	}
	$string3 = $string2.urlencode(" AND Clinical Outcome[Title/Abstract]");
	$string4 = $string2.urlencode(" AND Diagnosis[Title/Abstract]");
	$string5 = $string2.urlencode(" AND Prognosis[Title/Abstract]");
	$string6 = $string2.urlencode(" AND Staging[Title/Abstract]");
	$string7 = $string2.urlencode(" AND treatment[Title/Abstract]");
	
	if (!empty($subty) && trim($subty) != '') {
		$temp_string2 = str_replace("{{", "(", urldecode($string2));
		$temp_string2 = str_replace("}}", ")", $temp_string2);
	  call_user_func ('searchQue',"&term=".urlencode($temp_string2));
	  if (!(($Count == 0) || ($Count == '') ) ){
		  $index_show++;
		  echo "<b>".$index_show.".</b> <a href=search.php?ooterm=$part_string0&term=$string2 target=new>$buffer</a>  ";
		  echo "<br>";
		  echo "&nbsp;&nbsp;&nbsp;&nbsp;[<a href=search.php?ooterm=$part_string0".urlencode(" AND Clinical Outcome")."&term=$string3 target=new>Clinical Outcome</a>] ";
		  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Diagnosis")."&term=$string4 target=new>Diagnosis</a>] ";
		  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Prognosis")."&term=$string5 target=new>Prognosis</a>] ";
		  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Staging")."&term=$string6 target=new>Staging</a>] ";
		  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Treatment")."&term=$string7 target=new>Treatment</a>]<br>";
      echo str_repeat(' ',1024*256);
      ob_flush();
      flush();
	  }
	} else {
	  echo "<b>".$index.".</b> <a href=search.php?ooterm=$part_string0&term=$string2 target=new>$buffer</a>";
	  echo "<br>";
	  echo "&nbsp;&nbsp;&nbsp;&nbsp;[<a href=search.php?ooterm=$part_string0".urlencode(" AND Clinical Outcome")."&term=$string3 target=new>Clinical Outcome</a>] ";
	  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Diagnosis")."&term=$string4 target=new>Diagnosis</a>] ";
	  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Prognosis")."&term=$string5 target=new>Prognosis</a>] ";
	  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Staging")."&term=$string6 target=new>Staging</a>] ";
	  echo "[<a href=search.php?ooterm=$part_string0".urlencode(" AND Treatment")."&term=$string7 target=new>Treatment</a>]<br>";
	}
}
fclose($handle1);

function searchQue($query) {
  
  global $Count, $QueryKey, $WebEnv, $Id1st, $outid, $outlibs, $proj, $ncbi_key;
 
	$utils = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils";
	
  $esearch = "$utils/esearch.fcgi?" .
                "db=pubmed&retmax=1&usehistory=y&db=pubmed&tool=pmhh&api_key=$ncbi_key&email=pubmedhh@nlm.nih.gov".$query;
								
  $esearch_result = file_get_contents($esearch);

  preg_match("|<Count>(.*?)</Count>|m",$esearch_result,$hcount);
  preg_match("|<QueryKey>(.*)</QueryKey>|m",$esearch_result,$hkey);
  preg_match("|<WebEnv>(.*)</WebEnv>|m",$esearch_result,$hweb);
  preg_match("|<Id>(.*)</Id>|m",$esearch_result,$hid);

  $Count    = $hcount[1];
  $QueryKey = $hkey[1];
  $WebEnv   = $hweb[1];
	$Id1st   = $hid[1];
	
	if (($Count=="")||($Count==0)){
	  $Count = 0;
	}
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
