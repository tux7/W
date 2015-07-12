<?php

	namespace W\Security;

	class StringUtils 
	{

		public static function hashPassword($plainPassword)
		{
			return password_hash($plainPassword, PASSWORD_DEFAULT);
		}

		public static function randomString($length = 32)
		{
			$possibleChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	        $factory = new \RandomLib\Factory;
			$generator = $factory->getGenerator(new \SecurityLib\Strength(\SecurityLib\Strength::MEDIUM));
			$string = $generator->generateString($length, $possibleChars);

	        return $string;
		}

		public static function stringEquals($string1, $string2)
		{
			if (function_exists('hash_equals')) {
				return hash_equals($string1, $string2);
			}

			if(strlen($str1) != strlen($str2)) {
				return false;
			} 
			$res = $str1 ^ $str2;
			$ret = 0;
			for($i = strlen($res) - 1; $i >= 0; $i--){
				$ret |= ord($res[$i]);
			}
			return !$ret;
			
		}

	}