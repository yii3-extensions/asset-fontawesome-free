<?php

declare(strict_types=1);

namespace Yii\Asset\Css;

use Yiisoft\Assets\AssetBundle;

final class FontAwesomeSolidCdn extends AssetBundle
{
    public bool $cdn = true;
    public array $css = ['href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css'];
    public array $cssOptions = [
        'integrity' => 'sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA==',
        'crossorigin' => 'anonymous',
        'referrerpolicy' => 'no-referrer',
    ];
    public array $depends = [Depend\DependCdn::class];
}
