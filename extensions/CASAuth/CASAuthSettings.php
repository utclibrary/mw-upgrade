<?php
# This file controls the configuration of the CASAuth extension.  The defaults
# for these options are defined in CASAuth.php, and are only defined here as
# well for the sake of documentation.  It is highly suggested you should not
# modify the CASAuth defaults unless you know what you are doing.

# Location of the phpCAS library, which is required for this Extension.  For
# more information, see https://wiki.jasig.org/display/CASC/phpCAS for more
# information.
#
# Default: $CASAuth["phpCAS"]="$IP/extensions/CASAuth/CAS";
$CASAuth["phpCAS"]="$IP/extensions/CASAuth/CAS";

# Location of the CAS authentication server.  You must set this to the location
# of your CAS server.  You have a CAS server right?
#
# Default: $CASAuth["Server"]="auth.example.com";
$CASAuth["Server"]="webauth.utc.edu";

# An array of servers that are allowed to make use of the Single Sign Out
# feature.  Leave to false if you do not support this feature, of if you dont
# want to use it.  Otherwise, add servers on individual lines.
#  Example:
#    $CASAuth["LogoutServers"][]='cas-logout-01.example.com';
#    $CASAuth["LogoutServers"][]='cas-logout-02.example.com';
#
# Default: $CASAuth["LogoutServers"]=false;
$CASAuth["LogoutServers"]=true;

# Server port for communicating with the CAS server.
#
# Default: $CASAuth["Port"]=443;
$CASAuth["Port"]=443;

# URI Path to the CAS authentication service
#
# Default: $CASAuth["Url"]="/cas/";
$CASAuth["Url"]="/cas/";

# CAS Version.  Available versions are "1.0" and "2.0".
#
# Default: $CASAuth["Version"]="2.0";
$CASAuth["Version"]="2.0";

# Enable auto-creation of users when signing in via CASAuth. This is required
# if the users do not already exist in the MediaWiki use database.  If accounts
# are not regularly being creating, it is recommended that this be set to false
#
# Default: $CASAuth["CreateAccounts"]=false
$CASAuth["CreateAccounts"]=true;

# If the "CreateAccounts" option is set "true", the string below is used as a
# salt for generating passwords for the users.  This salt is not used by
# the normal Mediawiki authentication and is only in place to prevent someone
# from cracking passwords in the database.  This should be changed to something
# long and horrendous to remember.
#
# Default: $CASAuth["PwdSecret"]="Secret";
$CASAuth["PwdSecret"]="ueioqxukosugosked";

# The email domain is appended to the end of the username when the user logs
# in.  This does not affect their email address, and is for aesthetic purposes
# only.
#
# Default: $CASAuth["EmailDomain"]="example.com";
$CASAuth["EmailDomain"]="utc.edu";

# Restrict which users can login to the wiki?  If set to true, only the users
# in the $CASAuth["AllowedUsers"] array can login.
#
# Default: $CASAuth["RestrictUsers"]=false
$CASAuth["RestrictUsers"]=false;

# Should CAS users be logged in with the "Remember Me" option?
#
# Default: $CASAuth["RememberMe"]=true;
$CASAuth["RememberMe"]=false;

# If $CASAuth["RestrictUsers"] is set to true, the list of users below are the
# users that are allowed to login to the wiki.
#
# Default: $CASAuth["AllowedUsers"] = false;
$CASAuth["AllowedUsers"] = true;


# If a user is not allowed to login, where should we redirect them to?
#
# Default: $CASAuth["RestrictRedirect"]="http://www.example.com";
$CASAuth["RestrictRedirect"]="https://wikilibtest.utc.edu/";

# If you dont like the uid that CAS returns (ie. it returns a number) you can
# modify the routine below to return a customized username instead.
#
# Default: Returns the username, untouched
function casNameLookup($username) {
  $mail = phpCAS::getAttribute('mail');
  // split email @ and - capitalize and recombine
  $stripNumbersFromEmail = preg_replace('/[0-9]+/', '', $mail);
  $nameEmail = explode("@", $stripNumbersFromEmail);
  $firstLastName = explode('-',$nameEmail['0']);
  $firstName = ucfirst($firstLastName[0]);
  $lastName = ucfirst($firstLastName[1]);
  $uname = $firstName." ".nameTitleCase($lastName);
  return $uname;
}
# If your users aren't all on the same email domain you can
# modify the routine below to return their email address
#
# Default: Returns $username@EmailDomain
function casEmailLookup($username) {
  //global $CASAuth;
  return $mail = phpCAS::getAttribute('mail');
  //$username."@".$CASAuth["EmailDomain"];
}
function nameTitleCase($string) 
{
    $word_splitters = array(' ', '-', "O'", "L'", "D'", 'St.', 'Mc');
    $lowercase_exceptions = array('the', 'van', 'den', 'von', 'und', 'der', 'de', 'da', 'of', 'and', "l'", "d'");
    $uppercase_exceptions = array('III', 'IV', 'VI', 'VII', 'VIII', 'IX');

    $string = strtolower($string);
    foreach ($word_splitters as $delimiter)
    { 
        $words = explode($delimiter, $string); 
        $newwords = array(); 
        foreach ($words as $word)
        { 
            if (in_array(strtoupper($word), $uppercase_exceptions))
                $word = strtoupper($word);
            else
            if (!in_array($word, $lowercase_exceptions))
                $word = ucfirst($word); 

            $newwords[] = $word;
        }

        if (in_array(strtolower($delimiter), $lowercase_exceptions))
            $delimiter = strtolower($delimiter);

        $string = join($delimiter, $newwords); 
    } 
    return $string; 
}

# If you dont like the uid that CAS returns (ie. it returns a number) you can
# modify the routine below to return a customized real name instead.
#
# Default: Returns the username, untouched
function casRealNameLookup($username) {
  return $username;
}

/*
# If you would like to use ldap to retrieve real names, you can use these
# functions instead. Remember to fill in appropriate parameters for ldap.
function casRealNameLookup($username) {
  return @casRealNameLookupFromLDAP($username);
}

function casRealNameLookupFromLDAP($username) {
  try {
    # login to the LDAP server
    $ldap = ldap_connect("host");
    $bind = ldap_bind($ldap, "bind_rdn", "bind_password");

    # look up the user's name by user id
    $result = ldap_search($ldap, "base_dn", "(uid=$username)");
    $info = ldap_get_entries($ldap, $result);

    $first_name = $info[0]["givenname"][0];
    $last_name  = $info[0]["sn"][0];

    # log out of the server
    ldap_unbind($ldap);

    $realname = $first_name . " " . $last_name;
  } catch (Exception $e) {}

  if ($realname == " " || $realname == "" || $realname == NULL) {
    $realname = $username;
  }

  return $realname;
}
*/
