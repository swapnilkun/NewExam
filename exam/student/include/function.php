<?php
function encrypt($mprhase) {
     $MASTERKEY = "KEY PHRASE!";
     $td = @mcrypt_module_open('tripledes', '', 'ecb', '');
     $iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
     @mcrypt_generic_init($td, $MASTERKEY, $iv);
     $crypted_value = @mcrypt_generic($td, $mprhase);
     @mcrypt_generic_deinit($td);
     @mcrypt_module_close($td);
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

function encrypt_string($input)
{
 
    $inputlen = strlen($input);// Counts number characters in string $input
    $randkey = rand(1, 9); // Gets a random number between 1 and 9
 
    $i = 0;
    while ($i < $inputlen)
    {
 
        $inputchr[$i] = (ord($input[$i]) - $randkey);//encrpytion
 
        $i++; // For the loop to function
    }
 
//Puts the $inputchr array togtheir in a string with the $randkey add to the end of the string
    $encrypted = implode('.', $inputchr) . '.' . (ord($randkey)+50);
    return $encrypted;
}
function decrypt_string($input)
{
  $input_count = strlen($input);
 
  $dec = explode(".", $input);// splits up the string to any array
  $x = count($dec);
  $y = $x-1;// To get the key of the last bit in the array
 
  $calc = $dec[$y]-50;
  $randkey = chr($calc);// works out the randkey number
 
  $i = 0;
 
   while ($i < $y)
  {
 
    $array[$i] = $dec[$i]+$randkey; // Works out the ascii characters actual numbers
    $real .= chr($array[$i]); //The actual decryption
 
    $i++;
  };
 
$input = $real;
return $input;
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
        die("datebase query failed." . mysql_error($con));
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


function CountRows($table, $field = NULL, $value = NULL){
     
        if($field != NULL && $value != NULL){
            return mysqli_num_rows(mysqli_query($con,"SELECT * FROM `".$table."` WHERE `".$field."` = `".$value."`"))or die(mysql_error());
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







function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
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