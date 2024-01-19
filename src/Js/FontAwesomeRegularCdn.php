<?php

declare(strict_types=1);

namespace Yii\Asset\Js;

use Yiisoft\Assets\AssetBundle;

final class FontAwesomeRegularCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $js = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/regular.min.js'];
    public array $jsOptions = [
        'integrity' => 'sha512-T4H/jsKWzCRypzaFpVpYyWyBUhjKfp5e/hSD234qFO/h45wKAXba+0wG/iFRq1RhybT7dXxjPYYBYCLAwPfE0Q==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $depends = [Depend\DependCdn::class];
}
