<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      dbConnector.php
     * @brief     This model is used to connect with the database
     * @author    Created by eliott
     * @version   1.0 (09.06.2021)
     */

    /**
     * @brief Open a connexion with the MySQL server
     * @return PDO|null
     * @throws ModelDataExeption
     */
    function openDBConnexion(): ?PDO
    {
        $tempDBConnexion = null;
        require_once "Model/jsonManager.php";
        try {
            $infos = getJsonContent("Data/dbAuthentification.json");

            $dataServerName = $infos["sqlDriver"]. ':host=' .$infos["hostName"]. ';dbname=' .$infos["dbName"].';port='.$infos["port"].';charset='.$infos["charset"].';';
            try{
                $tempDBConnexion = new PDO($dataServerName,$infos["userName"],$infos["userPassword"]);
            }catch (PDOException $exception){
                throw new ModelDataExeption("BDDConnexion",0);
            }
        } catch (JsonManagerException $e) {
            throw new ModelDataExeption("NoBDDConnexionInfos",0);
        }
        return $tempDBConnexion;
    }

    /**
     * @brief This function id designed to execute a query received as a parameter
     * @param $query - Sql query
     * @param $infosArray - Additionnals (optional) parameters with SQL query
     * @return array|null - Query Result
     * @throws ModelDataExeption - If error in BDD Connection
     * @link Php.net - pdo prepare
     */
    function executeQuerySelect($query,$infosArray): ?array
    {
        $queryResult = null;
        $dbConnexion = openDBConnexion();
        if($dbConnexion != null){
            $statement = $dbConnexion->prepare($query);
            $statement->execute($infosArray);
            $queryResult = $statement->fetchAll();
        }
        $dbConnexion = null;
        return $queryResult;
    }

    /**
     * @brief This function is designed to execute sql into the MySQL Database with no return
     * @param $query - Sql query
     * @param $infosArray - Additionnals (optional) parameters with SQL query
     * @throws ModelDataExeption
     */
    function executeQuery($query,$infosArray){
        $dbConnexion = openDBConnexion();
        if($dbConnexion != null){
            $statement = $dbConnexion->prepare($query);
            $statement->execute($infosArray);
        }
        $dbConnexion = null;
    }

    /**
     * Class ModelDataExeption - To manage special BDD Model exeption
     */
    class ModelDataExeption extends Exception{

    }
?>