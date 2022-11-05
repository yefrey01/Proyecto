<?php

    class seg_medio{

        public function limpiar_sql($value){
    		$value = trim(htmlentities($value)); // Evita introduccin cdigo HTML
    		if (get_magic_quotes_gpc()) $value = stripslashes($value);
    			$value = $value;
    		return $value;
    	}

    	public function getOriginIP() {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //Compartida y Varnish
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //Proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }

    }

?>