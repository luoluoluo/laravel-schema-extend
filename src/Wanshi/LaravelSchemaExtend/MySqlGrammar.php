<?php 
namespace Wanshi\LaravelSchemaExtend;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Connection;

class MySqlGrammar extends \Illuminate\Database\Schema\Grammars\MySqlGrammar
{
    /**
     * construct
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Compile a create table command.
     *
     * @param  \Illuminate\Database\Schema\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @param  \Illuminate\Database\Connection  $connection
     * @return string
     */
    public function compileCreate(Blueprint $blueprint, Fluent $command, Connection $connection)
    {
        $sql = parent::compileCreate($blueprint, $command, $connection);

        // 表注释
        if (isset($blueprint->comment)) {
            $sql .= ' comment = ' . "'" . $blueprint->comment . "'";
        }

        // ROW_FORMAT 支持
        if (isset($blueprint->rowFormat)) {
            $sql .= ' row_format = ' . $blueprint->rowFormat;
        }
        return $sql;
    }

}
