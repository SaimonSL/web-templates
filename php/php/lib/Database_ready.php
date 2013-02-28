<?php
/**
* Description of database
*
* @author saimon lovell
*/

class SystemDatabase 
{
  private static $link = NULL;
  
  public static function OpenConnection()
  {
      self::$link = mysql_connect(MYSQL_DATABASE_CONNECTION, MYSQL_DATABASE_USER, MYSQL_DATABASE_PASSWORD);
          if (!self::$link)
                  die("Error Database connection: " . mysql_error());
          
          if (!mysql_select_db(MYSQL_DATABASE_NAME , self::$link))
                  die("Error Database selection: " . mysql_error());
  }
  
  
   /**
   *  Execute Query (Write)
   *  You can also execute multiple queries in one shot.
   * @param string $query
   * @return int
   */
  public static final function Query($query)
  {
      $id = NULL;
          if (is_array($query))
          {
              foreach ($query as $query)
              {
                  if (mysql_query($query, self::$link) or die(mysql_error()))
                          $id = mysql_insert_id(self::$link);
                  else
                          die("Error Database connection: " . mysql_error());
              }
          } else {
              if (mysql_query($query, self::$link) or die(mysql_error()))
                      $id = mysql_insert_id(self::$link);
              else
                      die("Error Database connection: " . mysql_error());
          }

          return $id;
  }

  
  /**
   * Read single dimention array (single row of data).
   * You can also pass multiple queries as array and get all the answer in one shot.
   * @param string or array of queries $query
   * @return array
   */
  public static final function QueryData($query)
  {
    $ret = NULL;

    if (is_array($query))
    {
        foreach ($query as $key => $query)
        {
            $result = mysql_query($query, self::$link) or die(mysql_error());

            if (count($result) >= 1)
                $ret[$key] = $result;
            else
                $ret[$key] = NULL;
            mysql_free_result($result);
        }
    } else
    {
        if ($result = mysql_query($query, self::$link) or die(mysql_error()))
        {
            try
            {
                    $mem = mysql_fetch_assoc($result);

                    if (count($mem) >= 1)
                            $ret = $mem;

                    unset($mem);
                    mysql_free_result($result);

            } catch (Exception $e)
            {
                    $this->mysql_error = $e->getMessage();
            }
        }
    }

          return $ret;
  }



  /**
   * Read multi dimention array (multiple rows of data).
   * You can also pass multiple queries as array and get all the answer in one shot.
   * @param string or array of queries $query
   * @return array
   */
  public static  final function QueryMassData($query)
  {
    $ret = NULL;

    if (is_array($query))
    {
        foreach ($query as $key => $query)
        {
            if ($result = mysql_query($query, self::$link) or die(mysql_error()))
            {
                    while ($row = mysql_fetch_assoc($result))	{	$ret[$key][] = $row;	}
                    if (!isset($ret[$key])) $ret[$key] = NULL;
                    mysql_free_result($result);
            }
        }
    } else
    {
        if ($result = mysql_query($query, self::$link) or die(mysql_error()))
        {
                while ($row = mysql_fetch_assoc($result))	{	$ret[] = $row;	}
                mysql_free_result($result);
        }
    }

    return $ret;
  }

  
  
  public static function CloseConnection()
  {
    mysql_close(self::$link);
  }
  

}
?>