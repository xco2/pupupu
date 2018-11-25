<?php
setcookie('user', '', time() - 1);
echo '<script>location.href="index.php"</script>';
