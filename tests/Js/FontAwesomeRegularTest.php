<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Js\FontAwesomeRegular;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\Exception\InvalidConfigException;

use function runkit_constant_redefine;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
final class FontAwesomeRegularTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    /**
     * @throws InvalidConfigException
     */
    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeRegular::class));

        $this->assetManager->register(FontAwesomeRegular::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeRegular::class));
        $this->assertSame(
            [
                '/16b8de20/regular.js' => ['/16b8de20/regular.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/regular.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/regular.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
    }

    /**
     * @throws InvalidConfigException
     */
    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeRegular::class));

        $this->assetManager->register(FontAwesomeRegular::class);

        $this->assertTrue($this->assetManager->isRegisteredBundle(FontAwesomeRegular::class));
        $this->assertSame(
            [
                '/16b8de20/regular.min.js' => ['/16b8de20/regular.min.js'],
            ],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/regular.min.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/regular.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
