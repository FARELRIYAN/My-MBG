<?php

namespace App\Repositories;

use App\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;
use App\Models\NutritionFact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuRepository implements MenuRepositoryInterface
{
    public function getAllMenus()
    {
        return Menu::with('nutritionFact')->latest()->get();
    }

    public function getMenuById($id)
    {
        return Menu::with('nutritionFact')->findOrFail($id);
    }

    public function createMenuWithNutrition(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Handle Photo Upload
            if (isset($data['photo']) && $data['photo']->isValid()) {
                $photoPath = $data['photo']->store('menu_photos', 'public');
                $data['photo_url'] = Storage::url($photoPath);
            }

            // Create Menu
            $menu = Menu::create([
                'school_id' => $data['school_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'date_served' => $data['date_served'],
                'photo_url' => $data['photo_url'] ?? null,
            ]);

            // Create Nutrition Fact
            NutritionFact::create([
                'menu_id' => $menu->id,
                'calories' => $data['calories'],
                'protein' => $data['protein'],
                'carbohydrates' => $data['carbohydrates'],
                'fats' => $data['fats'],
                'fiber' => $data['fiber'],
            ]);

            return $menu;
        });
    }

    public function updateMenuWithNutrition($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $menu = Menu::findOrFail($id);

            // Handle Photo Upload
            if (isset($data['photo']) && $data['photo']->isValid()) {
                // Delete old photo
                if ($menu->photo_url) {
                    $oldPath = str_replace('/storage/', '', $menu->photo_url);
                    Storage::disk('public')->delete($oldPath);
                }

                $photoPath = $data['photo']->store('menu_photos', 'public');
                $data['photo_url'] = Storage::url($photoPath);
            }

            // Update Menu
            $menu->update([
                'school_id' => $data['school_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'date_served' => $data['date_served'],
                'photo_url' => $data['photo_url'] ?? $menu->photo_url,
            ]);

            // Update or Create Nutrition Fact
            $menu->nutritionFact()->updateOrCreate(
                ['menu_id' => $menu->id],
                [
                    'calories' => $data['calories'],
                    'protein' => $data['protein'],
                    'carbohydrates' => $data['carbohydrates'],
                    'fats' => $data['fats'],
                    'fiber' => $data['fiber'],
                ]
            );

            return $menu;
        });
    }

    public function deleteMenu($id)
    {
        $menu = Menu::findOrFail($id);

        // Delete photo if exists
        if ($menu->photo_url) {
            $oldPath = str_replace('/storage/', '', $menu->photo_url);
            Storage::disk('public')->delete($oldPath);
        }

        return $menu->delete();
    }
}
