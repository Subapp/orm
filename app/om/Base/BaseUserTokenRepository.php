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
use CvLand\PhpDatabaseLayer\UserTokenRepository;
use CvLand\PhpDatabaseLayer\UserToken;
use Subapp\Orm\Core\ResultSet\ResultSetIterator;

/**
 * Magic methods for query-builder and access to the fields data
 *
 * @method UserToken findOneById($id);
 * @method ResultSetIterator findById($id);
 * @method UserTokenRepository filterById($id, $cmp = Cmp::EQ);
 * @method UserTokenRepository orderById($vector = OrderBy::ASC);
 * @method UserTokenRepository groupById();
 * @method UserToken findOneByUserId($userId);
 * @method ResultSetIterator findByUserId($userId);
 * @method UserTokenRepository filterByUserId($userId, $cmp = Cmp::EQ);
 * @method UserTokenRepository orderByUserId($vector = OrderBy::ASC);
 * @method UserTokenRepository groupByUserId();
 * @method UserToken findOneByToken($token);
 * @method ResultSetIterator findByToken($token);
 * @method UserTokenRepository filterByToken($token, $cmp = Cmp::EQ);
 * @method UserTokenRepository orderByToken($vector = OrderBy::ASC);
 * @method UserTokenRepository groupByToken();
 * @method UserToken findOneByCreated($created);
 * @method ResultSetIterator findByCreated($created);
 * @method UserTokenRepository filterByCreated($created, $cmp = Cmp::EQ);
 * @method UserTokenRepository orderByCreated($vector = OrderBy::ASC);
 * @method UserTokenRepository groupByCreated();
*/

class BaseUserTokenRepository extends Repository
{

    /**
    * BaseUserTokenRepository constructor.
    */
    public function __construct()
    {
        parent::__construct(UserToken::class);
    }

    /**
    * @param integer $id Identifier
    * @return UserToken Entity instance
    */
    public static function findByPK($id)
    {
        /** @var UserToken $entity */
        $repository = new UserTokenRepository();
        $entity = $repository->retrieve($id);

        return $entity;
    }

}
