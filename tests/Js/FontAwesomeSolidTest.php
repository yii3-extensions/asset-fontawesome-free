<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Js;

use PHPUnit\Framework\Attributes\RequiresPhp;
use Yii\Asset\Js\FontAwesomeSolid;
use Yii\Asset\Tests\Support\TestTrait;
use Yiisoft\Assets\AssetBundle;

use function runkit_constant_redefine;

final class FontAwesomeSolidTest extends \PHPUnit\Framework\TestCase
{
    use TestTrait;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeSolid::class));

        $this->assetManager->register(FontAwesomeSolid::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesomeSolid::class));
        $this->assertSame(
            ['/16b8de20/solid.js' => ['/16b8de20/solid.js']],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/solid.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/solid.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
    }

    #[RequiresPhp('8.1')]
    public function testRegisterWithEnvironmentProd(): void
    {
        @runkit_constant_redefine('YII_ENV', 'prod');

        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeSolid::class));

        $this->assetManager->register(FontAwesomeSolid::class);

        $this->assertInstanceOf(AssetBundle::class, $this->assetManager->getBundle(FontAwesomeSolid::class));
        $this->assertSame(
            ['/16b8de20/solid.min.js' => ['/16b8de20/solid.min.js']],
            $this->assetManager->getJsFiles()
        );
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/solid.min.js');
        $this->assertFileExists(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.min.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/solid.js');
        $this->assertFileDoesNotExist(dirname(__DIR__) . '/Support/runtime/16b8de20/fontawesome.js');

        @runkit_constant_redefine('YII_ENV', 'test');
    }
}
