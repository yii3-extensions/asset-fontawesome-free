<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use Yii\Asset\Js\FontAwesomeCdn;
use Yii\Asset\Tests\Support\TestTrait;
use Yiisoft\Assets\AssetBundle;

final class FontAwesomeCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestTrait;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeCdn::class));

        $this->assetManager->register(FontAwesomeCdn::class);


        $bundle = $this->assetManager->getBundle(FontAwesomeCdn::class);

        $this->assertInstanceOf(AssetBundle::class, $bundle);
        $this->assertSame(
            [
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js',
                    'integrity' => 'sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getJsFiles()
        );
    }
}
