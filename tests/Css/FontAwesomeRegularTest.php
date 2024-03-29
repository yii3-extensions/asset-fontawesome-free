<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Css\FontAwesomeRegular;
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
                '/55145ba9/regular.css' => ['/55145ba9/regular.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/regular.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/regular.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
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
                '/55145ba9/regular.min.css' => ['/55145ba9/regular.min.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/regular.min.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/regular.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
