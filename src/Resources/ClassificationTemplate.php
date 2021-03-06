<?php


namespace Mitquinn\BoxApiSdk\Resources;


use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

class ClassificationTemplate extends Resource
{
    use HasId, HasType;

    /** @var bool $copyInstanceOnItemCopy */
    protected bool $copyInstanceOnItemCopy;

    /** @var string $displayName */
    protected string $displayName;

    /** @var array $fields */
    protected array $fields;

    /** @var bool $hidden */
    protected bool $hidden;

    /** @var string $scope */
    protected string $scope;

    /** @var string $templateKey */
    protected string $templateKey;

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

        if ($dot->has('copyInstanceOnItemCopy')) {
            $this->setCopyInstanceOnItemCopy($dot->get('copyInstanceOnItemCopy'));
        }

        if ($dot->has('displayName')) {
            $this->setDisplayName($dot->get('displayName'));
        }

        if ($dot->has('fields')) {
            $this->setFields($dot->get('fields'));
        }

        if ($dot->has('hidden')) {
            $this->setHidden($dot->get('hidden'));
        }

        if ($dot->has('scope')) {
            $this->setScope($dot->get('scope'));
        }

        if ($dot->has('templateKey')) {
            $this->setTemplateKey($dot->get('templateKey'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return bool
     */
    public function isCopyInstanceOnItemCopy(): bool
    {
        return $this->copyInstanceOnItemCopy;
    }

    /**
     * @param bool $copyInstanceOnItemCopy
     * @return ClassificationTemplate
     */
    public function setCopyInstanceOnItemCopy(bool $copyInstanceOnItemCopy): ClassificationTemplate
    {
        $this->copyInstanceOnItemCopy = $copyInstanceOnItemCopy;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     * @return ClassificationTemplate
     */
    public function setDisplayName(string $displayName): ClassificationTemplate
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param array $fields
     * @return ClassificationTemplate
     */
    public function setFields(array $fields): ClassificationTemplate
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }

    /**
     * @param bool $hidden
     * @return ClassificationTemplate
     */
    public function setHidden(bool $hidden): ClassificationTemplate
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return ClassificationTemplate
     */
    public function setScope(string $scope): ClassificationTemplate
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateKey(): string
    {
        return $this->templateKey;
    }

    /**
     * @param string $templateKey
     * @return ClassificationTemplate
     */
    public function setTemplateKey(string $templateKey): ClassificationTemplate
    {
        $this->templateKey = $templateKey;
        return $this;
    }

    /*** End Getters and Setters ***/

}