<?php
	/*$headers = "From: info@textusintentio.com\r\n";
				$headers .= "Reply-To: info@samaxtechnologie.com\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";	*/




$headers ="From:info@textusintentio.com Reply-To:s@gmail.com Content-type:text/html; charset=iso-8859-1";




$student=mail('am1978cs59@gmail.com',"testing","HI this is a testing mail", $headers );
if($student)
{
echo "sent mail ";
}
else
{
	echo "fail mail ";
}

?>