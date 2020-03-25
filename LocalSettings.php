<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
# if( defined( 'MW_INSTALL_PATH' ) ) {
#    $IP = MW_INSTALL_PATH;
#} else {
#    $IP = dirname( __FILE__ );
#}
#HeadScript extensiont to load GA code
require_once "$IP/extensions/HeadScript/HeadScript.php";
$wgHeadScriptCode = <<<'START_END_MARKER'
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-1265795-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-1265795-13');
</script>
START_END_MARKER;

# $path = array( $IP, "$IP/includes", "$IP/languages" );
#set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "includes/DefaultSettings.php" );

## Adds global NOINDEX,NOFOLLOW  meta to site headers
$wgExtensionFunctions[] = 'globalNoIndex';
function globalNoIndex(){
   global $wgOut;
   $wgOut->addMeta ( 'ROBOTS' , 'NOINDEX,NOFOLLOW') ;
}
# If PHP's memory limit is very low, some operations may fail.
# ini_set( 'memory_limit', '20M' );

if ( $wgCommandLineMode ) {
    if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
        die( "This script must be run from the command line\n" );
    }
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;
$wgServer     =    "http://192.168.33.21/";
$wgSitename     =    "UTC Library Wiki - LOCAL DEV";
## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
#$wgScriptPath       = "/wiki_lib";
$wgScriptPath       = "";

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;

$wgEmergencyContact = "steven-shelton@utc.edu";
$wgPasswordSender = "steven-shelton@utc.edu";

## For a detailed description of the following switches see
## http://meta.wikimedia.org/Enotif and http://meta.wikimedia.org/Eauthent
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

$wgDBtype           = "mysql";
$wgDBserver         = "172.27.161.20";
$wgDBname           = "wiki_lib";
$wgDBuser           = "wikiadmin";
$wgDBpassword       = "k%O{9xn1_bB-tK";
$wgDBport           = "5432";
$wgDBprefix         = "utc_";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "TYPE=InnoDB";

# Schemas for Postgres
# $wgDBmwschema       = "mediawiki";
# $wgDBts2schema      = "public";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
#$wgMainCacheType = CACHE_MEMCACHED;
#$wgMemCachedServers = array (
#  0 => '127.0.0.1:11000',
#);

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
## $wgHashedUploadDirectory = false;

## Set to readonly
##$wgReadOnly = 'Dumping Database, Access will be restored shortly';

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "en";

$wgProxyKey = "702561ff6c8faf8e57c8092fa34c12b079b6fb2743bdb073c5ba17dfdaff6117";

# wfLoadSkin( 'Vector' );
# wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Timeless' );
wfLoadSkin( 'Tweeki' );
wfLoadSkin( 'chameleon' );
## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'chameleon';
$wgTweekiSkinHideAnon = array( 'subnav' => true, 'PERSONAL' => false, 'TOOLBOX' => true );
$wgVisualEditorSupportedSkins[] = 'tweeki';
#require_once( "$IP/skins/MediaWikiBootstrap/MediaWikiBootstrap.php" );
#$wgDefaultSkin = "mediawikibootstrap";
## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# $wgRightsCode = ""; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $configdate );

$wgLogo = "{$wgScriptPath}/resources/assets/logo.png";
#$wgLogo = "http://www5.lib.utc.edu/img/lupton.png";
$wgGroupPermissions['*']['edit'] = false;

# Prevent new user registrations except by sysops
$wgGroupPermissions['*']['createaccount'] = false;

#add full HTML tag support
$wgRawHtml = true;

$wgFileExtensions = array('csv', 'docx', 'dotx', 'flv', 'gif', 'jpeg', 'jpg', 'ogg', 'pdf', 'png', 'ppt', 'pptx', 'tsv', 'txt', 'xls', 'xlsx', 'xslx', 'zip');

$wgVerifyMimeType = false;
/* include('extensions/Flash.php');*/

/* Added by BK on 20071107 for feedback form test */
/* require_once("extensions/gbook/gbook.php"); */
/* require_once( "extensions/SlideShare.php" ); */

/* Added by sleather on 20100513 for Widget extension*/
/*require_once("$IP/extensions/Widgets/Widgets.php");
/* $wgGroupPermissions['sysop']['editwidgets'] = true;
*/
##require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
wfLoadExtension( 'WikiEditor' );
$wgHiddenPrefs[] = 'usebetatoolbar';

