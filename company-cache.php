<?php
	libxml_disable_entity_loader(false);
	include "config/connection.php";
	$handle = opendir("cache/");
	$cache = 'cache/company-data.xml';
	$maxLimit = 3;
	$dom = new DOMDocument('1.0', 'utf-8');
	
	function goToServer(){
		include "config/connection.php";
		$GLOBALS["dom"]->load('cache/company-data.xml');
		$pElement = $GLOBALS["dom"]->getElementsByTagName('items');
		if (isset($_POST['query'])) {
			$out='';
			$query="SELECT * FROM company WHERE company_name LIKE '%".$_POST['query']."%'";
			$result  = mysqli_query($conn,$query);
			/*$out='<ul class = "list-unstyled">';*/
			if (mysqli_num_rows($result)>0) {
				# code...
				while ($row = mysqli_fetch_array($result)) {
					# code...
					$out.='<li>'.$row["company_name"].'</li>';

					foreach ($pElement as $pEle) {
						# code...
						if(checkExistence($row["company_name"])){
							$element = $GLOBALS["dom"]->createElement('companyName', $row["company_name"]);
							$pEle->appendChild($element);

							$GLOBALS["dom"]->save('cache/company-data.xml');
							$t_item = $GLOBALS["dom"]->getElementsByTagName('companyName');
							if ($t_item->length > $GLOBALS['maxLimit']) {
								# code...
								deleteOlder($t_item->length-$GLOBALS['maxLimit']);
							}
						}
						
					}
					
				}
			}
			else{
				$out.='<li>company Not Found</li>';
			}
			/*$dom->save('cache/company-data.xml');*/
			/*$out.='</ul>';*/
			return $out;
		}
	}

	function checkExistence($val){
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$cName = $dom->getElementsByTagName('companyName');
		foreach ($cName as $cN) {
			if ($cN->nodeValue==$val) {
			    return false;
			}
			
		}
		return true;
	}

	function deleteOlder($val){
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$pElement = $dom->getElementsByTagName('items');
		$cName = $dom->getElementsByTagName('companyName');
		for ($i=0; $i < $val ; $i++) { 
			# code...
			$pElement[0]->removeChild($cName[$i]);
			$dom->save('cache/company-data.xml');
		}
	}
	/*---start ----*/
	if (file_exists($cache)) {
		# code...
		$response='';
		$GLOBALS["dom"]->load('cache/company-data.xml');
		$GLOBALS["dom"]->saveXML();
		$cName = $GLOBALS["dom"]->getElementsByTagName('companyName');
		$str =  (string)$_POST['query'];
		$response .= '<ul class = "list-unstyled">';
		
		for ($i=0; $i<$maxLimit;$i++) {
			$pos = strpos(strtolower($cName[$i]->nodeValue), strtolower($str));
			if ($pos !== false) {
			    $response .='<li>'.$cName[$i]->nodeValue.'</li>';
			    break;
			}
			else if($GLOBALS['maxLimit']-1==$i){
				 $response.=goToServer();
			}
			
		}
		$response.='</ul>';
		echo $response;

	}
	else{
		$GLOBALS["dom"]->load('cache/company-data.xml');
		$pElement = $GLOBALS["dom"]->createElement('items');
		$GLOBALS["dom"]->appendChild($pElement);
		if (isset($_POST['query'])) {
			$output='';
			$query="SELECT * FROM company WHERE company_name LIKE '%".$_POST['query']."%'";
			$result  = mysqli_query($conn,$query);
			$output='<ul class = "list-unstyled">';
			if (mysqli_num_rows($result)>0) {
				# code...
				while ($row = mysqli_fetch_array($result)) {
					# code...
					$output.='<li>'.$row["company_name"].'</li>';

					
					$element = $GLOBALS["dom"]->createElement('companyName', $row["company_name"]);
					$pElement->appendChild($element);

					$GLOBALS["dom"]->saveXML();
				}
			}
			else{
				$output.='<li>company Not Found</li>';
			}
			$GLOBALS["dom"]->save('cache/company-data.xml');
			$output.='</ul>';
			echo $output;
		}
	}

	/*----end----*/
	
?>