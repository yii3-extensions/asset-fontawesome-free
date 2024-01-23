<?php

declare(strict_types=1);

namespace Yii\Asset\Css;

use Yiisoft\Assets\AssetBundle;

/**
 * FontAwesome brand CDN CSS bundle.
 */
final class FontAwesomeBrandCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.css'];
    public array $cssOptions = [
        'integrity' => 'sha512-aMFlN2yPSsRLLv40LrRPFMO0SGMs088xIKOngrwCpudSrf2vL/Q6gdHOmq6zSjDeow4PBaLtA932MuIu6mmYVw==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $depends = [Depend\DependCdn::class];
}
