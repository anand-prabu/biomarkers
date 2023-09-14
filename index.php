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
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
  function onSubmit1(token) {
    document.getElementById("query1").submit();
  }
  function onSubmit2(token) {
    document.getElementById("query2").submit();
  }
</script>
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
<script>
function show(a) {
	abdiv = 'ty_' + a
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
require "header.php";
$major_types = array(
	"Bone cancer",
	"Brain cancer",
	"Breast cancer",
	"Cervical cancer",
	"Colorectal cancer",
	"Endocrine gland cancer",
	"Gastric cancer",
	"Germ cell tumor",
	"Head and neck cancer",
	"Kidney tumors",
	"Leukemia",		
	"Liver cancer",
	"Lung cancer",
	"Lymphoma",
	"Ovarian cancer",
	"Pancreatic cancer",
	"Prostate cancer",
	"Sarcomas",
	"Skin cancer",
	"Testicular cancer",
	"Thyroid cancer",
	"Uterine cancer"
	);
	$sub_types = array("Breast cancer" => array(	
									
									"Cribriform carcinoma",
									"Ductal carcinoma",
									"Lobular carcinoma",									
									"Medullary carcinoma",
									"Mucinous carcinoma",
									"Papillary carcinoma",
									"Tubular carcinoma",
									"Breast cancer in Males"
									),
						"Skin cancer" => array(
								"Intraocular Melanoma",
								"Melanoma",
								"Merkel Cell Carcinoma",								
								"Squamous Cell Carcinoma"),
						"Endocrine gland cancer" => array(
										"Adrenal cancer",
										"Neuroendocrine cancer",
										"Parathyroid cancer"),
						"Head and neck cancer" => array(
										"Laryngeal cancer",
										"Oropharyngeal cancer",
										"Salivary gland cancer"),
						"Lung cancer" => array("Non-Small Cell Lung Cancer",
										"Small Cell Lung Cancer"),	
						"Leukemia" => array("Acute Lymphoblastic Leukemia",
										"Acute Myeloid Leukemia",
										"Chronic Lymphocytic Leukemia",
										"Chronic Myelogenous Leukemia",
										"Chronic Myeloproliferative Neoplasms",
										"Hairy Cell Leukemia",
										"Myeloproliferative Neoplasm"),
						"Ovarian cancer" => array(
										"Ovarian epithelial cancer",
										"Ovarian germ cell tumor"),
						
						"Brain cancer" => array("Astrocytoma",
										
										"Ependymoma",
										"Glioblastoma multiforme",
										"Medulloblastoma",
										"Oligodendroglioma"),
						"Liver cancer" => array(
										
										"Cholangiocarcinoma",
										"Hepatocellular Cancer"),
										
						"Lymphoma" => array("Adult Hodgkin lymphoma",
										"Adult non-Hodgkin lymphoma",
										"Childhood Hodgkin lymphoma",
										"Childhood non-Hodgkin lymphoma",
										"CNS lymphoma",
										"Mycosis fungoides"),

						"Sarcomas" => array("Chondrosarcoma",
										"Ewing sarcoma",
										"Kaposi Sarcoma",
										"Rhabdomyosarcoma",
										"Soft Tissue Sarcoma"),
						"Thyroid cancer" => array(
										"Anaplastic thyroid cancer",
										"Follicular thyroid cancer",
										"Medullary thyroid cancer",
										"Papillary thyroid cancer"),
										
						"Testicular cancer" => array(
										"Choriocarcinoma",
										"Embryonal carcinoma",
										"Seminoma",
										"Teratoma"),

						"Germ cell tumor" => array(
										"Extragonadal Germ Cell Tumor",
										"Germ Cell Tumor",
										"Ovarian Germ Cell Tumor"),
						"Uterine cancer" => array(
										"Endometrial carcinoma",
										"Uterine sarcoma"),
										
						"Bone cancer" => array("Osteosarcoma",
										"Chondrosarcoma",
										"Ewing sarcoma"),

						"Kidney tumors" => array("Renal cell carcinoma",
										"Transitional cell carcinoma", 
										"Wilms tumor (Nephroblastoma)")

					);
				
?>

<div>
<p>		
		<b>Tumor Types:</b>
		<br>
		<font size=2>(click on "[subtypes]" for specific tumor subtypes)</font>
		<p>
    <ul>
<?php
		
		for ($i = 0; $i<sizeof($major_types); $i++) {
			$dis = 	$major_types[$i];	
			echo "<li><a href=\"topbio.php?term=".urlencode($dis)."\"  style=\"text-decoration:none\">$dis</a> ";
			
			if (array_key_exists($dis, $sub_types)) {
				echo "<a href=\"#\" style=\"text-decoration:none\" onclick=\"show(".$i."); return false;\">[subtype]</a>";
				echo "<font color=\"#3333CC\"><div id=\"ty_".$i."\" style=\"display: none;\">";
				
				for ($j=0; $j<sizeof($sub_types[$dis]); $j++) {
					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"topbio.php?term=".urlencode($dis)."&subty=".
					urlencode($sub_types[$dis][$j])."\"  style=\"text-decoration:none\">".$sub_types[$dis][$j]."</a><br>";
				}
				echo "</div></font>";
			}
			else {
				echo "<br>";
			}
		}
?>
</ul>
<p>


<form action="searchbio.php" name="query1" id="query1" method=post>
<b>Search for Tumor type and/or Biomarker and/or Intervention </b>(ex: nivolumab, anti-PDL1)<b> not on the list:</b><br>
		<table class="usa-table"><tr><td>
		&nbsp;&nbsp;&nbsp;Tumor type: </td><td><input type=text name=otherCancer></td><td></td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;and/or</td><td></td></tr>
		<tr><td>
		&nbsp;&nbsp;&nbsp;Biomarker(s): </td><td><input type=text name=otherBio></td><td><font size=2>use "," to combine multiple biomarkers</font></td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;and/or</td><td></td></tr>
		<tr><td>		
		&nbsp;&nbsp;&nbsp;Intervention: </td><td><input type=text name=intervention></td><td><font size=2>use "," to combine multiple interventions</font></td></td></tr>
		</table>
    <!-- <input type=submit name=submit value=Submit> -->
     <button class="g-recaptcha" 
        data-sitekey="<?php echo $recaptcha_sitekey ?>"
        data-callback='onSubmit1' 
        data-action='submit'>Submit</button>
		 &nbsp;&nbsp;<input type="reset" value="Clear"><br>
	</form>
<p>


<form action="search.php" name="query2" id="query2" method=post target=new>
<b>Search for Immune Related Adverse Events (IRAEs):</b><br>
		<table class="usa-table"><tr><td>
		&nbsp;&nbsp;&nbsp;Intervention: </td><td><input type=text name=intervention></td><td><font size=2>(ex: pembrolizumab)</font></td></tr>
		<tr><td>&nbsp;&nbsp;&nbsp;and</td><td></td></tr>
		<tr><td>
		&nbsp;&nbsp;&nbsp;Adverse event: </td><td><input type=text name=sideeffect></td><td><font size=2>(ex: myocarditis)</font></td></tr>
		</table>
    <!--            <input type=submit name=submit value=Submit> -->
     <button class="g-recaptcha" 
        data-sitekey="<?php echo $recaptcha_sitekey ?>"
        data-callback='onSubmit2' 
        data-action='submit'>Submit</button>
		&nbsp;&nbsp;<input type="reset" value="Clear"><br>
	</form>
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
