<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('number_to_words'))

{
    function number_to_words($number)
	{
		 $before_comma = trim(to_word($number));
		 $after_comma = trim(comma($number));
		 
       return ucwords($results = $before_comma.' koma '.$after_comma);
    }

    function to_word($number)
	{
        $words = "";
        $arr_number = array(
        "",
        "satu",
        "dua",
        "tiga",
        "empat",
        "lima",
        "enam",
        "tujuh",
        "delapan",
        "sembilan",
        "sepuluh",
        "sebelas");
		
        if($number<12)
        {
            $words = " ".$arr_number[$number];
        }
        else if($number<20)
        {
            $words = to_word($number-10)." belas";
        }
        else if($number<100)
        {
            $words = to_word($number/10)." puluh ".to_word($number%10);
        }
        else if($number<200)
        {
            $words = "seratus ".to_word($number-100);
        }
        else if($number<1000)
        {
            $words = to_word($number/100)." ratus ".to_word($number%100);
        }
        else if($number<2000)
        {
61
            $words = "seribu ".to_word($number-1000);
62
        }
63
        else if($number<1000000)
64
        {
65
            $words = to_word($number/1000)." ribu ".to_word($number%1000);
66
        }
67
        else if($number<1000000000)
68
        {
69
            $words = to_word($number/1000000)." juta ".to_word($number%1000000);
70
        }
71
        else
72
        {
73
            $words = "undefined";
74
        }
75
        return $words;
76
    }
77
 
78
    function comma($number)
79
    {
80
        $after_comma = stristr($number,',');
81
        $arr_number = array(
82
        "nol",
83
        "satu",
84
        "dua",
85
        "tiga",
86
        "empat",
87
        "lima",
88
        "enam",
89
        "tujuh",
90
        "delapan",
91
        "sembilan");

        $results = "";
        $length = strlen($after_comma);
        $i = 1;
        while($i<$length)
        {
            $get = substr($after_comma,$i,1);
            $results .= " ".$arr_number[$get];
            $i++;
        }
        return $results;
    }
}