wfLoadExtension( 'UserMerge' );
// By default nobody can use this function, enable for bureaucrat?
$wgGroupPermissions['bureaucrat']['usermerge'] = true;
$wgGroupPermissions['Library'] = $wgGroupPermissions['user'];
$wgGroupPermissions['user'   ]['edit']          = true;
$wgGroupPermissions['Library']['edit']          = true;
$wgGroupPermissions['sysop'  ]['edit']          = true;
// optional: default is array( 'sysop' )
$wgUserMergeProtectedGroups = array( 'groupname' );
//temporarily disable CAS until I can get things mapped out properly
require_once("$IP/extensions/CASAuth/CASAuth.php");
$CASAuth["RestrictUsers"]=true;
# $CASAuth["AllowedUsers"]= array("Valarie Adams","Clayton Aldridge","Bo Baker","Mike Bell","Paula Berard","Jennifer Berzin","Virginia Cairns","Yuri Cantrell","Stacy Chapman","Sarah Copeland","Chapel Cowden","Brody Crowder","Abbey Davis","Evie Deal","Melanie Dunn","Agnes Fellner","Rachel Fleming","Katie Gohn","Anita Greenwell","Natalie Haber","Danielle Huisman","Carly Jessup","Sarah Kantor","Jonah Lasley","Noah Lasley","Beth Leahy","Laird Leathers","Theresa Liedtka","Dunstan McNutt","Susan Murphy","Haley Ogle","Laura Perryman","Charlie Remy","Brittany Richardson","Chris Riddle","Brian Rogers","Carolyn Runyon","Albert Salatka","Andrea Schurr","Steven Shelton","Wesley Smith","Chantelle Swaren","Emily Thompson","Lane Wilkinson");
//You can optionally use this if you want to keep your own configuration settings in LocalSettings.php instead of in CASAuth.php
//Parameters not specified here will use the default setting in CASAuth.php
$CASAuth = array_merge($CASAuth, array(
     "Server"         => "webauth.utc.edu",
     "Port"           => 443,
     "Url"            => "/cas/",
     "Version"        => "2.0",
     "CreateAccounts" => true,
     "PwdSecret"      => "ueioqxukosugosked", // A random string that is used when generating the MediaWiki password for this user. YOU SHOULD EDIT THIS TO A VERY RANDOM STRING! YOU SHOULD ALSO KEEP THIS A SECRET!
    "EmailDomain"    => "utc.edu",          // The default domain for new users email address (is appended to the username).
 ));

//Restrict access by category and group
# require_once "$IP/extensions/RestrictAccessByCategoryAndGroup/RestrictAccessByCategoryAndGroup.php";
# $wgGroupPermissions['Library']['*'] = true;
# $wgGroupPermissions['Library']['private'] = true;
$wgUpgradeKey = '47b94cfd2dc70b03';
$config = parse_ini_file('/var/www/private/config.ini');
      $servername = $config['servername'];
      $username = $config['username'];
      $password = $config['password'];

    $conLogin = mysqli_connect($servername,$username,$password, 'Login');
    if (!$conLogin) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
    }
$query = "SELECT CONCAT(fName,' ',lName) AS fullName FROM Login.User ORDER BY lName;";
$result = mysqli_query($conLogin, $query) or die($error);
if (!mysqli_num_rows($result)) {
$CASAuth["AllowedUsers"]= array("Valarie Adams","Clayton Aldridge","Bo Baker","Mike Bell","Paula Berard","Jennifer Berzin","Virginia Cairns","Yuri Cantrell","Stacy Chapman","Sarah Copeland","Chapel Cowden","Brody Crowder","Abbey Davis","Evie Deal","Melanie Dunn","Agnes Fellner","Rachel Fleming","Katie Gohn","Anita Greenwell","Natalie Haber","Danielle Huisman","Carly Jessup","Sarah Kantor","Jonah Lasley","Noah Lasley","Beth Leahy","Laird Leathers","Theresa Liedtka","Dunstan McNutt","Susan Murphy","Haley Ogle","Laura Perryman","Charlie Remy","Brittany Richardson","Chris Riddle","Brian Rogers","Carolyn Runyon","Albert Salatka","Andrea Schurr","Steven Shelton","Wesley Smith","Chantelle Swaren","Emily Thompson","Lane Wilkinson");
}else{
$users_array = array("Wikiadmin");
while ($row = mysqli_fetch_array($result)) {
array_push($users_array, $row['fullName']);
  }
$CASAuth["AllowedUsers"]= $users_array;
}
mysqli_close($conLogin);
?>

