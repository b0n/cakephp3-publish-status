<?php

namespace PublishStatus\Model\Entity;

interface PublishStatusInterface
{
    public function getPublishStatusField();

    public function getPublishValue();

    public function getDraftValue();
}
