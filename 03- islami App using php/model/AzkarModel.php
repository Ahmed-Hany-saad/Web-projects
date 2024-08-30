<?php

class AzkarModel
{
    private $dbh;

    public function __construct(PDO $dbh)
    {
        $this->dbh = $dbh;
    }

    public function getCategories()
    {
        $stmt = $this->dbh->prepare("SELECT DISTINCT category FROM azkar");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getAzkarByCategory($category, $start, $limit)
    {
        $stmt = $this->dbh->prepare("SELECT * FROM azkar WHERE category = :category LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $start, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCount($category, $id)
    {
        $stmt = $this->dbh->prepare("SELECT COUNT(*) FROM azkar WHERE category = :category AND id > :id");
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
