<?php

$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
echo strip_tags($text);
echo "\n";

echo strip_tags($text, '<p>');
echo "\n";
echo urldecode("Ant%C3%B4nio+Carlos+Jobim");

echo $cleanurl = trim(preg_replace('/ +/', '', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($text))))));
