<?php

namespace LanguageTools;

/*
    Document   : Bijoy to Unicode (UTF-8) converter
    Created on : Mar 10, 2012, 10:23:43 AM
    @author    : Mohamed Shehab -> Forked from the procedural version by Habib Ullah Bahar

    Description: Converts any string written in Bijoy fonts (SutonnyMJ etc) to Unicode format.
  
    Usage:      1. include 'BijoyToUnicodeConverter'
                2. Call convertBijoyToUnicode($stringToFormat) protected function, Unicode formatted string will be returned.
    
    Pre-requisite: Php's Multi-byte Support (mbstring) must be present.
  
    Credits: Original javascript character mapping was done by Abdullah Ibne Alam. Shohag, www.repulsivecoder.com/2009/06/04/bijoy-to-unicode-converter/
    
    Copyright: GNU AFFERO GENERAL PUBLIC LICENSE, Version 3 (AGPL-3.0)
*/

class BijoyToUnicodeConverter
{

    protected $preConversionMap = array(
        ' +' => ' ',
        'yy' => 'y', //Double Hrosh-u-Kar
        'vv' => 'v', //Double Aa-Kar
        '­­' => '­', //Double Jukto-L - L+Double-L = Triple L
        'y&' => 'y', //Hoshonto+Hrosh-u
        '„&' => '„', //Hoshonto+Ri-Kar
        '‡u' => 'u‡', //ChondroBindu Error /Typing Mistake
        'wu' => 'uw', //ChondroBindu Error /Typing Mistake
        ' ,' => ',',
        ' \\|' => '\\|',
        '\\\\ ' => '',
        ' \\\\' => '',
        '\\\\' => '',
        '\n +' => '\n',
        ' +\n' => '\n',
        '\n\n\n\n\n' => '\n\n',
        '\n\n\n\n' => '\n\n',
        '\n\n\n' => '\n\n'
    );

