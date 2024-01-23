<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use Yii\Asset\Js\FontAwesomeCdn;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeCdn::class));

        $this->assetManager->register(FontAwesomeCdn::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeCdn::class));
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
