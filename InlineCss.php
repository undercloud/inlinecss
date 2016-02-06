<?php
	namespace Undercloud;

	class InlineCss
	{
		private $storage = array();
		
		public function __construct(array $storage = array())
		{
			foreach ($storage as $key => $value) {
				$this->add($key, $value);
			}
		}
		
		public function add($key, $value)
		{
			$key = $this->normalizeKey($key);
		
			$this->storage[$key] = $value;
			
			return $this;
		}
		
		public function __set($key, $value)
		{
			return $this->add($key, $value);
		}
		
		public function __get($key)
		{
			return (isset($this->storage[$key]) ? $this->storage[$key] : null);
		}

		public function __invoke($selector = null)
		{
			return $this->inline($selector);
		}
		
		private function normalizeKey($key)
		{
			return preg_replace_callback('~[A-Z]~', function($match){
				return '-' . strtolower($match[0]);
			}, $key);
		}
		
		public function inline($selector = null)
		{
			$inline = implode(';', call_user_func_array(
				'array_map',
				array(
					function($key, $value){
						return $key . ':' . $value;
					},
					array_keys($this->storage),
					array_values($this->storage)
				)
			));
			
			if (null !== $selector) {
				return $selector . '{' . $inline . '}';
			} else {
				return $inline;
			}
		}
		
		public function __toString()
		{
			return $this->inline();
		}
	}
?>