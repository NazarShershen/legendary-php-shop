<?php


namespace App\Actions;

use App\Artifact;
use App\Shop;

class CreateArtifact
{
    private $shop;

    /**
     * CreateArtifact constructor.
     */
    public function __construct()
    {
        $this->shop = new Shop();
    }

    /**
     * Create artifact
     *
     * @param array $data
     * @return Artifact
     */
    public function execute(array $data): Artifact
    {
        $preparedData['id'] = count($this->shop->getGoods()) + 1;
        $preparedData['title'] = trim($data['title']);
        $preparedData['attributes'] = $this->parseAttributes($data['attributes']);
        $preparedData['modifiers'] = $this->parseModifiers(trim(strip_tags($data['modifiers'])));
        $preparedData['flavour_text'] = trim(strip_tags($data['description']));
        $preparedData['price'] = floatval($data['price']);
        $preparedData['image_url'] = null;

        return new Artifact($preparedData);
    }

    /**
     * Parse attributes
     *
     * @param string $stringOfAttributes
     * @return array
     */
    private function parseAttributes(string $stringOfAttributes): array
    {
        $attributesArray = explode(';', $stringOfAttributes);

        $parsedAttributes = array_map(function ($item) {
            $attribute = explode(':', $item);
            return [
                'name' => trim($attribute[0]),
                'value' => trim($attribute[1])
            ];
        }, $attributesArray);

        return $parsedAttributes;
    }

    /**
     * Parse modifiers
     *
     * @param string $stringOfModifiers
     * @return array
     */
    private function parseModifiers(string $stringOfModifiers): array
    {
        $modifiers = explode(PHP_EOL, $stringOfModifiers);

        foreach ($modifiers as &$modifier) {
            $modifier = trim($modifier);
        }

        return $modifiers;
    }
}
