<?php

namespace DAObdd;

    use \Exception as Exception;
    use DAObdd\QueryType as QueryType;
    use Models\Photo as Photo;

    class PhotoDao
    {
        private $tableName = "images";

        public function Add(Photo $photo)
        {
            try
            {
                $query = "CALL images_add(?);";
                
                $parameters["name"] = $photo->getName();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters, QueryType::StoredProcedure);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $imageList = array();

                $query = "SELECT imageId, name FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $photo = new Photo();
                    //$photo->setId($row["imageId"]);
                    $photo->setName($row["name"]);

                    array_push($imageList, $photo);
                }

                return $imageList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        function GetByImageId($imageId)
        {
            try
            {
                $photo = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE imageId = :imageId";

                $parameters["imageId"] = $imageId;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);
                
                foreach ($resultSet as $row)
                {                
                    $photo = new Photo();
                    $photo->setImageId($row["imageId"]);
                    $photo->setName($row["name"]);
                }

                return $photo;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
Footer
© 2022 GitHub, Inc.
Footer navigation
Terms
Privacy
Security
Status
Docs
Contact GitHub
