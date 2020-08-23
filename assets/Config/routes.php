<?php
	define("BASE", "/Sistema-Licenca/");
	define("PATH", $_SERVER['DOCUMENT_ROOT']. BASE);
	define("URL",  $_SERVER['REQUEST_SCHEME']. '://' .$_SERVER['HTTP_HOST']. BASE);
	define("URI", $_SERVER['REQUEST_URI']);

?>