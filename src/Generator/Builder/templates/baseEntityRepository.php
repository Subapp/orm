<?php

use Subapp\Orm\Collection\Collection;
use Subapp\Orm\Core\ResultSet\ResultSetIterator;
use Subapp\Orm\Generator\Builder\EntityBuilder;
use Subapp\Orm\Generator\Template\Template;
use Subapp\Orm\Schema\Field;
use Subapp\Orm\Schema\Table;

/**
 * @var $this          Template
 * @var $table         Table
 * @var $primaryFields Collection|Field[]
 * @var $namespace     string
 */

echo "<?php\n";

echo $this->render('templates/phpdocInfo.php') . PHP_EOL . PHP_EOL;
echo $this->render('templates/phpdocImportant.php') . PHP_EOL;

$class = sprintf(EntityBuilder::BASE_ENTITY_REPOSITORY_TEMPLATE, $table->getClassifyName());
$commonClass = sprintf(EntityBuilder::ENTITY_REPOSITORY_TEMPLATE, $table->getClassifyName());

$namespaceCommonClass = sprintf('%s\\%s', $namespace, $commonClass);

$entityClass = sprintf(EntityBuilder::ENTITY_TEMPLATE, $table->getClassifyName());
$namespaceEntityClass = sprintf('%s\\%s', $namespace, $entityClass);

$resultSetReflection = new ReflectionClass(ResultSetIterator::class);

?>

namespace <?php echo $namespace; ?>\Base;

use Subapp\Orm\Core\Repository;
use Subapp\Sql\Ast\Condition;
use Subapp\Sql\Ast\Stmt;
use <?php echo $namespaceCommonClass; ?>;
use <?php echo $namespaceEntityClass; ?>;
use <?php echo $resultSetReflection->getName(); ?>;

/**
 * Magic methods for query-builder and access to the fields data
 *
<?php foreach ($table->getFields() as $field): ?>
 * @method <?php echo $entityClass; ?> findOneBy<?php echo $field->getClassifyName(); ?>($<?php echo $field->getColumn(); ?>);
 * @method <?php echo $resultSetReflection->getShortName(); ?> findBy<?php echo $field->getClassifyName(); ?>($<?php echo $field->getColumn(); ?>);
 * @method <?php echo $commonClass; ?> filterBy<?php echo $field->getClassifyName(); ?>($<?php echo $field->getColumn(); ?>, $cmp = Condition\Operator::EQ);
 * @method <?php echo $commonClass; ?> orderBy<?php echo $field->getClassifyName(); ?>($vector = Stmt\OrderBy::ASC);
 * @method <?php echo $commonClass; ?> groupBy<?php echo $field->getClassifyName(); ?>();
<?php endforeach; ?>
*/

class <?php echo $class; ?> extends Repository
{

    /**
    * <?php echo $class; ?> constructor.
    */
    public function __construct()
    {
        parent::__construct(<?php echo $entityClass; ?>::class);
    }

    /**
    * @param integer $id Identifier
    * @return <?php echo $entityClass; ?> Entity instance
    */
    public static function findByPK($id)
    {
        /** @var <?php echo $entityClass; ?> $entity */
        $repository = new <?php echo $commonClass; ?>();
        $entity = $repository->retrieve($id);

        return $entity;
    }

}
