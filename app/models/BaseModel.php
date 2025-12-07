<?php
/**
 * Base Model class
 * All models should extend this class
 * Provides database connection and common methods
 */

class BaseModel {
    protected $db;
    protected static $connection = null;
    
    public function __construct() {
        if (self::$connection === null) {
            try {
                $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
                self::$connection = new PDO(
                    $dsn,
                    DB_USER,
                    DB_PASS,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
                    ]
                );
            } catch (PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage());
                throw new Exception("Database connection failed");
            }
        }
        $this->db = self::$connection;
    }
    
    /**
     * Get all records from a table
     * @param string $table Table name
     * @param array $conditions WHERE conditions
     * @param string $orderBy ORDER BY clause
     * @param int $limit LIMIT clause
     * @return array Array of records
     */
    protected function getAll($table, $conditions = [], $orderBy = null, $limit = null) {
        $sql = "SELECT * FROM `{$table}`";
        $params = [];
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "`{$key}` = :{$key}";
                $params[$key] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        if ($orderBy) {
            $sql .= " ORDER BY {$orderBy}";
        }
        
        if ($limit) {
            $sql .= " LIMIT " . (int)$limit;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    
    /**
     * Get a record by ID
     * @param string $table Table name
     * @param int $id Record ID
     * @return array|null Record data or null
     */
    protected function getById($table, $id) {
        $stmt = $this->db->prepare("SELECT * FROM `{$table}` WHERE `id` = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
    
    /**
     * Create a new record
     * @param string $table Table name
     * @param array $data Data to insert
     * @return int|false Inserted ID or false on failure
     */
    protected function create($table, $data) {
        $columns = [];
        $placeholders = [];
        $params = [];
        
        foreach ($data as $key => $value) {
            $columns[] = "`{$key}`";
            $placeholders[] = ":{$key}";
            $params[$key] = $value;
        }
        
        $columnsStr = implode(', ', $columns);
        $placeholdersStr = implode(', ', $placeholders);
        $sql = "INSERT INTO `{$table}` ({$columnsStr}) VALUES ({$placeholdersStr})";
        
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute($params)) {
            return $this->db->lastInsertId();
        }
        return false;
    }
    
    /**
     * Update a record
     * @param string $table Table name
     * @param int $id Record ID
     * @param array $data Data to update
     * @return bool Success status
     */
    protected function update($table, $id, $data) {
        $set = [];
        $params = ['id' => $id];
        
        foreach ($data as $key => $value) {
            $set[] = "`{$key}` = :{$key}";
            $params[$key] = $value;
        }
        
        $setStr = implode(', ', $set);
        $sql = "UPDATE `{$table}` SET {$setStr} WHERE `id` = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }
    
    /**
     * Delete a record
     * @param string $table Table name
     * @param int $id Record ID
     * @return bool Success status
     */
    protected function delete($table, $id) {
        $stmt = $this->db->prepare("DELETE FROM `{$table}` WHERE `id` = :id");
        return $stmt->execute(['id' => $id]);
    }
    
    /**
     * Execute raw SQL query
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return PDOStatement
     */
    protected function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    /**
     * Get count of records
     * @param string $table Table name
     * @param array $conditions WHERE conditions
     * @return int Count
     */
    protected function count($table, $conditions = []) {
        $sql = "SELECT COUNT(*) as count FROM `{$table}`";
        $params = [];
        
        if (!empty($conditions)) {
            $where = [];
            foreach ($conditions as $key => $value) {
                $where[] = "`{$key}` = :{$key}";
                $params[$key] = $value;
            }
            $sql .= " WHERE " . implode(" AND ", $where);
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch();
        return (int)$result['count'];
    }
}

