<?php
	require_once 'assets/Config/routes.php';
?>
<script type="text/javascript" src="<?php echo URL ?>libs/cookies/index.js"></script>
<script type="text/javascript">
	setCookie("token_1", "token", "0");
	setInterval(function(){ window.location = 'login.php'; }, 2000);
</script>