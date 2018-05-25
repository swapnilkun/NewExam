<?php
	/*function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			header("Location: index.php");
			exit;
		}
	}*/


function encrypt($mprhase) {
     $MASTERKEY = "KEY PHRASE!";
     $td = mcrypt_module_open('tripledes', '', 'ecb', '');
     $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
     mcrypt_generic_init($td, $MASTERKEY, $iv);
     $crypted_value = mcrypt_generic($td, $mprhase);
     mcrypt_generic_deinit($td);
     mcrypt_module_close($td);
     return base64_encode($crypted_value);
} 

function decrypt($mprhase) {
     $MASTERKEY = "KEY PHRASE!";
     $td = mcrypt_module_open('tripledes', '', 'ecb', '');
     $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
     mcrypt_generic_init($td, $MASTERKEY, $iv);
     $decrypted_value = mdecrypt_generic($td, base64_decode($mprhase));
     mcrypt_generic_deinit($td);
     mcrypt_module_close($td);
     return $decrypted_value;
}

    function simple_encrypt($text)
    {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    function simple_decrypt($text)
    {
        return trim(@mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

function smLanguage($lang){
	setcookie("StockManagerLanguage", $lang, time()+(3600*24*90));
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit;
}


function mysql_prep($value) {
	
	
	return $value;	
}

	
function redirect_to($location = NULL) {
	if($location != NULL) {		
		?>
		<script type="text/javascript">
		var url = '<?php echo $location;?>';
		window.location.href = url;
		</script>
		<?php

		exit;
	}
}

function confirm_query($result_set) {
if(!$result_set) {
        die("datebase query failed." . mysql_error());
    }
}
 function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['HTTP_HOST'],
    $_SERVER['REQUEST_URI']
  );
}


function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

function createRandomString($string_length, $character_set) {
  $random_string = array();
  for ($i = 1; $i <= $string_length; $i++) {
    $rand_character = $character_set[rand(0, strlen($character_set) - 1)];
    $random_string[] = $rand_character;
  }
  shuffle($random_string);
  return implode('', $random_string);
}

function validUniqueString($string_collection, $new_string, $existing_strings='') {
  if (!strlen($string_collection) && !strlen($existing_strings))
    return true;
  $combined_strings = $string_collection . ", " . $existing_strings;
  return (strlen(strpos($combined_strings, $new_string))) ? false : true;
}

function createRandomStringCollection($string_length, $number_of_strings, $character_set, $existing_strings = '') {
  $string_collection = '';
  for ($i = 1; $i <= $number_of_strings; $i++) {
    $random_string = createRandomString($string_length, $character_set);
    while (!validUniqueString($string_collection, $random_string, $existing_strings)) {
      $random_string = createRandomString($string_length, $character_set);
    }
    $string_collection .= ( !strlen($string_collection)) ? $random_string : ", " . $random_string;
  }
  return $string_collection;
}

//$character_set = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
//$existing_strings = "TEX, USI, NTE";
//$string_length = $query_general_setting_function_rand_num['centercodelength'];
//$number_of_strings = 1;
//$rendom_center_code=createRandomStringCollection($string_length, $number_of_strings, $character_set, $existing_strings);


function CountRows($table, $field = NULL, $value = NULL){
     
        if($field != NULL && $value != NULL){
            return mysqli_num_rows(mysqli_query($con,"SELECT * FROM `".$table."` WHERE `".$field."` = `".$value."`"))or die(mysqli_error($con));
        }else{
            return mysqli_num_rows(mysqli_query($con,"SELECT * FROM `".$table."`"));   
        }
    }


function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return date("Ymd").$result;
}
function add_my_google_analytics($g_google_analytics) {
?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $g_google_analytics;?>']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' :
'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(ga, s);
  })();
</script>

<?php
}
?>
