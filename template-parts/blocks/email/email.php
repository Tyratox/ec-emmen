<?php
	
	$email = get_field("email");
	
	$f = explode("@", $email);
	
	if(count($f) === 1){
		return "Ungültige E-Mail";
	}
	
	$s = explode(".", $f[1]);
	
	if(count($s) === 1){
		return "Ungültige E-Mail";
	}
	
	$name = array_shift($f);
	$tld = array_pop($s);
	$domain = implode(".", $s);
	
	
	echo '<a href="#" class="cryptedmail text-red py-8" data-name="' . $name . '" data-domain="' . $domain . '" data-tld="' . $tld . '" onclick="window.location.href = \'mailto:\' + this.dataset.name + \'@\' + this.dataset.domain + \'.\' + this.dataset.tld; return false;"></a>';	
?>