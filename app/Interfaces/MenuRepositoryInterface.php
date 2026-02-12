<?php

namespace App\Interfaces;

interface MenuRepositoryInterface
{
    public function getAllMenus();
    public function getMenuById($id);
    public function createMenuWithNutrition(array $data);
    public function updateMenuWithNutrition($id, array $data);
    public function deleteMenu($id);
}
