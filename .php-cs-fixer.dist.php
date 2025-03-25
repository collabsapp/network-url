<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'php_unit_method_casing' => ['case' => 'snake_case'],
        'mb_str_functions' => true,
        'phpdoc_to_comment' => false,
        'phpdoc_separation' => false,
        'trailing_comma_in_multiline' => ['elements' => ['array_destructuring', 'arrays', 'match']],
        'nullable_type_declaration_for_default_null_value' => false,
    ])
    ->setFinder($finder)
    ;
