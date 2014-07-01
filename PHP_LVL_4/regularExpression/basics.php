<?php

// . - mean all synbols except brake lines
// ? mean any symbol if exists "/PHP.?5/" mean - maybe is any sumbol or not after php and after 5 it is walid for both strings like  - PHP5 or  PHP 5 OR php_5
// + mean minimum must be one symbol and more (count of symbols is unlimited)
// * mean any symbols (no matter their number) include spaces
// ?: mean must not get  - "john smith" - /([a-z ]+)(?:ith)/
// ?P<name> mean - we can give a name to matches