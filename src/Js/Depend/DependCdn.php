<?php

declare(strict_types=1);

namespace Yii\Asset\Js\Depend;

use Yiisoft\Assets\AssetBundle;

/**
 * FontAwesome CDN JS bundle.
 */
final class DependCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $js = ['https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js'];
}
