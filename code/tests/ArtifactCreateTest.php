<?php

use App\Actions\CreateArtifact;
use App\Application;
use App\Artifact;
use App\Shop;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ArtifactCreateTest extends TestCase
{
    /**
     * @var Shop|MockObject
     */
    private $shopStub;

    public function setUp(): void
    {
        Application::init();

        $this->shopStub = $this->mockShopClass();
    }

    /**
     * ArtifactCreateTest constructor.
     */
    public function testArtifactCreate()
    {
        $data = [
            'title' => 'Some new artifact',
            'attributes' => 'Armor:1000;Speed:150',
            'modifiers' => "-10% to Cold Resistance \n -5% to Happiness",
            'description' => 'Some test description',
            'price' => 666
        ];

        $createArtifactAction = new CreateArtifact($this->shopStub);
        $result = $createArtifactAction->execute($data);

        $this->assertIsObject($result);
        $this->assertEquals(Artifact::class, get_class($result));

        $this->assertIsInt($result->id);
        $this->assertEquals(6, $result->id);

        $this->assertIsArray($result->attributes);
        $this->assertEquals(2, count($result->attributes));
        $this->assertArrayHasKey('name', $result->attributes[0]);
        $this->assertArrayHasKey('value', $result->attributes[0]);
        $this->assertEquals('Armor', $result->attributes[0]['name']);
        $this->assertEquals(1000, $result->attributes[0]['value']);

        $this->assertIsArray($result->modifiers);
        $this->assertEquals(2, count($result->modifiers));

        $this->assertEquals($data['description'], $result->description);

        $this->assertIsFloat($result->price);
        $this->assertEquals($data['price'], $result->price);
    }

    /**
     * Mock Shop Class
     *
     * @return MockObject
     */
    private function mockShopClass(): MockObject
    {
        $shopStub = $this->createMock(Shop::class);
        $shopStub->method('getGoods')
            ->willReturn(array_fill(0, 5, 1));

        return $shopStub;
    }
}
