<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use Yii\Asset\Js\FontAwesomeBrandCdn;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeBrandCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeBrandCdn::class));

        $this->assetManager->register(FontAwesomeBrandCdn::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeBrandCdn::class));
        $this->assertSame(
            [
                'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js' => [
                    'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js',
                ],
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/brands.min.js' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/brands.min.js',
                    'integrity' => 'sha512-giAmE8KpCT6HP3DEwIvW9LYVnDs79iIaKEYFTjH62EWoglWgdAJa1ahiLUfoc3NFaAeWM6E3VdQyH1Ob2dmwQw==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getJsFiles()
        );
    }
}
