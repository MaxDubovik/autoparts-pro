<?php
/**
 * Base Model class
 * All models should extend this class
 * Provides database connection and common methods
 */

class BaseModel {
    protected $db;
    
    public function __construct() {
        // TODO: Initialize database connection when database is configured
        // Example:
        // $this->db = new PDO(
        //     "mysql:host=localhost;dbname=autoparts_db;charset=utf8mb4",
        //     "username",
        //     "password",
        //     [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        // );
    }
    
    /**
     * Get all records from a table
     * @param string $table Table name
     * @return array Array of records
     */
    protected function getAll($table) {
        // TODO: Implement when database is configured
        // $stmt = $this->db->query("SELECT * FROM {$table}");
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [];
    }
    
    /**
     * Get a record by ID
     * @param string $table Table name
     * @param int $id Record ID
     * @return array|null Record data or null
     */
    protected function getById($table, $id) {
        // TODO: Implement when database is configured
        // $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE id = :id");
        // $stmt->execute(['id' => $id]);
        // return $stmt->fetch(PDO::FETCH_ASSOC);
        return null;
    }
    
    /**
     * Create a new record
     * @param string $table Table name
     * @param array $data Data to insert
     * @return int|false Inserted ID or false on failure
     */
    protected function create($table, $data) {
        // TODO: Implement when database is configured
        // $columns = implode(', ', array_keys($data));
        // $placeholders = ':' . implode(', :', array_keys($data));
        // $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        // $stmt = $this->db->prepare($sql);
        // if ($stmt->execute($data)) {
        //     return $this->db->lastInsertId();
        // }
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
        // TODO: Implement when database is configured
        // $set = [];
        // foreach ($data as $key => $value) {
        //     $set[] = "{$key} = :{$key}";
        // }
        // $set = implode(', ', $set);
        // $sql = "UPDATE {$table} SET {$set} WHERE id = :id";
        // $data['id'] = $id;
        // $stmt = $this->db->prepare($sql);
        // return $stmt->execute($data);
        return false;
    }
    
    /**
     * Delete a record
     * @param string $table Table name
     * @param int $id Record ID
     * @return bool Success status
     */
    protected function delete($table, $id) {
        // TODO: Implement when database is configured
        // $stmt = $this->db->prepare("DELETE FROM {$table} WHERE id = :id");
        // return $stmt->execute(['id' => $id]);
        return false;
    }
}

