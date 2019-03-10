<?php
/**
 * Generated By Subapp\Orm Generator
 * @author Ivan Hontarenko
 */

/**
 * IMPORTANT:
 *      Don't edit this file!
 *      This file was generated automatically, and it can happen again
 *      and as a consequence it will overwrite your changes.
 */

namespace IdPorn\Dbl\Base;

use Subapp\Orm\Core\Repository;
use Subapp\Sql\Ast\Condition;
use Subapp\Sql\Ast\Stmt;
use IdPorn\Dbl\StarRepository;
use IdPorn\Dbl\Star;
use Subapp\Orm\Core\ResultSet\ResultSetIterator;

/**
 * Magic methods for query-builder and access to the fields data
 *
 * @method Star findOneById($id);
 * @method ResultSetIterator findById($id);
 * @method StarRepository filterById($id, $cmp = Condition\Operator::EQ);
 * @method StarRepository orderById($vector = Stmt\OrderBy::ASC);
 * @method StarRepository groupById();
 * @method Star findOneByName($name);
 * @method ResultSetIterator findByName($name);
 * @method StarRepository filterByName($name, $cmp = Condition\Operator::EQ);
 * @method StarRepository orderByName($vector = Stmt\OrderBy::ASC);
 * @method StarRepository groupByName();
 * @method Star findOneByCreatedAt($created_at);
 * @method ResultSetIterator findByCreatedAt($created_at);
 * @method StarRepository filterByCreatedAt($created_at, $cmp = Condition\Operator::EQ);
 * @method StarRepository orderByCreatedAt($vector = Stmt\OrderBy::ASC);
 * @method StarRepository groupByCreatedAt();
*/

class BaseStarRepository extends Repository
{

    /**
    * BaseStarRepository constructor.
    */
    public function __construct()
    {
        parent::__construct(Star::class);
    }

    /**
    * @param integer $id Identifier
    * @return Star Entity instance
    */
    public static function findByPK($id)
    {
        /** @var Star $entity */
        $repository = new StarRepository();
        $entity = $repository->retrieve($id);

        return $entity;
    }

}
