<?php

declare(strict_types=1);

namespace Yii\Asset\Css;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class FontAwesomeRegular extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@fontawesome-free/css';

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $cssFiles = $environment === 'prod' ? 'regular.min.css' : 'regular.css';
        $fontAwesomeFile = $environment === 'prod' ? 'fontawesome.min.css' : 'fontawesome.css';

        $this->css = [$cssFiles];
        $this->publishOptions = [
            'filter' => $pathMatcher->only("**/css/{$cssFiles}", "**/{$fontAwesomeFile}", '**/webfonts/fa-regular*'),
        ];
    }
}
