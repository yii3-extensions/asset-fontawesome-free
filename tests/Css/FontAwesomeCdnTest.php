<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use Yii\Asset\Css\FontAwesomeCdn;
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
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
                    'integrity' => 'sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getCssFiles()
        );
    }
}
