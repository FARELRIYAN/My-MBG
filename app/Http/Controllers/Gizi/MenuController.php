<?php

namespace App\Http\Controllers\Gizi;

use App\Http\Controllers\Controller;
use App\Interfaces\MenuRepositoryInterface;
use Illuminate\Http\Request;

use App\Models\School;

class MenuController extends Controller
{
    private MenuRepositoryInterface $menuRepository;

    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }

    public function index()
    {
        $menus = $this->menuRepository->getAllMenus();
        return view('gizi.menus.index', compact('menus'));
    }

    public function create()
    {
        $schools = School::all();
        return view('gizi.menus.create', compact('schools'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_served' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'calories' => 'required|numeric|min:0',
            'protein' => 'required|numeric|min:0',
            'carbohydrates' => 'required|numeric|min:0',
            'fats' => 'required|numeric|min:0',
            'fiber' => 'required|numeric|min:0',
        ]);

        $this->menuRepository->createMenuWithNutrition($data);

        return redirect()->route('gizi.menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit($id)
    {
        $menu = $this->menuRepository->getMenuById($id);
        $schools = School::all();
        return view('gizi.menus.edit', compact('menu', 'schools'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date_served' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'calories' => 'required|numeric|min:0',
            'protein' => 'required|numeric|min:0',
            'carbohydrates' => 'required|numeric|min:0',
            'fats' => 'required|numeric|min:0',
            'fiber' => 'required|numeric|min:0',
        ]);

        $this->menuRepository->updateMenuWithNutrition($id, $data);

        return redirect()->route('gizi.menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy($id)
    {
        $this->menuRepository->deleteMenu($id);
        return redirect()->route('gizi.menus.index')->with('success', 'Menu deleted successfully.');
    }
}
