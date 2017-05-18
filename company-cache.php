<?php
	libxml_disable_entity_loader(false);
	include "config/connection.php";
	$handle = opendir("cache/");
	$cache = 'cache/company-data.xml';
	if (file_exists($cache)) {
		# code...
		$response='';
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$dom->saveXML();
		$cName = $dom->getElementsByTagName('companyName');
		$str =  (string)$_POST['query'];
		$response .= '<ul class = "list-unstyled">';
		$i=0;
		foreach ($cName as $cN) {
			$pos = strpos(strtolower($cN->nodeValue), strtolower($str));
			if ($pos !== false) {
			    $response .='<li>'.$cN->nodeValue.'</li>';
			}
			else if($cName->length==$i){
				$response.=goToServer();
			}
			$i++;
		}
		$response.='</ul>';
		echo $response;

	}
	else{
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$pElement = $dom->createElement('items');
		$dom->appendChild($pElement);
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

					
					$element = $dom->createElement('companyName', $row["company_name"]);
					$pElement->appendChild($element);

					$dom->saveXML();
				}
			}
			else{
				$output.='<li>Company Not Found</li>';
			}
			$dom->save('cache/company-data.xml');
			$output.='</ul>';
			echo $output;
		}
	}

	function goToServer(){
		include "config/connection.php";
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$pElement = $dom->getElementsByTagName('items');
		if (isset($_POST['query'])) {
			$out='';
			$query="SELECT * FROM company WHERE company_name LIKE '%".$_POST['query']."%'";
			$result  = mysqli_query($conn,$query);
			$out='<ul class = "list-unstyled">';
			if (mysqli_num_rows($result)>0) {
				# code...
				while ($row = mysqli_fetch_array($result)) {
					# code...
					$output.='<li>'.$row["company_name"].'</li>';

					if(checkExistence($row["company_name"])){
						$element = $dom->createElement('companyName', $row["company_name"]);
						$pElement[0]->appendChild($element);
						/*if ($element->length>10) {
							# code...
							deleteOlder($element->length-10);
						}*/
					}
					

					$dom->saveXML();
				}
			}
			else{
				$out.='<li>Company Not Found</li>';
			}
			/*$dom->save('cache/company-data.xml');*/
			$out.='</ul>';
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

	/*function deleteOlder($val){
		$dom = new DOMDocument('1.0', 'utf-8');
		$dom->load('cache/company-data.xml');
		$cName = $dom->getElementsByTagName('companyName');
		for ($i=0; $i < $val ; $i++) { 
			# code...

		}
	}*/
?>