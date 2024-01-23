<?php

declare(strict_types=1);

namespace Yii\Asset\Css\Depend;

use Yiisoft\Assets\AssetBundle;

/**
 * FontAwesome CDN CSS bundle.
 */
final class DependCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css'];
    public array $cssOptions = [
        'integrity' => 'sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
}
