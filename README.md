## EasyTranslate  - Google Translate in PHP

This library uses Google Translate API to make elegance translations in PHP

### Example of usage:
    EasyTranslate::$key = 'YOUR-GOOGLE-API-KEY-HERE';
    
    echo EasyTranslate::translate('Ich war pianist', Language::POLISH) . "\n";
    echo EasyTranslate::translate('Jestem kotem.', Language::ENGLISH) . "\n";
    
    var_dump( EasyTranslate::translate(
            array(
                'Byłam Ewą!',
                'I\'ll stay here.',
                'Ich war pianist'
            ), Language::CZECH)
    );
    
    echo "`Byl jsem klavírista` detected as: " . Language::readable( EasyTranslate::detect("Byl jsem klavírista") ) . "\n";</code></pre>

### TODO:

* gettext like method ex. _("Moje wydatki: %d zł", 52) shoud result "My expenses: 52 zł"
* built-in caching

### Author:

* Jakub Kaflik - kofels@gmail.com

### License:

(The MIT License)

Copyright © 2011 Jakub Kaflik

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the ‘Software’), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED ‘AS IS’, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.