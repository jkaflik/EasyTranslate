<?php

require_once 'easytranslate.php';

EasyTranslate::$key = '';

echo EasyTranslate::translate( "Please don't use this recipe if your situation is not the one described in the question. This recipe is for fixing a bad merge, and replaying your good commits onto a fixed merge.", Language::CROATIAN );
echo PHP_EOL;