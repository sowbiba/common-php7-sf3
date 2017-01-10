<?php
// src/AppBundle/Entity/Thread.php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use FOS\CommentBundle\Model\ThreadInterface;
use FOS\MessageBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 */
class Thread extends BaseThread implements ThreadInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @var \FOS\MessageBundle\Model\ParticipantInterface
     */
    protected $createdBy;

    /**
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\Message",
     *   mappedBy="thread"
     * )
     * @var Message[]|Collection
     */
    protected $messages;

    /**
     * @ORM\OneToMany(
     *   targetEntity="AppBundle\Entity\ThreadMetadata",
     *   mappedBy="thread",
     *   cascade={"all"}
     * )
     * @var ThreadMetadata[]|Collection
     */
    protected $metadata;

    protected $permalink;

    protected $commentable;

    /**
     * @param string
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Url of the page where the thread lives
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * @param  string
     * @return null
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Tells if new comments can be added in this thread
     *
     * @return bool
     */
    public function isCommentable()
    {$this->commentable = true;
        return $this->commentable;
    }

    /**
     * @param bool $isCommentable
     */
    public function setCommentable($isCommentable)
    {
        $this->commentable = $isCommentable;

        return $this;
    }

    /**
     * Gets the number of comments
     *
     * @return integer
     */
    public function getNumComments()
    {
        // TODO: Implement getNumComments() method.
    }

    /**
     * Sets the number of comments
     *
     * @param integer $numComments
     */
    public function setNumComments($numComments)
    {
        // TODO: Implement setNumComments() method.
    }

    /**
     * Increments the number of comments by the supplied
     * value.
     *
     * @param  integer $by The number of comments to increment by
     * @return integer The new comment total
     */
    public function incrementNumComments($by)
    {
        // TODO: Implement incrementNumComments() method.
    }

    /**
     * Denormalized date of the last comment
     * @return DateTime
     */
    public function getLastCommentAt()
    {
        // TODO: Implement getLastCommentAt() method.
    }

    /**
     * @param  DateTime
     * @return null
     */
    function setLastCommentAt($lastCommentAt)
    {
        // TODO: Implement setLastCommentAt() method.
    }
}