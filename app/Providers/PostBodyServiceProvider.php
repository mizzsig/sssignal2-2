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
     * MongoDBのBodyを分解
     */
    public function writeBody($body)
    {
        if (is_array($body)) {
            $str = '';
            foreach ($body as $value) {
                // DBの値に応じたDOM要素を出力
                if (is_array($value['body'])) {
                    $str .= '<' . $value['type'] 
                         . (isset($value['id']) ? ' id="' . $value['id'] . '"' : '')
                         . (isset($value['class']) ? ' class="' . $value['class'] . '"' : '') 
                         . (isset($value['option']) ? ' ' . $value['option'] : '') 
                         . '>' 
                         . $this->writeBody($value['body']) 
                         . '</' . $value['type'] . '>';
                } else {
                    $str .= '<' . $value['type'] 
                         . (isset($value['id']) ? ' id="' . $value['id'] . '"' : '')
                         . (isset($value['class']) ? ' class="' . $value['class'] . '"' : '') 
                         . (isset($value['option']) ? ' ' . $value['option'] : '') 
                         . '>' 
                         . $value['body']
                         . '</' . $value['type'] . '>';
                }
            }

            return $str;
        }
    }

    /**
     * ページ特有のスクリプトを設置する
     * 
     * @param  string $scripts['file'] 読み込むファイルパス
     * @param  bool   $scripts['async'] 非同期で読み込むかどうか
     * @return string $str 読み込むスクリプトファイルを指定したDOM
     */
    public function writeScript($scripts)
    {
        if (isset($scripts) && is_array($scripts)) {
            $str = '';
            
            foreach ($scripts as $script) {
                $str .= '<script src="' . $script['file'] . '"';

                if ($script['async']) {
                    $str .= ' async';
                }

                $str .= '></script>';
            }

            return $str;
        }
    }

    /**
     * ページ特有のCSSを設置する
     */
    public function writeStyle($styles)
    {
        if (isset($styles) && is_array($styles)) {
            $str = '';

            foreach ($styles as $style) {
                $str .= '<link rel="stylesheet" type="text/css" href="' . $style['file'] . '">';
            }

            return $str;
        }
    }

    public function __construct()
    {
    }
}
