<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use Yii\Asset\Js\FontAwesomeRegularCdn;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeRegularCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeRegularCdn::class));

        $this->assetManager->register(FontAwesomeRegularCdn::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeRegularCdn::class));
        $this->assertSame(
            [
                'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js' => [
                    'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js',
                ],
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/regular.min.js' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/regular.min.js',
                    'integrity' => 'sha512-T4H/jsKWzCRypzaFpVpYyWyBUhjKfp5e/hSD234qFO/h45wKAXba+0wG/iFRq1RhybT7dXxjPYYBYCLAwPfE0Q==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getJsFiles()
        );
    }
}
