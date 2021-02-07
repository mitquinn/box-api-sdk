<?php


namespace Mitquinn\BoxApiSdk\Resources;


use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

class ClassificationResource extends BaseResource
{

    use HasType;

    /** @var bool $canEdit */
    protected bool $canEdit;

    /** @var string $parent */
    protected string $parent;

    /** @var string $scope */
    protected string $scope;

    /** @var string $template */
    protected string $template;

    /** @var int $typeVersion */
    protected int $typeVersion;

    /** @var int $version */
    protected int $version;

    /** @var string $Box__Security__Classification__Key */
    protected string $Box__Security__Classification__Key;


    /**
     * Todo: This resource is a cluster fuck.
     * @see https://developer.box.com/reference/resources/classification/
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return bool
     */
    public function isCanEdit(): bool
    {
        return $this->canEdit;
    }

    /**
     * @param bool $canEdit
     * @return ClassificationResource
     */
    public function setCanEdit(bool $canEdit): ClassificationResource
    {
        $this->canEdit = $canEdit;
        return $this;
    }

    /**
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * @param string $parent
     * @return ClassificationResource
     */
    public function setParent(string $parent): ClassificationResource
    {
        $this->parent = $parent;
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
     * @return ClassificationResource
     */
    public function setScope(string $scope): ClassificationResource
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return ClassificationResource
     */
    public function setTemplate(string $template): ClassificationResource
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeVersion(): int
    {
        return $this->typeVersion;
    }

    /**
     * @param int $typeVersion
     * @return ClassificationResource
     */
    public function setTypeVersion(int $typeVersion): ClassificationResource
    {
        $this->typeVersion = $typeVersion;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return ClassificationResource
     */
    public function setVersion(int $version): ClassificationResource
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return string
     */
    public function getBoxSecurityClassificationKey(): string
    {
        return $this->Box__Security__Classification__Key;
    }

    /**
     * @param string $Box__Security__Classification__Key
     * @return ClassificationResource
     */
    public function setBoxSecurityClassificationKey(string $Box__Security__Classification__Key): ClassificationResource
    {
        $this->Box__Security__Classification__Key = $Box__Security__Classification__Key;
        return $this;
    }

    /*** End Getters and Setters ***/
}