<?php

    /**
     * Created by PhpStorm.
     * User: jgllt
     * Date: 3/26/2017
     * Time: 20:55
     */

    class PwdGen
    {
        /**
         * @var string
         */
        protected static $config_file = 'pwdgen_config.json';
        /**
         * @var
         */
        protected static $configs;
        /**
         * @var string
         */
        private static $consonants = 'bcdfghjklmnpqrstvwxyz';
        /**
         * @var string
         */
        private static $vowels = 'aeiou';
        /**
         * @var string
         */
        private static $digits = '0123456789';
        /**
         * @var string
         */
        private static $symbols = '!@#$%^&*~';
        /**
         * @var
         */
        private static $pwdlength;
        /**
         * @var
         */
        private static $pwdarr;


        /**
         * PwdGen constructor.
         */
        public function __construct()
        {
            self::init();
            self::randString();
        }

        /**
         *
         */
        private static function init(): void
        {
            if(!is_file(self::$config_file)) :
                die('Config file not found.');
            endif;
            self::$configs = json_decode(file_get_contents(self::$config_file),true);
        }

        /**
         *
         */
        private static function randString(): void
        {
            self::$pwdlength = mt_rand(self::$configs['min_length'], self::$configs['max_length']);
            $pwd_elements = array();
            $characters = array();

            if(self::$configs['consonants']) :
                $pwd_elements[] = 0;
                $pwd_elements[] = 1;
            endif;
            if(self::$configs['vowels']) :
                $pwd_elements[] = 2;
                $pwd_elements[] = 3;
            endif;
            if(self::$configs['digits']) :
                $pwd_elements[] = 4;
                for($i=0;$i<self::$configs['req_digits'];$i++) :
                    $characters[] = self::randomDigit();
                endfor;
            endif;
            if(self::$configs['symbols']) :
                $pwd_elements[] = 5;
                for($y=0;$y<self::$configs['req_symbols'];$y++) :
                    $characters[] = self::randomSymbol();
                endfor;
            endif;

            while(count($characters)<self::$pwdlength) :
                $index = $pwd_elements[mt_rand() % count($pwd_elements)];
                switch($index) :
                    default :
                    # lowercase consonants
                    case 0 :
                    # uppercase consonants
                    case 1 :
                        $characters[] = self::randomConsonant(($index==1?true:false));
                        break;
                    # lowercase vowels
                    case 2 :
                    # uppercase vowels
                    case 3 :
                        $characters[] = self::randomVowel(($index==3?true:false));
                        break;
                    # digits
                    case 4 :
                        $characters[] = self::randomDigit();
                        break;
                    # symbols
                    case 5 :
                        $characters[] = self::randomSymbol();
                        break;
                endswitch;
            endwhile;

            shuffle($characters);
            if(self::$configs['alpha_first']) :
                self::$pwdarr = self::rearrange($characters);
            else :
                self::$pwdarr = $characters;
            endif;
        }

        /**
         * @return mixed
         */
        private static function randomDigit()
        {
            return self::$digits[mt_rand() % strlen(self::$digits)];
        }

        /**
         * @return mixed
         */
        private static function randomSymbol()
        {
            return self::$symbols[mt_rand() % strlen(self::$symbols)];
        }

        /**
         * @param bool $upper
         * @return string
         */
        private static function randomVowel(bool $upper=false): string
        {
            return ($upper === true) ? strtoupper(self::$vowels[mt_rand() % strlen(self::$vowels)]) : self::$vowels[mt_rand() % strlen(self::$vowels)];
        }

        /**
         * @param bool $upper
         * @return string
         */
        private static function randomConsonant(bool $upper=false): string
        {
            return ($upper === true) ? strtoupper(self::$consonants[mt_rand() % strlen(self::$consonants)]) : self::$consonants[mt_rand() % strlen(self::$consonants)];
        }

        /**
         * @param array $arr
         * @return array
         */
        private static function rearrange(array $arr): array
        {
            while(!ctype_alpha($arr[0])) :
                shuffle($arr);
            endwhile;
            return $arr;
        }

        /**
         * @return mixed|string
         */
        public static function fetchPwd()
        {
            $string = '';
            foreach(self::$pwdarr as $key => $value) :
                $string .= $value;
            endforeach;

            if(self::$configs['alpha_to_sym']) : $string = str_replace(['a','i','s'],['@','!','$'],$string); endif;
            if(self::$configs['alpha_to_dig']) : $string = str_replace(['o','E','l','S','A'],['0','3','1','5','4'],$string); endif;

            return (self::$configs['case'] == 'lower' ? strtolower($string) : (self::$configs['case'] == 'upper' ? strtoupper($string) : $string));
        }
    }

    $pwd = new PwdGen();
    echo "<pre>";
    echo PwdGen::fetchPwd();
    echo "</pre>";