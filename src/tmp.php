<?php
require_once ('core/UrlWatcher.php');
require_once ('dependency-container.php');
print_r(getDependency(UrlWatcher::class));