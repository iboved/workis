<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
 */
class Category
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="Job", mappedBy="category", cascade={"remove"})
     */
    private $jobs;

    /**
     * @ORM\OneToMany(targetEntity="Resume", mappedBy="category", cascade={"remove"})
     */
    private $resumes;

    /**
     * @ORM\Column(name="slug", type="string", length=255)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->resumes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add jobs
     *
     * @param \AppBundle\Entity\Job $jobs
     * @return Category
     */
    public function addJob(\AppBundle\Entity\Job $jobs)
    {
        $this->jobs[] = $jobs;

        return $this;
    }

    /**
     * Remove jobs
     *
     * @param \AppBundle\Entity\Job $jobs
     */
    public function removeJob(\AppBundle\Entity\Job $jobs)
    {
        $this->jobs->removeElement($jobs);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * Add resumes
     *
     * @param \AppBundle\Entity\Resume $resumes
     * @return Category
     */
    public function addResume(\AppBundle\Entity\Resume $resumes)
    {
        $this->resumes[] = $resumes;

        return $this;
    }

    /**
     * Remove resumes
     *
     * @param \AppBundle\Entity\Resume $resumes
     */
    public function removeResume(\AppBundle\Entity\Resume $resumes)
    {
        $this->resumes->removeElement($resumes);
    }

    /**
     * Get resumes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResumes()
    {
        return $this->resumes;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Category
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    public function __toString()
    {
        return $this->title;
    }
}
