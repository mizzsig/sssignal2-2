<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PostBodyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

		/**
		 * MongoDBのBodyを分解！
		 */
		public function writeBody($body)
		{
				if (is_array($body)) {
						$str = '';
						foreach ($body as $value) {
								if (is_array($value['body'])) {
										$str .= '<div class="' . $value['class'] . '">' . $this->writeBody($value['body']) . '</div>';
								} else {
										$str .= '<div class="' . $value['class'] . '">' . $value['body'] . '</div>';
								}
						}
						
						return $str;
				}
		}

		public function __construct()
		{
		}
}
