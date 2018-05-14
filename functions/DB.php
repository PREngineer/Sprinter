<?php
//echo '<br><br><br><br>Loaded DB';

/*
This contains all of the Database related functions.
*/

/*
*****************************
Region Start - Testing MySQL Setup
*****************************
*/

/*
  Description:
    This function validates if we can open a connection to MySQL.
  @PARAM:
    1. [String] User - The MySQL username
    2. [String] Pass - The MySQL password
    3. [String] Host - The MySQL Host
    4. [String] Port - The MySQL Port
  @RETURN:
    [Boolean] - True  - for success
    [String]  - Error - for failure
*/
Function test_MySQL($dbname, $user, $pass, $host, $port)
{
  // Open Connection
  $link = mysqli_init();

  $connection = mysqli_real_connect(
   $link,
   $host.':'.$port,
   $user,
   $pass
  );

  // If not successful
  if (!$connection)
  {
    mysqli_close();
    return mysqli_connect_error();
  }
  // If connection was successful
  else
  {
    mysqli_close();

    // Save settings to file
    $file = 'functions/settings.php';

    $content = '
    <?php
      $DBUSER = "'  . $user   . '";
      $DBPASS = "'  . $pass   . '";
      $DB     = "'  . $dbname . '";
      $DBHOST = "'  . $host   . '";
      $DBPORT = "'  . $port   . '";
      $DBTYPE = "mysql";
    ?>';

    file_put_contents($file, $content);

    return True;
  }
}


/*
*****************************
Region Start - MySQL DB Setup Functions
*****************************
*/

/*
  Description:
    This function adds an admin user to the Users Table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function create_adminUser()
{
  $pass = hash( 'sha256', SHA1( MD5("password") ) );
  $create = query_DB("INSERT INTO `Users`
                      (`Username`, `Password`, `FName`, `Initials`, `LName`,  `Role`)
                      VALUES ('administrator','" . $pass . "','Administrator','(Default)','The','1')");

  if( $create['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Description:
    This function creates the Database.
  @PARAM:
    1. [String] User - The MySQL username
    2. [String] Pass - The MySQL password
    3. [String] Host - The MySQL Host
    4. [String] Port - The MySQL Port
  @RETURN:
    [Boolean] - True for success
    [Boolean] - False for failure
*/
Function setup_DB($dbname, $user, $pass, $host, $port)
{
  // Join Host + Port
  $url = $host.':'.$port;

  $conn = new mysqli($url, $user, $pass);

  if ( !empty($conn->connect_error) )
  {
      //echo "Errors: " . $conn->connect_error;
      mysqli_close();

      return $conn->connect_error;
  }

  // Create the database
  $sql = "CREATE DATABASE `" . $dbname . "`
          DEFAULT CHARACTER SET = 'utf8'
          DEFAULT COLLATE = 'utf8_general_ci'";

  $dbCreation = $conn->query($sql);

  if ( !empty($conn->error) )
  {
      //echo "Errors: " . $conn->error;
      mysqli_close();

      return $conn->error;
  }

  return $dbCreation;
}

