<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Css\FontAwesome;
use Yii\Asset\Tests\Support\TestTrait;
use Yiisoft\Assets\AssetBundle;

use function runkit_constant_redefine;

final class FontAwesomeTest extends \PHPUnit\Framework\TestCase
{
    use TestTrait;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesome::class));

        $this->assetManager->register(FontAwesome::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesome::class));
        $this->assertSame(
            ['/55145ba9/all.css' => ['/55145ba9/all.css']],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/all.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/all.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
    }

    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesome::class));

        $this->assetManager->register(FontAwesome::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesome::class));
        $this->assertSame(
            ['/55145ba9/all.min.css' => ['/55145ba9/all.min.css']],
            $this->assetManager->getCssFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/all.min.css');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.min.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/all.css');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/55145ba9/fontawesome.css');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
