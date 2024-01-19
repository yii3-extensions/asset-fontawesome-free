<?php

declare(strict_types=1);

namespace Yii\Asset\Js;

use Yiisoft\Assets\AssetBundle;

final class FontAwesomeBrandCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $js = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/brands.min.js'];
    public array $jsOptions = [
        'integrity' => 'sha512-giAmE8KpCT6HP3DEwIvW9LYVnDs79iIaKEYFTjH62EWoglWgdAJa1ahiLUfoc3NFaAeWM6E3VdQyH1Ob2dmwQw==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $depends = [Depend\DependCdn::class];
}
