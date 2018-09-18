<?php
/**
 * Generated By Subapp\Orm Generator
 * @author Ivan Hontarenko
 *
 * IMPORTANT:
 *      Don't edit this file!
 *      This file was generated automatically, and it can happen again
 *      and as a consequence it will overwrite your changes.
 */

namespace CvLand\PhpDatabaseLayer\Base;

use Subapp\Orm\Core\Repository;
use Subapp\Orm\Query\Statement\Comparison\Cmp;
use Subapp\Orm\Query\Statement\OrderBy;
use CvLand\PhpDatabaseLayer\SystemUserRepository;
use CvLand\PhpDatabaseLayer\SystemUser;
use Subapp\Orm\Core\ResultSet\ResultSetIterator;

/**
 * Magic methods for query-builder and access to the fields data
 *
 * @method SystemUser findOneById($id);
 * @method ResultSetIterator findById($id);
 * @method SystemUserRepository filterById($id, $cmp = Cmp::EQ);
 * @method SystemUserRepository orderById($vector = OrderBy::ASC);
 * @method SystemUserRepository groupById();
 * @method SystemUser findOneByName($name);
 * @method ResultSetIterator findByName($name);
 * @method SystemUserRepository filterByName($name, $cmp = Cmp::EQ);
 * @method SystemUserRepository orderByName($vector = OrderBy::ASC);
 * @method SystemUserRepository groupByName();
 * @method SystemUser findOneByPassword($password);
 * @method ResultSetIterator findByPassword($password);
 * @method SystemUserRepository filterByPassword($password, $cmp = Cmp::EQ);
 * @method SystemUserRepository orderByPassword($vector = OrderBy::ASC);
 * @method SystemUserRepository groupByPassword();
 * @method SystemUser findOneByAccess($accessBitMask);
 * @method ResultSetIterator findByAccess($accessBitMask);
 * @method SystemUserRepository filterByAccess($accessBitMask, $cmp = Cmp::EQ);
 * @method SystemUserRepository orderByAccess($vector = OrderBy::ASC);
 * @method SystemUserRepository groupByAccess();
 * @method SystemUser findOneByCreated($created);
 * @method ResultSetIterator findByCreated($created);
 * @method SystemUserRepository filterByCreated($created, $cmp = Cmp::EQ);
 * @method SystemUserRepository orderByCreated($vector = OrderBy::ASC);
 * @method SystemUserRepository groupByCreated();
*/

class BaseSystemUserRepository extends Repository
{

    /**
    * BaseSystemUserRepository constructor.
    */
    public function __construct()
    {
        parent::__construct(SystemUser::class);
    }

    /**
    * @param integer $id Identifier
    * @return SystemUser Entity instance
    */
    public static function findByPK($id)
    {
        /** @var SystemUser $entity */
        $repository = new SystemUserRepository();
        $entity = $repository->retrieve($id);

        return $entity;
    }

}
