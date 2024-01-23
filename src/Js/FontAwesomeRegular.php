<?php

declare(strict_types=1);

namespace Yii\Asset\Js;

use Yiisoft\Assets\AssetBundle;
use Yiisoft\Files\PathMatcher\PathMatcher;

use function defined;

/**
 * FontAwesome regular JS bundle.
 */
final class FontAwesomeRegular extends AssetBundle
{
    public string|null $basePath = '@assets';
    public string|null $baseUrl = '@assetsUrl';
    public string|null $sourcePath = '@fontawesome-free/js';

    public function __construct()
    {
        $pathMatcher = new PathMatcher();

        $environment = defined('YII_ENV') ? YII_ENV : 'prod';
        $jsFiles = $environment === 'prod' ? 'regular.min.js' : 'regular.js';
        $fontAwesomeFile = $environment === 'prod' ? 'fontawesome.min.js' : 'fontawesome.js';

        $this->js = [$jsFiles];
        $this->publishOptions = [
            'filter' => $pathMatcher->only("**/js/$jsFiles", "**/$fontAwesomeFile", '**/webfonts/fa-regular*'),
        ];
    }
}
