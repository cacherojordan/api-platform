<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A review of a book.
 *
 * @ORM\Entity
 *
 * @ApiResource
 */
class Review
{
    /**
     * @var int The id of this review.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Range(min=0, max=5)
     *
     * @var int The rating of this review (between 0 and 5).
     *
     * @ORM\Column(type="smallint")
     */
    public $rating;

    /**
     * @Assert\NotBlank
     *
     * @var string the body of the review.
     *
     * @ORM\Column(type="text")
     */
    public $body;

    /**
     * @Assert\NotBlank
     *
     * @var string The author of the review.
     *
     * @ORM\Column
     */
    public $author;

    /**
     * @Assert\NotNull
     *
     * @var \DateTimeInterface The date of publication of this review.
     *
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;

    /**
     * @Assert\NotNull
     *
     * @var Book The book this review is about.
     *
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="reviews")
     */
    public $book;

    /**
     * Get review id.
     *
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
