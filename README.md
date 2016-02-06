# inlinecss
Inline CSS Generator


```PHP
$css = new \Undercloud\InlineCss;

$css->color      = '#282828';
$css->lineHeight = 1.5;
$css->fontSize   = '36px';

echo '<h1 style="' . $css . '">Hello I\'m inline CSS</h1>';
```
or 
```PHP
echo '<style>' . $css('h1') . '</style>';
```
