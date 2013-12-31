<?php

define("APP_PATH", str_replace('includes', '', dirname ( __FILE__ )));
define("APP_URL", $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']);