<?php


namespace App\Models;
use \Facades\DB;

class User  extends \Core\Model
{
    public static function login($username, $password)
    {
        return DB::getInstance()->table('users')->where('email', '=', $username)->where('active', '=','1')->get();
    }

    public static function find($id)
    {
        return DB::getInstance()->select()->table(self::getTable())->where('id', '=', $id)->get();
    }

    public static function save( $data)
    {
        return DB::getInstance()->table(self::getTable())->insert($data);
    }


    public static function update($id, array $data)
    {
        return DB::getInstance()->table(self::getTable())->where('id', '=', $id)->update($data);
    }

    public static function all()
    {
        return DB::getInstance()->table(self::getTable())->order('id', 'ASC')->get();
    }

    public static function allPaginated($limit, $page =0)
    {
         return DB::getInstance()->table(self::getTable())->order('id', 'ASC')->paginate($limit, $page);
    }

    public static function delete($id)
    {
        return DB::getInstance()->table(self::getTable())->delete('id', '=', $id);
    }

    public static function graph()
    {
        return DB::getInstance()->raw('SELECT  count(id) as total, DATE_FORMAT(created_at, "%M/%Y" )  as date from users
                                         group by DATE_FORMAT(created_at, "%M/%Y" )');
    }

    public static function permission($id)
	{
		return DB::getInstance()->select()->table('user_permission')->where('user_id',"=",$id)->get();
	}

    public static function updatePermission($id,array $data)
    {
        return DB::getInstance()->table('user_permission')->where('id', '=', $id)->update($data);
    }


     /**
     * Retorna o nome da tabela
     * @return string
     */
    public static function getTable()
    {
        return 'users';
    }
}
