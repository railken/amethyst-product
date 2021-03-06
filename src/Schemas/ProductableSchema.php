<?php

namespace Amethyst\Schemas;

use Amethyst\Managers\ProductManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class ProductableSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\BelongsToAttribute::make('origin_id')
                ->setRelationName('origin')
                ->setRelationManager(ProductManager::class)
                ->setRequired(true),
            Attributes\BelongsToAttribute::make('product_id')
                ->setRelationName('product')
                ->setRelationManager(ProductManager::class)
                ->setRequired(true),
            Attributes\EnumAttribute::make('key', config('amethyst.product.data.productable.attributes.key.options')),
            Attributes\NumberAttribute::make('quantity'),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
        ];
    }
}
