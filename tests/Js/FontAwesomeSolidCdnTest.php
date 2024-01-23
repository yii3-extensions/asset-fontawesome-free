<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use Yii\Asset\Js\FontAwesomeSolidCdn;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeSolidCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeSolidCdn::class));

        $this->assetManager->register(FontAwesomeSolidCdn::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeSolidCdn::class));
        $this->assertSame(
            [
                'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js' => [
                    'https://use.fontawesome.com/releases/v.6.5.1/js/fontawesome.js',
                ],
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/solid.min.js' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/solid.min.js',
                    'integrity' => 'sha512-+fI924YJzeYFv7M0R29zJvRThPinSUOAmo5rpR9v6G4eWIbva/prHdZGSPN440vuf781/sOd/Fr+5ey0pqdW9w==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getJsFiles()
        );
    }
}
