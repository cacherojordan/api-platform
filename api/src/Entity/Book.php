<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A book.
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class Book
{
    /**
     * @var int The id of this book.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Isbn
     *
     * @var string|null The ISBN of this book (or null if doesn't have one).
     *
     * @ORM\Column(nullable=true)
     */
    public $isbn;

    /**
     * @Assert\NotBlank
     *
     * @var string The title of this book.
     *
     * @ORM\Column
     */
    public $title;

    /**
     * @var string The description of this book.
     *
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @Assert\NotBlank
     *
     * @var string The author of this book.
     *
     * @ORM\Column
     */
    public $author;

    /**
     * @Assert\NotNull
     *
     * @var \DateTimeInterface The publication date of this book.
     *
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;

    /**
     * @var Review[] Available reviews for this book.
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="book", cascade={"persist", "remove"})
     */
    public $reviews;

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    /**
     * Get book id.
     *
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
