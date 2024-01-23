<?php

declare(strict_types=1);

namespace Yii\Asset\Js;

use Yiisoft\Assets\AssetBundle;

/**
 * FontAwesome all CDN JS bundle.
 */
final class FontAwesomeCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $js = ['https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js'];
    public array $jsOptions = [
        'integrity' => 'sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
}
