<?php
$input='<p>I love Software University<p>';
echo strip_tags($input, '<p>').PHP_EOL;
$input="<h1>Hello World</h1>";
echo strip_tags($input, '<h1>');