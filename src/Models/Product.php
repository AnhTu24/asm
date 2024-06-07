<?php

namespace Ductong\XuongOop\Models;

use Ductong\XuongOop\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all() {
        return $this->queryBuilder
        ->select(
            'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.created_at', 'p.updated_at',
            'c.name as c_name', 'p.price_regular', 'p.price_sale'
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();
    }

    public function paginate($page = 1, $perPage = 5)
    {
        $queryBuilder = clone($this->queryBuilder);

        $totalPage = ceil($this->count() / $perPage);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
        ->select(
            'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.created_at', 'p.updated_at',
            'c.name as c_name', 'p.price_regular', 'p.price_sale'
        )
        ->from($this->tableName, 'p')
        ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
        ->setFirstResult($offset)
        ->setMaxResults($perPage)
        ->orderBy('p.id', 'desc')
        ->fetchAllAssociative();


        return [
            'data' => $data,
            'totalPage' => $totalPage,
            'currentPage' => $page,
            'totalRecords' => $this->count(),
        ];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id', 'p.category_id', 'p.name', 'p.img_thumbnail', 'p.created_at', 'p.updated_at',
                'p.overview', 'p.content','p.price_regular', 'p.price_sale',
                'c.name as c_name'
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
}