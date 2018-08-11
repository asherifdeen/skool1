<?php

			if ($corefinalscore>= 80) {
			  	$coreremark='Excellent';
           	}elseif ($corefinalscore >= 75) {
				$coreremark='Very Good';
            }elseif ($corefinalscore >= 60) {
				$coreremark='Good';
            }elseif ($corefinalscore >= 50) {
				$coreremark='Credit';
            }elseif($corefinalscore >= 45) {
				$coreremark='Pass';
			}else{
				$coreremark='Fail';
			}

?>