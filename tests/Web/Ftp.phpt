<?php

/**
 * Test: Nette\Web\Ftp basic usage.
 *
 * @author     David Grudl
 * @package    Nette\Web
 * @subpackage UnitTests
 */

use Nette\Web\Ftp;



require __DIR__ . '/../initialize.php';



$ftp = new Ftp;
// Opens an FTP connection to the specified host
$ftp->connect('ftp.nettephp.com');
$ftp->pasv(TRUE);
// Login with username and password
$ftp->login('nette@php7.org', 'anonymous');

// Download file 'README' to local temporary file
$temp = tmpfile();
$ftp->fget($temp, 'README', Ftp::ASCII);

// echo file
fseek($temp, 0);
Assert::same( "Nette Framework rocks!", stream_get_contents($temp) );