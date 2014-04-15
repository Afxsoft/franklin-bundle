<?php

namespace Fkl\FranklinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Image
 */
class Image
{
    const SERVER_PATH_TO_IMAGE_FOLDER = 'images/produits';

/**
 * Unmapped property to handle file uploads
 */
private $file;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setFile(UploadedFile $file = null)
{
    $this->file = $file;
}

    public function __toString()
{
        return (string) $this->filename;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFile()
{
    return $this->file;
}

/**
 * Manages the copying of the file to the relevant place on the server
 */
public function upload()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }
    $time=time();

    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and target filename as params
    $this->getFile()->move(
        Image::SERVER_PATH_TO_IMAGE_FOLDER,
        $time.'_'.$this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->filename = $time.'_'.$this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFile(null);
}

/**
 * Lifecycle callback to upload the file to the server
 */
public function lifecycleFileUpload() {
    $this->upload();
}

/**
 * Updates the hash value to force the preUpdate and postUpdate events to fire
 */
public function refreshUpdated() {
    $this->setUpdated(date('Y-m-d H:i:s'));
}
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $filename;

    /**
     * @var string
     */
    private $updated;

    /**
     * @var \Fkl\FranklinBundle\Entity\Produit
     */
    private $produit;


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
     * Set filename
     *
     * @param string $filename
     * @return Image
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set updated
     *
     * @param string $updated
     * @return Image
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set produit
     *
     * @param \Fkl\FranklinBundle\Entity\Produit $produit
     * @return Image
     */
    public function setProduit(\Fkl\FranklinBundle\Entity\Produit $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Fkl\FranklinBundle\Entity\Produit 
     */
    public function getProduit()
    {
        return $this->produit;
    }

 
}
