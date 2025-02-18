<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Http\Requests\Admin\UpdateHomePageCategorySectionRequest;
use App\Http\Requests\Admin\UpdateSliderRequest;
use App\Models\Category;
use App\Models\HomePageCategorySection;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageManagementController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::all();
        return view('screens.admin.slider-management.index',compact('sliders'));
    }

    public function create(): View
    {
        $categories = Category::where('category_id', null)->get();

        return view('screens.admin.slider-management.create', compact('categories'));
    }

    public function store(StoreSliderRequest $request)
    {
        if ($request) {
            $slider = [];
            foreach ($request->sanitized() as $key => $sanitized) {
                $slider[] = Slider::create($sanitized);
                $slider[$key]->addMedia($request->slider_image[$key])->toMediaCollection('slider_image');
            }

            return redirect()->route('admin.slider.management.index');
        }
    }
    
    function edit(Slider $slider)
    {
        return view('screens.admin.slider-management.edit', compact('slider'));
    }

    function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($request) {
            $slider->update($request->sanitized());
            if($request->hasFile('slider_image')){
                $slider->clearMediaCollection('slider_image');
                $slider->addMedia($request->slider_image)->toMediaCollection('slider_image');
            }
            return redirect()->route('admin.slider.management.index');
        }
    }

    function delete(Request $request,Slider $slider)  {
        $slider->delete();
        return back();
    }
    
    public function viewCategorySection() : View {
        $sections = HomePageCategorySection::all();
        return view('screens.admin.Home-page-category-section-management.index',compact('sections'));
    }

    public function editCategorySection(HomePageCategorySection $categorySection) : View {

        return view('screens.admin.Home-page-category-section-management.edit',compact('categorySection'));
    }

    public function updateCategorySection(UpdateHomePageCategorySectionRequest $request, HomePageCategorySection $categorySection)  {
        if($request){
            $categorySection->update($request->sanitiazed());
            if($request->hasFile('image')){
                $categorySection->addMedia($request->image)->toMediaCollection('category-section-image');
            }

            return redirect()->route('admin.home.page.category.section.index');
        }
        return back();
    }
}
