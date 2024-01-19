<?php

declare(strict_types=1);

namespace Yii\Asset\Tests\Css;

use Yii\Asset\Css\Depend\DependCdn;
use Yii\Asset\Css\FontAwesomeBrandCdn;
use Yii\Asset\Tests\Support\TestTrait;
use Yiisoft\Assets\AssetBundle;

final class FontAwesomeBrandCdnTest extends \PHPUnit\Framework\TestCase
{
    use TestTrait;

    public function testRegister(): void
    {
        $this->assertFalse($this->assetManager->isRegisteredBundle(FontAwesomeBrandCdn::class));

        $this->assetManager->register(FontAwesomeBrandCdn::class);


        $bundle = $this->assetManager->getBundle(FontAwesomeBrandCdn::class);

        $this->assertInstanceOf(AssetBundle::class, $bundle);
        $this->assertSame(DependCdn::class, $bundle->depends[0]);
        $this->assertSame(
            [
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css' => [
                    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css',
                    'integrity' => 'sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
                'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.css' => [
                    'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.css',
                    'integrity' => 'sha512-aMFlN2yPSsRLLv40LrRPFMO0SGMs088xIKOngrwCpudSrf2vL/Q6gdHOmq6zSjDeow4PBaLtA932MuIu6mmYVw==',
                    'crossorigin' => 'anonymous',
                    'referrerpolicy' => 'no-referrer',
                ],
            ],
            $this->assetManager->getCssFiles()
        );
    }
}
