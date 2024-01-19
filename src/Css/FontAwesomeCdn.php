<?php

declare(strict_types=1);

namespace Yii\Asset\Css;

use Yiisoft\Assets\AssetBundle;

final class FontAwesomeCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    ];
    public array $cssOptions = [
        'integrity' => 'sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
}
