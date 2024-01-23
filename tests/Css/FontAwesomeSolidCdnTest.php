<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use Yii\Asset\Css\FontAwesomeSolidCdn;
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
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css',
                    'integrity' => 'sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
                'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css' => [
                    'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css',
                    'integrity' => 'sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getCssFiles()
        );
    }
}