    protected $conversionMap = array(
        // Vowels Start
        'Av' => 'আ',
        'A' => 'অ',
        'B' => 'ই',
        'C' => 'ঈ',
        'D' => 'উ',
        'E' => 'ঊ',
        'F' => 'ঋ',
        'G' => 'এ',
        'H' => 'ঐ',
        'I' => 'ও',
        'J' => 'ঔ',
        // Constants
        'K' => 'ক',
        'L' => 'খ',
        'M' => 'গ',
        'N' => 'ঘ',
        'O' => 'ঙ',
        'P' => 'চ',
        'Q' => 'ছ',
        'R' => 'জ',
        'S' => 'ঝ',
        'T' => 'ঞ',
        'U' => 'ট',
        'V' => 'ঠ',
        'W' => 'ড',
        'X' => 'ঢ',
        'Y' => 'ণ',
        'Z' => 'ত',
        '_' => 'থ',
        '`' => 'দ',
        'a' => 'ধ',
        'b' => 'ন',
        'c' => 'প',
        'd' => 'ফ',
        'e' => 'ব',
        'f' => 'ভ',
        'g' => 'ম',
        'h' => 'য',
        'i' => 'র',
        'j' => 'ল',
        'k' => 'শ',
        'l' => 'ষ',
        'm' => 'স',
        'n' => 'হ',
        'o' => 'ড়',
        'p' => 'ঢ়',
        'q' => 'য়',
        'r' => 'ৎ',
        's' => 'ং',
        't' => 'ঃ',
        'u' => 'ঁ',
        // Numbers
        '0' => '০',
        '1' => '১',
        '2' => '২',
        '3' => '৩',
        '4' => '৪',
        '5' => '৫',
        '6' => '৬',
        '7' => '৭',
        '8' => '৮',
        '9' => '৯',
        // Kars
        '•' => 'ঙ্',
        'v' => 'া', // Aa-Kar
        'w' => 'ি', // i-Kar
        'x' => 'ী', // I-Kar
        'y' => 'ু', // u-Kar
        'z' => 'ু', // u-Kar
        '“' => 'ু', // u-kar
        '–' => 'ু', // u-kar
        '~' => 'ূ', // U-kar
        'ƒ' => 'ূ', // U-kaar
        '‚' => 'ূ', // U-kaar
        '„„' => 'ৃ', //Double Rri-kar Bug
        '„' => 'ৃ', // Ri-Kar
        '…' => 'ৃ', // Ri-Kar
        '†' => 'ে', // E-Kar
        '‡' => 'ে', // E-Kar
        'ˆ' => 'ৈ', // Oi-Kar
        '‰' => 'ৈ', // Oi-Kar
        'Š' => 'ৗ', // Ou-Kar
        '\\|' => '।', // Full-Stop
        '\\&' => '্‌', // Ho-shonto
        //	Jukto Okkhor
        '\\^' => '্ব',
        '‘' => '্তু',
        '’' => '্থ',
        '‹' => '্ক',
        'Œ' => '্ক্র',
        '”' => 'চ্',
        '—' => '্ত',
        '˜' => 'দ্',
        '™' => 'দ্',
        'š' => 'ন্',
        '›' => 'ন্',
        'œ' => '্ন',
        'Ÿ' => '্ব',
        '¡' => '্ব',
        '¢' => '্ভ',
        '£' => '্ভ্র',
        '¤' => 'ম্',
        '¥' => '্ম',
        '¦' => '্ব',
        '§' => '্ম',
        '¨' => '্য',
        '©' => 'র্',
        'ª' => '্র',
        '«' => '্র',
        '¬' => '্ল',
        '­' => '্ল',
        '®' => 'ষ্',
        '¯' => 'স্',
        '°' => 'ক্ক',
        '±' => 'ক্ট',
        '²' => 'ক্ষ্ণ', //shu(kkhno)
        '³' => 'ক্ত',
        '´' => 'ক্ম',
        'µ' => 'ক্র',
        '¶' => 'ক্ষ',
        '·' => 'ক্স',
        '¸' => 'গু',
        '¹' => 'জ্ঞ',
        'º' => 'গ্দ',
        '»' => 'গ্ধ',
        '¼' => 'ঙ্ক',
        '½' => 'ঙ্গ',
        '¾' => 'জ্জ',
        '¿' => '্ত্র',
        'À' => 'জ্ঝ',
        'Á' => 'জ্ঞ',
        'Â' => 'ঞ্চ',
        'Ã' => 'ঞ্ছ',
        'Ä' => 'ঞ্জ',
        'Å' => 'ঞ্ঝ',
        'Æ' => 'ট্ট',
        'Ç' => 'ড্ড',
        'È' => 'ণ্ট',
        'É' => 'ণ্ঠ',
        'Ê' => 'ণ্ড',
        'Ë' => 'ত্ত',
        'Ì' => 'ত্থ',
        'Í' => 'ত্ম',
        'Î' => 'ত্র',
        'Ï' => 'দ্দ',
        'Ð' => '-',
        'Ñ' => '-',
        'Ò' => '"',
        'Ó' => '"',
        'Ô' => "'",
        'Õ' => "'",
        'Ö' => '্র',
        '×' => 'দ্ধ',
        'Ø' => 'দ্ব',
        'Ù' => 'দ্ম',
        'Ú' => 'ন্ঠ',
        'Û' => 'ন্ড',
        'Ü' => 'ন্ধ',
        'Ý' => 'ন্স',
        'Þ' => 'প্ট',
        'ß' => 'প্ত',
        'à' => 'প্প',
        'á' => 'প্স',
        'â' => 'ব্জ',
        'ã' => 'ব্দ',
        'ä' => 'ব্ধ',
        'å' => 'ভ্র',
        'æ' => 'ম্ন',
        'ç' => 'ম্ফ',
        'è' => '্ন',
        'é' => 'ল্ক',
        'ê' => 'ল্গ',
        'ë' => 'ল্ট',
        'ì' => 'ল্ড',
        'í' => 'ল্প',
        'î' => 'ল্ফ',
        'ï' => 'শু',
        'ð' => 'শ্চ',
        'ñ' => 'শ্ছ',
        'ò' => 'ষ্ণ',
        'ó' => 'ষ্ট',
        'ô' => 'ষ্ঠ',
        'õ' => 'ষ্ফ',
        'ö' => 'স্খ',
        '÷' => 'স্ট',
        'ø' => 'স্ন', //(sn)eho //†ønØ
        'ù' => 'স্ফ',
        'ú' => '্প',
        'û' => 'হু',
        'ü' => 'হৃ',
        'ý' => 'হ্ন',
        'þ' => 'হ্ম'
    );