/*
  Description:
    This function creates the Entries table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_EntriesTable()
{
  return query_DB("CREATE TABLE `Entries` ( 
						`ID` INT NOT NULL AUTO_INCREMENT COMMENT 'Entry ID' , 
						`User` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Username' , 
						`SprintID` INT NOT NULL COMMENT 'Sprint ID' , 
						`Data` DOUBLE NOT NULL COMMENT 'Actual Data' , 
						`Recorded` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Timestamp of entry' , 
						PRIMARY KEY (`ID`)
						) 
						ENGINE = InnoDB 
						CHARSET=utf8 
						COLLATE utf8_general_ci 
						COMMENT = 'Contains the entries';");
}

/*
  Description:
    This function creates the Users table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_UsersTable()
{
  return query_DB("CREATE TABLE `Users` (
						`Username` VARCHAR(200) NOT NULL COMMENT 'Username' ,
						`Password` TEXT NOT NULL COMMENT 'Password' ,
						`FName` TEXT NOT NULL COMMENT 'First Name' ,
						`Initials` TEXT NOT NULL COMMENT 'Initials' ,
						`LName` TEXT NOT NULL COMMENT 'Last Name' ,
						`Role` BIGINT NOT NULL COMMENT 'User Role'  ,
						PRIMARY KEY (`Username`)
	)
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all accounts'");
}

/*
  Description:
    This function creates the Sprints table
  @PARAM:
    NONE
  @RETURN:
    [Boolean] - False for failure
    [Array]   - Array if successful
*/
Function setup_SprintsTable()
{
  return query_DB("CREATE TABLE `Sprints` (
						`ID` INT NOT NULL AUTO_INCREMENT COMMENT 'Sprint ID' , 
						`Name` TEXT NOT NULL COMMENT 'Sprint Name' ,
						`Goal` TEXT NOT NULL COMMENT 'Description of the sprint goal' ,
						`Rules` TEXT NOT NULL COMMENT 'Rules of the sprint' ,
						`Start` date NOT NULL COMMENT 'Sprint Start',
						`End` date NOT NULL COMMENT 'Sprint End',
						PRIMARY KEY (`ID`)
	)
    ENGINE  = InnoDB
    CHARSET = utf8
    COLLATE utf8_general_ci
    COMMENT = 'Contains all accounts'");
}

/*
*****************************
Region Start - Regular Use MySQL DB Setup Functions
*****************************
*/

/*
  Description:
    This function opens a connection to the specific database.
  @PARAM:
    NONE
  @RETURN:
    [Connection] - Connection For success
    [Boolean]    - False for failure
*/
Function connect_DB()
{
  // Make sure to load the DB Variables
  if( file_exists('../functions/settings.php') )
  {
    include '../functions/settings.php';
  }
  else
  {
    include 'functions/settings.php';
  }

  // Join Host + Port
  $url = $DBHOST . ':' . $DBPORT;

  //echo 'DBHOST: ' . $DBHOST . ' DBPORT: ' . $DBPORT . ' DBUSER: ' . $DBUSER . ' DBPASS: ' . $DBPASS . ' DB: ' . $DB;

  // Open Connection
  $connection = @mysqli_connect( $url, $DBUSER, $DBPASS, $DB );

  // If not successful
  if (!$connection)
  {
    //echo "An error occurred while connecting to the MySQL DB: " .
    //  mysqli_connect_error();
  	return False;
  }
  else
  {
    //echo "Successfully connected to the Database!";
    return $connection;
  }
}

/*
  Description:
    This function executes a query to the specified database.
  @PARAM:

  @RETURN:
    - If successful
    [Array] - Result = True
            - Data   = Array
    - If failure
    [Array] - Result = False
            - Errors = Array
*/
Function query_DB($query)
{
  $con    = connect_DB();

  $result = mysqli_query($con, $query);

  if( empty( mysqli_error($con) ) )
  {
    // Close connection
    mysqli_close ($con);

    return array( "Result"=>True, "Data"=>$result );
  }
  else
  {
    // Grab the errors
    $errors = mysqli_error($con);

    // Close connection
    mysqli_close($con);

    return array( "Result"=>False, "Errors"=>$errors );
  }
}

/*
  Description:
    This function prevents SQL Injection.
  @PARAM:
    String - A string
  @RETURN:
    String - The sanitized string
*/
Function sanitize($string)
{
  $string = str_replace("'", "", $string);
  $string = str_replace('"', "", $string);
  $string = str_replace("\0", "", $string);
  $string = str_replace("\b", "", $string);
  $string = str_replace("\n", "", $string);
  $string = str_replace("\r", "", $string);
  $string = str_replace("\t", "", $string);
  $string = str_replace("\Z", "", $string);
  $string = str_replace("\\", "", $string);
  $string = str_replace("%", "", $string);
  $string = str_replace("\_", "", $string);
  $string = str_replace("`", "", $string);
  $string = str_replace(";", "", $string);
  $string = str_replace(",", "", $string);
  return $string;
}

