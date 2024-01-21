<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Css\FontAwesomeSolid;
use Yii\Asset\Tests\Support\TestSupport;
use Yiisoft\Assets\AssetBundle;

use function runkit_constant_redefine;

final class FontAwesomeSolidTest extends \PHPUnit\Framework\TestCase
{
    use TestSupport;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeSolid::class));

        $this->assetManager->register(FontAwesomeSolid::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesomeSolid::class));
        $this->assertSame(
            [
                '/55145ba9/solid.css' => ['/55145ba9/solid.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/solid.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/solid.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
    }

    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeSolid::class));

        $this->assetManager->register(FontAwesomeSolid::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesomeSolid::class));
        $this->assertSame(
            [
                '/55145ba9/solid.min.css' => ['/55145ba9/solid.min.css'],
            ],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/solid.min.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/solid.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