    protected $proConversionMap = array('্্' => '্');


    protected $postConversionMap = array(
        //Colon with Number/Space
        '০ঃ' => '০:',
        '১ঃ' => '১:',
        '২ঃ' => '২:',
        '৩ঃ' => '৩:',
        '৪ঃ' => '৪:',
        '৫ঃ' => '৫:',
        '৬ঃ' => '৬:',
        '৭ঃ' => '৭:',
        '৮ঃ' => '৮:',
        '৯ঃ' => '৯:',
        ' ঃ' => ' :',
        '\nঃ' => '\n:',
        ']ঃ' => ']:',
        '\\[ঃ' => '\\[:',
        '  ' => ' ',
        'অা' => 'আ',
        '্‌্‌' => '্‌'
    );

    /**
     * @param string $c
     *
     * @return bool
     */
    protected function isBanglaDigit($c)
    {
        return ($c >= '০' && $c <= '৯');
    }

    /**
     * @param $c
     *
     * @return bool
     */
    protected function isBanglaPreKar($c)
    {
        return ($c == 'ি' || $c == 'ৈ' || $c == 'ে');
    }

    /**
     * @param string $c
     *
     * @return bool
     */
    protected function isBanglaPostKar($c)
    {
        return $c == 'া' || $c == 'ো' || $c == 'ৌ' || $c == 'ৗ' || $c == 'ু' || $c == 'ূ' || $c == 'ী' || $c == 'ৃ';
    }

    /**
     * @param string $c
     *
     * @return bool
     */
    protected function isBanglaKar($c)
    {
        return $this->isBanglaPreKar($c) || $this->isBanglaPostKar($c);
    }

    /**
     * @param string $c
     *
     * @return bool
     */
    protected function isBanglaBanjonborno($c)
    {
        // Most probably whoever who wrote this code doesn't know (in_array) method
        return ($c == 'ক' || $c == 'খ' || $c == 'গ' || $c == 'ঘ' || $c == 'ঙ' || $c == 'চ' || $c == 'ছ' || $c == 'জ'
            || $c == 'ঝ' || $c == 'ঞ' || $c == 'ট' || $c == 'ঠ' || $c == 'ড' || $c == 'ঢ' || $c == 'ণ' || $c == 'ত'
            || $c == 'থ' || $c == 'দ' || $c == 'ধ' || $c == 'ন' || $c == 'প' || $c == 'ফ' || $c == 'ব' || $c == 'ভ'
            || $c == 'ম' || $c == 'য' || $c == 'র' || $c == 'ল' || $c == 'শ' || $c == 'ষ' || $c == 'স' || $c == 'হ'
            || $c == 'ড়' || $c == 'ঢ়' || $c == 'য়' || $c == 'ৎ' || $c == 'ং' || $c == 'ঃ' || $c == 'ঁ'
        );
    }

    /**
     * @param $c
     *
     * @return bool
     */
    protected function isBanglaSoroborno($c)
    {
        return ($c == 'অ' || $c == 'আ' || $c == 'ই' || $c == 'ঈ' || $c == 'উ' || $c == 'ঊ' || $c == 'ঋ'
            || $c == 'ঌ' || $c == 'এ' || $c == 'ঐ' || $c == 'ও' || $c == 'ঔ');
    }

    /**
     * @param string $c
     * @return bool
     */
    protected function isBanglaNukta($c)
    {
        return ($c == 'ঁ');
    }

