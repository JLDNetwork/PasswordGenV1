# PasswordGenV1 #
<small>a configurable password generator</small>

## Configuration ##
<small>pwdgen_config.json</small>

*  *min_length* : this is the minimum allowable size of the password to generate. default = 8
*  *max_length* : this is the maximum allowable size of the password to generate. default = 15
*  *case* : this sets the case of the password to generate. available settings are 'upper', 'lower' and 'mixed'. default = mixed
*  *alpha_first* : set this to true if you require the first character to be a letter (a-z); else set to false. default = true
*  *vowels* : set this to true if you require the use of vowels in your password; else set to false. default = true
*  *consonants* : set this to true if you require the use of consonants in your password; else set to false. default = true
*  *symbols* : set this to true if you require the use of symbols in your password; else set to false. default = true
*  *digits* : set this to true if you require the use of digits in your password; else set to false. default = true
*  *req_symbols* : this sets the required minimum number of symbols to use if 'symbols' is set to true. default = 2
*  *req_digits* : this sets the required minimum number of digits to use if 'digits' is set to true. default = 2
*  *alpha_to_sym* : set this to true if you wish to convert letters (with a similar symbolic counterpart) to their similar symbolic counterpart. default = false
*  *alpha_to_dig* : set this to true if you wish to convert letters (with a similar digit counterpart) to their similar digit counterpart. default = false

## Usage ##
<small>2 ways to use</small>

*  ``echo PwdGen::fetchPwd();``
*  ``$password = new PwdGen();
echo $password->fetchPwd();``