<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Js\FontAwesome;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

use function runkit_constant_redefine;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesome::class));

        $this->assetManager->register(FontAwesome::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesome::class));
        $this->assertSame(
            [
                '/16b8de20/all.js' => ['/16b8de20/all.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/all.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/all.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
    }

    /**
     * @throws InvalidConfigException
     */
    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesome::class));

        $this->assetManager->register(FontAwesome::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesome::class));
        $this->assertSame(
            [
                '/16b8de20/all.min.js' => ['/16b8de20/all.min.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/all.min.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/all.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
