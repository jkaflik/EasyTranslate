<?php

class Language
{
    const AFRIKAANS             = 'af';
    const ALBANIAN              = 'sq';
    const ARABIC                = 'ar';
    const BELARUSIAN            = 'be';
    const BULGARIAN             = 'bg';
    const CATALAN               = 'ca';
    const CHINESE_SIMPLIFIED    = 'zh-CN';
    const CHINESE_TRADITIONAL   = 'zh-TW';
    const CROATIAN              = 'hr';
    const CZECH                 = 'cs';
    const DANISH                = 'da';
    const DUTCH                 = 'nl';
    const ENGLISH               = 'en';
    const ESTONIAN              = 'et';
    const FILIPINO              = 'tl';
    const FINNISH               = 'fi';
    const FRENCH                = 'fr';
    const GALICIAN              = 'gl';
    const GERMAN                = 'de';
    const GREEK                 = 'el';
    const HAITIAN_CREOLE        = 'ht';
    const HEBREW                = 'iw';
    const HINDI                 = 'hi';
    const HUNGARIAN             = 'hu';
    const ICELANDIC             = 'is';
    const INDONESIAN            = 'id';
    const IRISH                 = 'ga';
    const ITALIAN               = 'it';
    const JAPANESE              = 'ja';
    const LATVIAN               = 'lv';
    const LITHUANIAN            = 'lt';
    const MACEDONIAN            = 'mk';
    const MALAY                 = 'ms';
    const MALTESE               = 'mt';
    const NORWEGIAN             = 'no';
    const PERSIAN               = 'fa';
    const POLISH                = 'pl';
    const PORTUGESE             = 'pt';
    const ROMANIAN              = 'ro';
    const RUSSIAN               = 'ru';
    const SERBIAN               = 'sr';
    const SLOVAK                = 'sk';
    const SLOVENIAN             = 'sl';
    const SPANISH               = 'es';
    const SWAHILI               = 'sw';
    const SWEDISH               = 'sv';
    const THAI                  = 'th';
    const TURKISH               = 'tr';
    const UKRAINIAN             = 'uk';
    const VIETNAMESE            = 'vi';
    const WELSH                 = 'cy';
    const YIDDISH               = 'yi';
    
    /**
     * Converts ISO country code to human readable language name ;)
     * @param Language $code
     * @return string
     */
    public static function readable( $code )
    {
        $oClass = new ReflectionClass('Language');
        return strtolower( str_replace('_', ' ', end( array_keys( $oClass->getConstants(), $code ) ) ) );
    }
}

class EasyTranslate
{
    /**
    https://www.googleapis.com/language/translate/v2?key=&q=flowers&source=en&target=fr
    */
    
    public static $key = null;
    
    /**
     * Translate by using Google Translate API
     * @param mixed $input
     * @param Language $target
     * @param Language $source
     * @return mixed translated text(s)
     */
    public static function translate( $input, $target, $source = -1 )
    {
        if( !self::$key )
            throw new Exception("Please set key before try to translate");
        
        $o = self::_request( array('q' => $input, 'target' => $target, 'source' => $source ) );

        if( count( $o->data->translations ) == 1 )
                return $o->data->translations[0]->translatedText;
        
        $t = array();
        
        foreach( $o->data->translations as $v )
        {
            $t[] = $v->translatedText;
        }
        
        return $t;
    }
    
    /**
     * Detects language of sentence
     * @param string $input
     * @return Language
     */
    public static function detect( $input )
    {
        $o = self::_request( array('q' => urlencode($input), 'target' => Language::POLISH ) );
        return $o->data->translations[0]->detectedSourceLanguage;
    }
    
    protected static function _request( $args )
    {
        $args += array( 'key' => self::$key );
        
        $p = array();
        
        foreach( $args as $k => $v )
        {
            if( $v == -1 ) continue;
            
            if( is_array( $v ) )
            {
                $t = array();
                
                foreach( $v as $vv )
                {
                    $t[] = $k . "=" .  urlencode( $vv );
                }
                
                $p[] = implode("&",$t);
                
                continue;
            }
            
            $p[] = $k . "=" .  urlencode( $v );
        }
        
        return json_decode( file_get_contents( "https://www.googleapis.com/language/translate/v2?" . implode("&",$p) ) );
    }
}
