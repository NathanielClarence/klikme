<?php

echo "<script>
		$modal = $('.myModal');
		$btn = $('.gear');
		$span = $('.close');
		$unblock = $('.unblock');
		$del = $('.delete');
		
		$btn.click(function(){
			$modal.css('display', 'block');
		});

		$span.click(function() {
		    $modal.css('display', 'none');
		});

		$del.click(function(){
			$answer = confirm('Do you want to delete this account ?');
			if ($answer){
				$modal.css('display', 'none');
			}
		});

		$unblock.click(function(){
			$answer = confirm('Do you want to unblock this account ? ');
			if ($answer){
				$modal.css('display', 'none');
			}
		});

		$(window).onclick = function(event) {
		    if (event.target == $modal) {
		        $modal.css('display', 'none');
		    }
		}
	</script>";
?>