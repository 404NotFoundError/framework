<?php 

namespace App\Entity;

use Tool\Entity\EntityInterface;

class Project  implements EntityInterface
{

    use \Tool\Entity\EntityBundle;

    private $id,
            $name,
            $owner,
            $workers,
            $date_create;
    
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner(int $ownerId)
    {
        $this->owner = $ownerId;
        return $this;
    }

    public function getWorkers()
    {
        return  unserialize($this->workers);
    }

    public function setWorkers(array $workers)
    {
        $this->workers = serialize($workers);
        return $this;
    }

    public function getDateCreate()
    {
        return $this->date_create;
    }

    public function setDateCreate($date)
    {
        $this->date_create = $date;
        return $this;
    }
    
    
}
