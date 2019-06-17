 <?php
    $sql = "CREATE TABLE `users` (\n"
    . " `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,\n"
    . " `username` varchar(100) NOT NULL,\n"
    . " `email` varchar(100) NOT NULL,\n"
    . " `password` varchar(100) NOT NULL\n"
    . ") ENGINE=InnoDB DEFAULT CHARSET=latin1";
    ?>