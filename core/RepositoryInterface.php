<?php
/**
 * Created by PhpStorm.
 * User: padbrain
 * Date: 29/05/18
 * Time: 11:36
 */

namespace Lastcar\core;

use Lastcar\Models\EntityModel;

interface RepositoryInterface
{
    public function getAll(EntityModel $pPointer);
    public function getAllBy(EntityModel $pPointer, array $pPropVal);
}