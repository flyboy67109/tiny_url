<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\TinyURLRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TinyURLRepository::class)
 */
class TinyURL
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $full_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tiny_url;

    /**
     * id getter
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * fullUrl getter
     *
     * @return string|null
     */
    public function getFullUrl(): ?string
    {
        return $this->full_url;
    }

    /**
     * fluent setter for FullUrl
     *
     * @param string $full_url
     *
     * @return $this
     */
    public function setFullUrl(string $full_url): self
    {
        $this->full_url = $full_url;

        return $this;
    }

    /**
     * getter TinyUrl
     *
     * @return string|null
     */
    public function getTinyUrl(): ?string
    {
        return $this->tiny_url;
    }

    /**
     * fluent setter for TinyUrl
     *
     * @param string $tiny_url
     *
     * @return $this
     */
    public function setTinyUrl(string $tiny_url): self
    {
        $this->tiny_url = $tiny_url;

        return $this;
    }
}
