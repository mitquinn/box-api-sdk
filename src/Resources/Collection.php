<?php


namespace Mitquinn\BoxApiSdk\Resources;


use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

class Collection extends Resource
{
    use HasId, HasType, HasName;

    /** @var string $collection_type */
    protected string $collection_type;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $dot = new Dot($response);

        if ($dot->has('id')) {
            $this->setId($dot->get('id'));
        }

        if ($dot->has('type')) {
            $this->setType($dot->get('type'));
        }

        if ($dot->has('collection_type')) {
            $this->setCollectionType($dot->get('collection_type'));
        }

        if ($dot->has('name')) {
            $this->setName($dot->get('name'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getCollectionType(): string
    {
        return $this->collection_type;
    }

    /**
     * @param string $collection_type
     * @return Collection
     */
    public function setCollectionType(string $collection_type): Collection
    {
        $this->collection_type = $collection_type;
        return $this;
    }

    /*** End Getters and Setters ***/

}