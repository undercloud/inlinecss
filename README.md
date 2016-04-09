# inlinecss
Inline CSS Generator

##Install
```composer require undercloud/inlinecss```

##Basic example
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

##Predefined properties
```PHP
$css = new \Undercloud\InlineCss(
	array(
		'textAlign' => 'left',
		'display'   => 'inline-block',
		'position'  => 'relative'
	)
);
```

##Values
For adding values use object assign
```PHP
$css->color = '#282828';
```
or use function ```add```
```PHP
$css->add('color', '#282828');
```