<?php

declare(strict_types=1);

namespace Yii\Asset\Css;

use Yiisoft\Assets\AssetBundle;

final class FontAwesomeRegularCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/regular.min.css'];
    public array $cssOptions = [
        'integrity' => 'sha512-TzeemgHmrSO404wTLeBd76DmPp5TjWY/f2SyZC6/3LsutDYMVYfOx2uh894kr0j9UM6x39LFHKTeLn99iz378A==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $depends = [Depend\DependCdn::class];
}
