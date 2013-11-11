<?php

use Tester\Assert;
$container = require __DIR__ . '/bootstrap.php';

require __DIR__.'/storage/dummy.php';

$trans = new \LiveTranslator\Translator(new DummyStorage, $container->session);

Assert::exception(function() use($trans){
	$trans->translate('');
}, 'LiveTranslator\TranslatorException');

$trans->setAvailableLanguages(array(
	'en', 'cz'
));

Assert::exception(function() use($trans){
	$trans->setCurrentLang('de');
}, 'LiveTranslator\TranslatorException');

Assert::exception(function() use($trans){
	$trans->setDefaultLang('de');
}, 'LiveTranslator\TranslatorException');

$trans = new \LiveTranslator\Translator(new DummyStorage(), $container->session);

$trans->setDefaultLang('de');

Assert::exception(function() use($trans){
	$trans->setAvailableLanguages(array(
		'en', 'cz'
	));
}, 'LiveTranslator\TranslatorException');

$trans = new \LiveTranslator\Translator(new DummyStorage(), $container->session);

$trans->setCurrentLang('de');

Assert::exception(function() use($trans){
	$trans->setAvailableLanguages(array(
		'en', 'cz'
	));
}, 'LiveTranslator\TranslatorException');