/*
*****************************
Region Start - Session Related Session Functions
*****************************
*/

/*
  Description:
    This function checks if the user credentials provided are correct
  @PARAM:
    [Array] - Array containing all the user Data
    1. Username
    2. Password
    3. Role
  @RETURN:
    [Boolean] - False for failure
    [Boolean] - True  for successful
*/
Function check_login($data)
{
  $check = query_DB("SELECT Count(Username)
                      FROM `Users`
                      WHERE `Username` = '" . $data['username'] . "'
                      AND `Password` = '" . $data['password'] . "'");

  if( $check['Result'] )
  {
    return True;
  }
  else
  {
    return False;
  }
}

/*
  Function that validates if the user information is correct to initiate SESSION
  - User in the Login Page
  @Param - Two Strings
  @Return - Boolean (T or F) if correct
*/
function login($username, $password)
{
  // Sanitize the username & password
  //$username = sanitize($username);
  //$password = sanitize($password);

  // Encrypt password with MD5->SHA1->SHA256
  $password = hash( 'sha256', SHA1( MD5($password) ) );

  // Check if the username & password combination exists
  $query = query_DB("SELECT COUNT(`Username`)
                    FROM `Users`
                    WHERE `Username` = '$username'
                    AND `Password` = '$password'");

  if( $query['Result'] )
  {
    if( mysqli_fetch_all($query['Data'])[0][0] == 1 )
    {
      $res = query_DB("SELECT `Username`, `FName`, `Initials`, `LName`, `Role`
                        FROM `Users`
                        WHERE `Username` = '$username'
                        AND `Password` = '$password'");
      return $res;
    }
    else
    {
      return False;
    }
  }
  else
  {
    return $query['Errors'];
  }
}

/*
*****************************
Region Start - Regular Use MySQL DB Get Functions
*****************************
*/

/*
  Description:
    This function executes a query to get the leaderboard.
  @PARAM:

  @RETURN:
    [Array]   - Data
    [Boolean] - False
*/
Function get_Leaderboard()
{
  $date = date('Y-m-d');

  $result = query_DB("SELECT *
                      FROM `Entries`
                      WHERE `Date` > '$date'
                      AND `Approved` = 1
                      AND `Deleted` = 0
                      ORDER BY `Date`,`Start`");

  if( $result['Result'] )
  {
    return mysqli_fetch_all( $result['Data'] );
  }
  else
  {
    return $result['Errors'];
  }
}

/*
*****************************
Region Start - Regular Use MySQL DB Insert Functions
*****************************
*/

/*
  Description:
    This function executes a query to insert data to the entries table.
  @PARAM:
    [Array]   - The event data
  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function insert_Entry($data)
{
  $text = nl2br($data['Text']);

  // Update the Events Table
  $result = query_DB( "UPDATE `Announcements`
                       SET `Title`   = '" . sanitize($data['Title']) . "',
                           `Content` = '" . sanitize($text)          . "',
                           `Expires` = '" . sanitize($data['Date'])  . "'
                       WHERE `ID` = '" . sanitize($data['id']) . "'"
                    );

  // If successful
  if( $result['Result'] )
  {
    return True;
  }
  else
  {
    return $result['Errors'];
  }
}

/*
  Description:
    This function executes a query to get the Sprint's data.
  @PARAM:
    [date]   - Sprint active day
  @RETURN:
    [Boolean] - True
    [Array]   - Errors
*/
Function 
get_SprintData($date)
{
	$result = query_DB("SELECT *
                      FROM `Sprints`
                      WHERE `Start` <= '$date'
					  AND   `End`   >= '$date'");

	if( $result['Result'] )
	{
		return mysqli_fetch_all( $result['Data'] );
	}
	else
	{
		return $result['Errors'];
	}
}

?>