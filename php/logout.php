<?php

setcookie('username',null, -1, '/');
setcookie('iduser',null, -1, '/');
setcookie('admin',null, -1, '/');
setcookie('moderator',null, -1, '/');
setcookie('date',null, -1, '/');

header('location:/play');
?>