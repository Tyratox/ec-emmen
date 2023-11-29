<?php
	
	$form_id = get_field("form_id");
	$order = get_field("order");
	
	
	
	global $wpdb;
    $cfdb          = apply_filters( 'cfdb7_database', $wpdb );
    $table_name    = $cfdb->prefix.'db7_forms';
    
    $results       = $cfdb->get_results( "
        SELECT * FROM $table_name 
        WHERE
        form_post_id = $form_id
        ORDER BY form_id DESC", OBJECT 
    );
    
    $to_delete = array();
    echo "<table class='w-full'>";
    
    
	    echo "<thead>";
	    	
	    	echo "<tr class='text-left text-red text-xl border-b-2 border-red'>";
	    		echo "<th class='font-normal'>Datum</th>";
	    		echo "<th class='font-normal'>Name</th>";
	    		echo "<th class='font-normal'>Mannschaft</th>";
	    	echo "</tr>";
	    
	    echo "</thead>";
	    
	    echo "<tbody class='divide-y divide-red'>";
	    
	    
	    	$now = new DateTime();
	    	$now->modify('-1 day');
	    	
	    	$entries = array();
	    	
    
		    foreach($results as $result){
			    if(!empty($result)){
				    
				    $data = unserialize( $result->form_value );
				    $datetime = DateTime::createFromFormat('Y-m-d', $data['date']);
				    
				    if($datetime < $now){
					    $to_delete[] = $result->form_id;
					}else{
						$entries[] = array(
							"date" => $datetime,
							"name" => $data['your_name'],
							"team" => $data['team'][0],
							"reason" => $data['reason']
						);
					}
			    }
		    }
		    
		    uasort($entries, function($a, $b){
			    if ($a['date'] == $b['date']) {
			        return 0;
			    }
			    
			    if(empty($order) || $order === "asc"){
				    return ($a['date'] > $b['date']) ? 1 : -1;
			    }else {
				    return ($a['date'] > $b['date']) ? -1 : 1;
			    }
		    });
		    
		    foreach($entries as $entry){
			    echo "<tr>";
				    
				    echo "<td class='pt-4'>" . $entry['date']->format('d.m.Y') . "</td>";
				    echo "<td class='pt-4'>" . $entry['name'] . "</td>";
				    echo "<td class='pt-4'>" . $entry['team'] . "</td>";
			    
			    echo "</tr>";
		    }
	    
	    echo "</tbody>";
    
    echo "</table>";
    
    $form_ids = implode(",", $to_delete);
    
    //clean up old entries
    
    $cfdb->get_results( "
        DELETE FROM $table_name 
        WHERE
        form_id IN ($form_ids)", OBJECT 
    );
	
?>