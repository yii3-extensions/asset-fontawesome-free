<?php

declare(strict_types=1);

namespace Yii\Asset\Js;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

final class FontAwesome extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@fontawesome-free/js';

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $jsFiles = $environment === 'prod' ? 'all.min.js' : 'all.js';
        $fontAwesomeFile = $environment === 'prod' ? 'fontawesome.min.js' : 'fontawesome.js';

        $this->js = [$jsFiles];
        $this->publishOptions = [
            'filter' => $pathMatcher->only("**/js/{$jsFiles}", "**/{$fontAwesomeFile}", '**/webfonts/*'),
        ];
    }
}
