<?php
function sendsms() // I believe the variables are self-explanatory
{					
					$msgcontent="Dear Parent, Your ward has been admitted into  with admission number";
                    $api_key = '588a6ef453b33588a6ef453ba4';
                    $phone = $_POST['guardiancontact'];
                    $sender_id = 'HST-GH';
                    $message = $msgcontent.' '.$_POST['studentid'];
                    
                    $url = "http://sms.nasaramobile.com/api?api_key=$api_key&&sender_id=$sender_id&&phone=$phone&&message=".urlencode($message)."";
                    //send message and get response
                    $response = file_get_contents($url);
                    //if($response == '1801'){
                    //    echo "message sent successfully";
                    //}
                    //elseif($response == '1802') {
                    //    echo "message sending failed";
                    //}
                    //elseif($response == '1803') {
                    //    echo "invalid login phone or password given";
                    //}
                    //elseif($response == '1804') {
                    //    echo "not enough sms credit";
                    //}
                    //elseif($response == '1805') {
                    //    echo "sender id must be more than 1 charater and less than 12 characters";
                    //}
                    //elseif($response == '1806') {
                    //    echo "phone number must be more than 8 characters";
                    //}
}
?>