    /**
     * @param $c
     * @return bool
     */
    protected function isBanglaHalant($c)
    {
        return $c == '্';
    }

    /**
     * @param string $c
     *
     * @return bool
     */
    protected function isSpace($c)
    {
        return ($c == ' ' || $c == '\t' || $c == '\n' || $c == '\r');
    }

    /**
     * @param $str
     *
     * @return mixed|string
     */
    protected function reArrangeUnicodeConvertedText($str)
    {

        mb_internal_encoding("UTF-8"); //force multi-byte UTF-8 encoding

        for ($i = 0; $i < mb_strlen($str); ++$i) {

            // Change refs
            if ($i < (mb_strlen($str) - 1) && $this->mbCharAt($str, $i) == 'র' &&
                $this->isBanglaHalant($this->mbCharAt($str, $i + 1)) &&
                !$this->isBanglaHalant($this->mbCharAt($str, $i - 1))
            ) {
                $j = 1;
                while (true) {
                    if ($i - $j < 0) {
                        break;
                    }
                    if ($this->isBanglaBanjonborno($this->mbCharAt($str, $i - $j)) &&
                        $this->isBanglaHalant($this->mbCharAt($str, $i - $j - 1))
                    ) {
                        $j += 2;
                    } else if ($j == 1 && $this->isBanglaKar($this->mbCharAt($str, $i - $j))) {
                        $j++;
                    } else {
                        break;
                    }
                }
                $temp = $this->subString($str, 0, $i - $j);
                $temp .= $this->mbCharAt($str, $i);
                $temp .= $this->mbCharAt($str, $i + 1);
                $temp .= $this->subString($str, $i - $j, $i);
                $temp .= $this->subString($str, $i + 2, mb_strlen($str));
                $str = $temp;
                $i += 1;
                continue;
            }
        }

        $str = $this->doCharMap($str, $this->proConversionMap);


        for ($i = 0; $i < mb_strlen($str); ++$i) {


            if ($i < mb_strlen($str) - 1 && $this->mbCharAt($str, $i) == 'র' &&
                $this->isBanglaHalant($this->mbCharAt($str, $i + 1)) &&
                !$this->isBanglaHalant($this->mbCharAt($str, $i - 1)) &&
                $this->isBanglaHalant($this->mbCharAt($str, $i + 2))
            ) {
                $j = 1;
                while (true) {
                    if ($i - $j < 0) {
                        break;
                    }
                    if ($this->isBanglaBanjonborno($this->mbCharAt($str, $i - $j))
                        && $this->isBanglaHalant($this->mbCharAt($str, $i - $j - 1))
                    ) {
                        $j += 2;
                    } else if ($j == 1 && $this->isBanglaKar($this->mbCharAt($str, $i - $j))) {
                        $j++;
                    } else {
                        break;
                    }
                }
                $temp = $this->subString($str, 0, $i - $j);
                $temp .= $this->mbCharAt($str, $i);
                $temp .= $this->mbCharAt($str, $i + 1);
                $temp .= $this->subString($str, $i - $j, $i);
                $temp .= $this->subString($str, $i + 2, mb_strlen($str));
                $str = $temp;
                $i += 1;
                continue;
            }

            // for 'Vowel + HALANT + Consonant' it should be 'HALANT + Consonant + Vowel'
            if ($i > 0 && $this->mbCharAt($str, $i) == '\u09CD' && ($this->isBanglaKar($this->mbCharAt($str, $i - 1)) ||
                    $this->isBanglaNukta($this->mbCharAt($str, $i - 1))) && $i < mb_strlen($str) - 1
            ) {
                $temp = $this->subString($str, 0, $i - 1);
                $temp .= $this->mbCharAt($str, $i);
                $temp .= $this->mbCharAt($str, $i + 1);
                $temp .= $this->mbCharAt($str, $i - 1);
                $temp .= $this->subString($str, $i + 2, mb_strlen($str));
                $str = $temp;
            }

            // for 'RA (\u09B0) + HALANT + Vowel' it should be 'Vowel + RA (\u09B0) + HALANT'
            if ($i > 0 && $i < mb_strlen($str) - 1 && $this->mbCharAt($str, $i) == '\u09CD' &&
                $this->mbCharAt($str, $i - 1) == '\u09B0' &&
                $this->mbCharAt($str, $i - 2) != '\u09CD' &&
                $this->isBanglaKar($this->mbCharAt($str, $i + 1))
            ) {
                $temp = $this->subString($str, 0, $i - 1);
                $temp .= $this->mbCharAt($str, $i + 1);
                $temp .= $this->mbCharAt($str, $i - 1);
                $temp .= $this->mbCharAt($str, $i);
                $temp .= $this->subString($str, $i + 2, mb_strlen($str));
                $str = $temp;
            }


            // Change pre-kar to post format suitable for unicode
            if ($i < mb_strlen($str) - 1 && $this->isBanglaPreKar($this->mbCharAt($str, $i))
                && $this->isSpace($this->mbCharAt($str, $i + 1)) == false
            ) {
                $temp = $this->subString($str, 0, $i);

                $j = 1;

                while (($i + $j) < mb_strlen($str) - 1 && $this->isBanglaBanjonborno($this->mbCharAt($str, $i + $j))) {
                    if (($i + $j) < mb_strlen($str) && $this->isBanglaHalant($this->mbCharAt($str, $i + $j + 1))) {
                        $j += 2;
                    } else {
                        break;
                    }
                }
                $temp .= $this->subString($str, $i + 1, $i + $j + 1);

                $l = 0;
                if ($this->mbCharAt($str, $i) == 'ে' && $this->mbCharAt($str, $i + $j + 1) == 'া') {
                    $temp .= "ো";
                    $l = 1;
                } else if ($this->mbCharAt($str, $i) == 'ে' && $this->mbCharAt($str, $i + $j + 1) == "ৗ") {
                    $temp .= "ৌ";
                    $l = 1;
                } else {
                    $temp .= $this->mbCharAt($str, $i);
                }
                $temp .= $this->subString($str, $i + $j + $l + 1, mb_strlen($str));
                $str = $temp;
                $i += $j;
            }

            // nukta should be placed after kars
            if ($i < mb_strlen($str) - 1 && $this->isBanglaNukta($this->mbCharAt($str, $i))
                && $this->isBanglaPostKar($this->mbCharAt($str, $i + 1))
            ) {
                $temp = $this->subString($str, 0, $i);
                $temp .= $this->mbCharAt($str, $i + 1);
                $temp .= $this->mbCharAt($str, $i);
                $temp .= $this->subString($str, $i + 2, mb_strlen($str));
                $str = $temp;
            }
        }

        return $str;
    }


    /**
     * @param string $srcString
     *
     * @return mixed|string
     */
    public function convert($srcString)
    {
        $srcString = $this->doCharMap($srcString, $this->preConversionMap);
        $srcString = $this->doCharMap($srcString, $this->conversionMap);
        $srcString = $this->reArrangeUnicodeConvertedText($srcString);
        $srcString = $this->doCharMap($srcString, $this->postConversionMap);
        return $srcString;
    }

    /**
     * @param $text
     * @param $charMap
     *
     * @return mixed
     */
    protected function doCharMap($text, $charMap)
    {
        foreach ($charMap as $srcKey => $keyVal) {
            $format = "@$srcKey@";
            $text = preg_replace($format, $keyVal, $text);
        }

        return $text;
    }

    /**
     * @param $str
     * @param $i
     *
     * returns the $i-th byte of the multi-byte string $str
     * @return string
     */
    protected function mbCharAt($str, $i)
    {
        return mb_substr($str, $i, 1);
    }

    /**
     * @param $string
     * @param $from
     * @param $to
     *
     * returns the javascript '$this->subString' method equivalent
     * @return string
     */
    protected function subString($string, $from, $to)
    {
        return mb_substr($string, $from, $to - $from);
    }
}