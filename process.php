<?php
    session_start();
    include 'vardefine.php';
    include 'PrintFunctions.php';
    include 'DataBaseFunctions.php';

    $UserToken = GetUserToken();

	$function 	= filter_input(INPUT_POST, "function", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	$File		= filter_input(INPUT_POST, "file", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

    $log = array();
    
    switch($function) {
    
    	 case('getState'):
			if(file_exists($File))
			{
				$howManylines = count(file("./chats/".$File));
				if(isset($_POST['rowWanted']))
				{
					$rowWanted  = $_POST['rowWanted'];
					$howManylines -= $rowWanted;
					if(!$howManylines)
						$howManylines = 0;
				}
			}
			
             $log['state'] = $howManylines; 
        	 break;	
    	
    	 case('update'):
			$state = $_POST['state'];
			
			if(file_exists("./chats/".$File))
			{
        	   $lines = file("./chats/".$File);
			}
			 
			$count =  count($lines);

			if($state == $count)
			{
				$log['state'] = $state;
				$log['text'] = false;
				
			}
			else
			{
				$text = array();
				$log['state'] = $state + count($lines) - $state;
				
				foreach ($lines as $line_num => $line)
				{
					if($line_num >= $state)
					{
						$text[] =  $line = str_replace("\n", "", $line);
					}
	
				}

				$log['text'] = $text; 
			}
			
			break;
    	 
    	 case('send'):
			$nickname = "mario";
			$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			$message = htmlentities(strip_tags($_POST['message']));

			if(($message) != "\n")
			{

				if(preg_match($reg_exUrl, $message, $url))
				{
					$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				} 

				fwrite(fopen("./chats/".$File, 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
			}

			break;
    	
    }
    
    echo json_encode($log);

?>