<?php
// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

// Library
require 'libs/Database.php';
require 'libs/Session.php';

// Configuration
require 'config.php';

require 'global/IndexController.php';

$app = new Bootstrap();
?>