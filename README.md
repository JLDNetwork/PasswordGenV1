# PasswordGenV1 #
<small>A configurable password generator</small>

## Requirements ##

*  PHP 7.1

## Configuration ##
<small>pwdgen_config.json</small>

*  *min_length* : this is the minimum allowable size of the password to generate. larger length will produce stronger passwords. default = 8
*  *max_length* : this is the maximum allowable size of the password to generate. larger length will produce stronger passwords. default = 15
*  *case* : this sets the case of the password to generate. available settings are 'upper', 'lower' and 'mixed'. default = mixed
*  *alpha_first* : set this to true if you require the first character to be a letter (a-z); else set to false. ignored if both vowels and consonants are set to false. default = true
*  *vowels* : set this to true if you require the use of vowels in your password; else set to false. default = true
*  *consonants* : set this to true if you require the use of consonants in your password; else set to false. default = true
*  *symbols* : set this to true if you require the use of symbols in your password; else set to false. default = true
*  *digits* : set this to true if you require the use of digits in your password; else set to false. default = true
*  *req_symbols* : this sets the required minimum number of symbols to use if 'symbols' is set to true. default = 2
*  *req_digits* : this sets the required minimum number of digits to use if 'digits' is set to true. default = 2
*  *alpha_to_sym* : set this to true if you wish to convert letters (with a similar symbolic counterpart) to their similar symbolic counterpart. ignored if both vowels and consonants are set to false. default = false
*  *alpha_to_dig* : set this to true if you wish to convert letters (with a similar digit counterpart) to their similar digit counterpart. ignored if both vowels and consonants are set to false. default = false

## Usage ##

<small>Options for inclusion</small>

*  [Download](https://github.com/Jeffgl77/PasswordGenV1/archive/master.zip "download") 
*  git bash clone : [https://github.com/Jeffgl77/PasswordGenV1.git]

<small>Copy following files to desired location</small>

*  class_pwdgen.php
*  pwdgen_config.json

<small>Require the class file on the page you wish to use this script.</small>

*  <code>require_once('PATH/TO/CLASS/class_pwdgen.php');</code>

<small>2 ways to use</small>

*  <code>echo PwdGen::fetchPwd();</code>
*  <code>$password = new PwdGen();
echo $password->fetchPwd();</code>